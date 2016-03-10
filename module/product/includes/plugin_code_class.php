<?php

/**
 * Created by PhpStorm.
 * User: haoli
 * Date: 2/28/16
 * Time: 11:28
 */
class code
{
    var $db;
    var $tpl;
    var $page;

    function code()
    {
        global $db;

        global $tpl;
        $this->db = &$db;
        $this->tpl = &$tpl;
    }

    function checkCode()
    {
        global $buid;
        $expiretime = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
        $sql = "select * from " . CODE . " where member_id=" . $buid . " and status = 0 and lockstatus =0 and code_type=1 and expire_time <= $expiretime order by id desc";
        $this->db->query($sql);
        $res = $this->db->fetchRow();
        $r = Array();
        if ($res) {
            $r['status'] = 1;
            $r['discont'] = $res['discont'];
            $r['code'] = $res['code'];
        } else {
            $r['status'] = 0;
        }
        return json_encode($r);
    }

    /**
     * 获取验证码抵扣率
     * @param $code
     */
    function getCodeDiscount($code)
    {
        global $buid;
        $sql = "select * from " . CODE . " where code = $code";
        $this->db->query($sql);
        $res = $this->db->fetchRow();
        //lockstatus表示锁定次数,当锁定次数为2是,表示已有两个用户使用此优惠码创建订单(未支付)
        //status表示交易成功次数,当status为2时,表示已有两位用户使用此优惠码创建订单并支付
        if (empty($res)) {//无效优惠码
            return 0;
        } else if ($res['lockstatus'] == 2) {//'优惠码已锁定,请检查对应订单';
            return -1;
        } else if ($res['status'] == 2) {//'优惠码已使用,请检查对应订单';
            return -2;
        } else if ($res['expire_time'] != 0 && $res['expire_time'] < time()) {//优惠码已过期
            return -3;
        } else if ($res['member_id'] == $buid && $res['code_type'] == 2) {//分享优惠码不可个人使用,请分享好友使用
            return -4;
        } else if ($res['member_id'] != $buid && $res['code_type'] == 1) {//此优惠码属于其他用户
            return -5;
        } else {
            if ($res['code_type'] != 1) {
                $sql = " SELECT * FROM ".CODEMAP." WHERE use_id=".$buid." AND code_id = ".$res['id'];
                $this->db->query($sql);
                if($this->db->fetchRow()){
                    return -7;//您已使用过此优惠码
                }
                //继续判断A购买后产生的优惠码，若B和C使用，那么30天内，A不得使用B和C分享的优惠码
                $useid = $res['member_id'];
                $create_time = strtotime("-30 day");
                $sql = 'SELECT * FROM ' . CODEMAP . " WHERE member_id=" . $buid . ' AND use_id= ' . $useid . ' AND create_time > ' . $create_time;
                $this->db->query($sql);
                $rr = $this->db->fetchRow();
                if ($rr) return -6;//30天内,您不能使用您分享用户所产生的优惠码
            }
            return $res['discont'] / 10;
        }

    }


    function check_user_code($buid, $expiretime, $type = 1)
    {
        $sql = "select * from " . CODE . " where member_id=" . $buid . " and code_type=1 and expire_time <= $expiretime order by id desc";
        $this->db->query($sql);
        $res = $this->db->fetchRow();
        return $res;
    }

    function get_code_list($status = '')
    {
        global $buid;
        if (is_numeric($status)) {
            $sql = "select * from " . CODE . " where  member_id=" . $buid . " and code_type=" . $status . " order by id desc";
        } else {
            $sql = "select * from " . CODE . " where member_id=" . $buid . " order by id desc";
        }

        //=============================
        $page = new Page;
        $page->listRows = 8;
        if (!$page->__get('totalRows')) {
            $this->db->query($sql);
            $page->totalRows = $this->db->num_rows();
        }
        $sql .= "  limit " . $page->firstRow . ",8";
        //=====================
        $this->db->query($sql);
        $ore = $this->db->getRows();
        foreach ($ore as $k) {
//            if( $k['code_type'] == 1 ) continue;
            $code_tpye = $k['code_type'];
            if($k['code_type'] == 1){
                $k['code_type'] ='自用';
            }else{
                $k['code_type'] = '分享他人使用';
            }
            if ($k['expire_time'] == 0) {
                $k['expire_time'] = '无过期时间';
                $k['expire_status'] = '未过期';
            } else {
                $k['expire_status'] = $k['expire_time'] > time() ? '未过期' : '已过期';
                $k['expire_time'] = date('Y-m-d H:i:s', $k['expire_time']);
            }
            if ($k['lockstatus'] == 2) {
                if ($k['status'] == 0) {
                    $k['status'] = '已锁定';
                } else if ($k['status'] == 1) {
                    $k['status'] = '一人已支付';
                } else if ($k['status'] == 2) {
                    $k['status'] = '已使用';
                }
            } else {
                $k['status'] = $code_tpye == 1 ? '可使用':'可分享';
            }
            $list[] = $k;
        }
        $re["list"] = $list;
        $re["page"] = $page->prompt();
        return $re;
    }

    /**
     * 创建优惠码
     * type  1表示前一百用户每月生成的 2表示支付订单后生成的
     */
    function create_code($disc, $expire = null, $type = 2, $uid)
    {
        global $buid;
        if (!empty($uid)) $buid = $uid;
        $disc = $disc >= 100 ? 95 : $disc;
        if ($expire == null || $expire == 0 || $expire == '') {
            $expire = 0;
        }
        $code = date('YmdHis');
        $sql = "INSERT INTO " . CODE . "(member_id,discont,expire_time,code,code_type,lockstatus,status) VALUES (" . $buid . "," . $disc . "," . $expire . "," . $code . "," . $type . ",0, 0)";
        $this->db->query($sql);
        $id = $this->db->lastid();
        $code = $code . time() . $id;
        $sql = "update " . CODE . " SET code='" . $code . "' WHERE id=" . $id;
        $this->db->query($sql);
        return code;
    }
}