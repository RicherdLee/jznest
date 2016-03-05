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
        if (empty($res)) {//无效优惠码
            return 0;
        }else if ($res['status'] == 2) {//'优惠码已锁定,请检查对应订单';
            return -1;
        }else if ($res['status'] == 3) {//'优惠码已使用,请检查对应订单';
            return -2;
        }else if ($res['expire_time'] != 0 && $res['expire_time'] < time()) {//优惠码已过期
            return -3;
        }else if($res['member_id'] == $buid && $res['code_type'] ==2){//分享优惠码不可个人使用,请分享好友使用
            return -4;
        }else if($res['member_id'] != $buid && $res['code_type'] ==1){//此优惠码属于其他用户
            return -5;
        }else{
            return$res['discont']/10;
        }

    }


    function check_user_code($buid, $expiretime, $type = 1)
    {
        $sql = "select * from " . CODE . " where member_id=" . $buid . " and code_type=1 and expire_time <= $expiretime order by id desc";
        $this->db->query($sql);
        $res = $this->db->fetch_row();
        return $res;
    }

    function get_code_list($status = '')
    {
        global $buid;
        if (is_numeric($status)) {
            $sql = "select * from " . CODE . " where member_id=" . $buid . " and status=" . $status . " order by id desc";
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
            if ($k['expire_time'] == 0) {
                $k['expire_time'] = '无过期时间';
                $k['expire_status'] = '未过期';
            } else {
                $k['expire_status'] = $k['expire_time'] > time() ? '未过期' : '已过期';
                $k['expire_time'] = date('Y-m-d H:i:s', $k['expire_time']);
            }
            if ($k['status'] == 1) {
                $k['status'] = '可使用';
            } else if ($k['status'] == 2) {
                $k['status'] = '已锁定';
            } else {
                $k['status'] = '已使用';
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
    function create_code($disc, $expire = null, $type = 2,$uid)
    {
        global $buid;
        if(empty($buid)) $buid=$uid;
        $disc = $disc >= 100 ? 95 : $disc;
        if ($expire == null || $expire == 0 || $expire == '') {
            $expire = 0;
        }
        $code = date('YmdHis');
        $sql = "INSERT INTO " . CODE . "(member_id,discont,expire_time,code,code_type,status) VALUES (" . $buid . "," . $disc . "," . $expire . "," . $code . "," . $type . ", 1)";
        $this->db->query($sql);
        $id = $this->db->lastid();
        $code = $code . time() . $id;
        $sql = "update " . CODE . " SET code='" . $code . "' WHERE id=" . $id;
        $this->db->query($sql);
        return code;
    }
}