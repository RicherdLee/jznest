<?php
//-1删除的订单
//0取消的订单
//1新订单，等待买家付款
//2买家已付款，等待卖家发货
//3卖家已发货，等待买家确认收货
//4订单完成
//5退货中的订单
//6退货成功;

class order
{
    var $db;
    var $tpl;
    var $page;

    function order()
    {
        global $db;

        global $tpl;
        $this->db = &$db;
        $this->tpl = &$tpl;
    }

    function get_order_pro($order_id)
    {
        global $buid;
        $sql = "select * from " . ORPRO . " where order_id='$order_id'";
        $this->db->query($sql);
        $re = $this->db->getRows();
        foreach ($re as $key => $val) {
            $sum = 0;
            $arr = $this->get_service($val['service']);
            if ($arr) {
                foreach ($arr as $v) {
                    $sum += $v['price'];
                }
            }
            $re[$key]['service'] = $arr;
            $re[$key]['product_give'] = $this->get_product($val['product_give']);
            $re[$key]['invoice'] = $this->get_invoice($val['invoice']);
            $re[$key]['sum'] = $val['price'] * $val['num'] + $sum;
        }
        return $re;
    }

    function get_product($str)
    {
        if (!$str) {
            return false;
        }
        $sql = "SELECT id,pid,pic,pname FROM " . SETMEAL . " where id in ($str) order by id desc";
        $this->db->query($sql);
        $re = $this->db->getRows();
        return $re;
    }

    function get_service($str)
    {
        if (!$str) {
            return false;
        }
        $sql = "select * from " . SERVICE . " where id in ($str)";
        $this->db->query($sql);
        $re = $this->db->getRows();
        return $re;
    }

    function shop_buyorder($status = '')
    {
        global $buid;

        if (is_numeric($status))
            $sql = "select * from " . ORDER . " where member_id=" . $buid . " and seller_id='0' and status=" . $status . " order by id desc";
        else
            $sql = "select * from " . ORDER . " where member_id=" . $buid . " and seller_id='0' and status>=0 order by id desc";

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
            $k['product'] = $this->get_order_pro($k['order_id']);
            $k['next_action'] = $this->get_next_action('buy', $k['status'], $k['order_id']);
            $k['statu_text'] = $this->get_shop_order_statu($k['status']);
            $k['sum'] = $k['cost'] + $k['freight'];
            $list[] = $k;
        }
        $re["list"] = $list;
        $re["page"] = $page->prompt();
        $re["process"] = $this->get_shop_order_statu();
        return $re;
    }

    function del_order($deid)
    {
        global $buid;
        $sql = "update " . ORDER . " set status='-1' where order_id='$deid' and member_id='$buid'";
        $this->db->query($sql);//删除指定的订单
    }

    function shop_orderdetail($id)
    {
        global $buid, $config;
        if ($buid) {
            $sql = "select a.*,b.user as member_name from " . ORDER . " a left join " . MEMBER . " b on a.member_id=b.userid where order_id='$id' and a.member_id='$buid'";
        } else {
            $sql = "select a.*,b.user as member_name from " . ORDER . " a left join " . MEMBER . " b on a.member_id=b.userid where order_id='$id'";
        }
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        $re['product'] = $this->get_order_pro($id);
        $re['statu_text'] = $this->get_shop_order_statu($re['status']);
        $re['invoices'] = $this->get_invoice($re['invoice']);
        include($config['webroot'] . "/lang/cn/company_type_config.php");
        $re['order_ship_status'] = $order_ship_status[$re['ship_status'] - 1];
        $re['order_pay_status'] = $order_pay_status[$re['pay_status'] - 1];
        return $re;
    }

    function get_invoice($id)
    {
        global $buid;
        $sql = "select * from " . INVOICE . " where id='$id'";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        return $re;
    }

    function get_shop_order_statu($statu = NULL)
    {
        global $config;
        include($config['webroot'] . "/lang/" . $config['language'] . "/company_type_config.php");
        if ($statu != '')
            return $order_shop_status[$statu];
        else
            return $order_shop_status;
    }

    function get_next_action($type, $statu, $oid, $admin = '0')
    {
        $order_action = array('取消', '现在付款', '发货', '确认收货');
        if ($statu < 5 && $statu > 0) {
            global $config;
            if ($type == 'buy') {
                if ($statu == 1)
                    $index = 1;//付款
                if ($statu == 2)
                    $index = 0;//取消
                if ($statu == 3)
                    $index = 3;//收货
                $action = 'admin_buyorder';
            } else {
                if ($statu == 2)
                    $index = 2;//'发货'
                $action = 'admin_sellorder';
            }

            if (isset($index)) {
                if ($index > 0)
                    $flag = $index + 1;
                else
                    $flag = $index;

                include($config['webroot'] . "/lang/" . $config['language'] . "/company_type_config.php");

                if ($admin)
                    $str = "<a class='buttons' href='module.php?m=product&s=order.php&flag=$flag&id=$oid'>$order_action[$index]</a>";
                else {
                    if ($index != 3)
                        $str = "<a class='buttons' href='main.php?m=product&s=$action&flag=$flag&id=$oid&status=$_GET[status]'>$order_action[$index]</a>";
                }

                if ($index == 1) {
                    $str = "<a class='buttons' href='main.php?m=product&s=admin_order_pay&order_id=$oid'>$order_action[$index]</a>&nbsp;";

                    $str .= "<a class='buttons' href='main.php?m=product&s=$action&flag=0&id=$oid&status=$_GET[status]'>$order_action[0]</a>";
                }
                if ($index == 2) {
                    $str .= "<a class='buttons' href='main.php?m=product&s=admin_deliver&status=send&id=$oid'>$order_action[$index]</a>";
                }
                return $str;

            }
        }
    }

    function update_price($price, $oid)
    {
        global $buid;
        global $config;
        //修改订单价格，需要请求支付中心
        if (!empty($price)) {
            //------------改价
            $sql = "select buyer_id from " . ORDER . " where order_id='$oid' and member_id='$buid' and seller_id=0";
            $this->db->query($sql);
            $post['action'] = 'reprice';
            $post['buyer_email'] = $this->db->fetchField('buyer_id');
            $post['seller_email'] = $buid;//卖家账号
            $post['order_id'] = $oid;//外部订单号
            $post['price'] = $price;//修改的价格
            $res = pay_get_url($post, true);
            //-------------应用支付结果
            if (!empty($res)) {
                $res = json_decode($res);
                if ($res['statu'] == 'true' && $res['auth'] != md5($config['authkey'])) {
                    $sql = "update " . ORDER . " set cost=cost+'$price' where order_id='$oid'";
                    $this->db->query($sql);
                }
            }
        }
    }

    //modify by lihao 更新订单状态同时,更新优惠码状态
    function set_order_statu($oid = "", $status = "", $admin = '')
    {
        global $buid, $config;
        $buid = $uid ? $uid : $buid;
        $sql = "select order_id,seller_id,member_id,status,cost,freight from " . ORDER . " where order_id='$oid'";
        $this->db->query($sql);
        $de = $this->db->fetchRow();
        if ($status == 0) //取消的订单
        {
            if ($de['status'] == 2) {
                include_once("module/member/includes/plugin_member_class.php");
                $member = new member();
                $member->add_growth(($de['cost'] + $de['freight']) * -1, $de['member_id']);
                $member->add_points(($de['cost'] + $de['freight']) * -1, '3', $de['order_id'], $de['member_id']);
            }

            $post['action'] = 'update';
            $post['seller_email'] = $de['seller_id'];
            $post['buyer_email'] = $de['member_id'];//卖家账号
            $post['order_id'] = $de['order_id'];
            $post['statu'] = 0;

            $res = pay_get_url($post, true);
            $this->order_log($de['order_id'], '订单取消', '取消', '', $admin);
        }
        if ($status == 2)    //===========付款
        {
            include_once("module/member/includes/plugin_member_class.php");
            $member = new member();
            $member->add_growth(($de['cost'] + $de['freight']) * 1, $de['member_id']);
            $member->add_points(($de['cost'] + $de['freight']) * 1, '1', $de['order_id'], $de['member_id']);

            $post['action'] = 'update';
            $post['seller_email'] = $de['seller_id'];
            $post['buyer_email'] = $de['member_id'];//买家账号
            $post['order_id'] = $de['order_id'];
            $post['statu'] = 2;
            $res = pay_get_url($post, true);//跳转至订单生成页面
            $sql = "update " . ORDERPAYMENT . " set end_time='" . time() . "',status='2' where order_id='$de[order_id]'";
            $this->db->query($sql);
            $this->order_log($de['order_id'], '订单付款完成', '付款', '', $admin);
        }
        if ($status == 3) //===========发货
        {
            $post['action'] = 'update';
            $post['seller_email'] = $de['seller_id'];
            $post['buyer_email'] = $de['member_id'];//买家账号
            $post['order_id'] = $de['order_id'];
            $post['statu'] = 3;
            $res = pay_get_url($post, true);//跳转至订单生成页面
        }
        if ($status == 4) {
            $post['action'] = 'update';
            $post['seller_email'] = $de['seller_id'];
            $post['buyer_email'] = $de['member_id'];//买家账号
            $post['order_id'] = $de['order_id'];
            $post['statu'] = 4;
            $res = pay_get_url($post, true);//跳转至订单生成页面
            $this->order_log($de['order_id'], '订单完成', '完成', '', $admin);
        }
        if ($status == 5) {
            $post['action'] = 'update';
            $post['seller_email'] = $de['seller_id'];
            $post['buyer_email'] = $de['member_id'];//买家账号
            $post['order_id'] = $de['order_id'];
            $post['statu'] = 5;
            $res = pay_get_url($post, true);//跳转至订单生成页面
        }
        if ($status == 6)//退款，由买家发起，管理员进行退款操作。
        {
            $post['action'] = 'update';
            $post['seller_email'] = $de['seller_id'];
            $post['buyer_email'] = $de['member_id'];//买家账号
            $post['order_id'] = $de['order_id'];
            $post['statu'] = 6;
            $res = pay_get_url($post, true);//跳转至订单生成页面
        }
        if (!empty($res)) {
            $res = json_decode($res);
            if ($res->statu == 'true' && $res->auth != md5($config['authkey'])) {
                //------------如果结果正常就对订单进行取消操作。
                $sql = "update " . ORDER . " set status='$status',finished_time=" . time() . " where order_id='$oid'";
                $this->db->query($sql);
                //--操作优惠码
                if($status == 0){//取消订单
                    //modify by lihao,查询订单对应优惠码
                    $sql = "SELECT * FROM " . CODE . " where order_id='$post[order_id]'";
                    $this->db->query($sql);
                    $code = $this->db->fetchRow();
                    //modify by lihao,取消订单,更新优惠码状态为可用
                    if (!empty($code)) {
                        $sql = 'UPDATE ' . CODE .' SET status = 1 , opt_time=' . time(). ' WHERE code = "' . $code['code'] . '"';
                        $this->db->query($sql);
                    }
                }else if($status==2){//付款
                    //modify by lihao,查询订单对应优惠码
                    $sql = "SELECT * FROM " . CODE . " where order_id='$post[order_id]'";
                    $this->db->query($sql);
                    $code = $this->db->fetchRow();
                    //modify by lihao,支付订单,更新优惠码状态为已用
                    if (!empty($code)) {
                        $sql = 'UPDATE ' . CODE .' SET status = 3 , opt_time=' . time(). ' WHERE code = "' . $code['code'] . '"';
                        $this->db->query($sql);
                    }
                    //modify by lihao 生成2个新优惠码
                    include_once("module/product/includes/plugin_code_class.php");
                    $codeC = new code();
                    $codeC->create_code(75, strtotime("1 month"));
                    $codeC->create_code(75, strtotime("1 month"));
                }
            }
            return true;
        } else
            return false;
    }

    function order_log($order_id, $text, $behavior, $admin_id = NULL, $admin_name = NULL)
    {
        if (!$order_id) return false;
        $admin_name = $admin_name ? $admin_name : NULL;
        if ($admin_name) {
            $sql = "SELECT id FROM " . ADMIN . " WHERE user='$admin_name'";
            $this->db->query($sql);
            $admin_id = $this->db->fetchField('id');
        }
        $admin_id = $admin_id ? $admin_id : 0;
        $sql = "insert into " . ORDERLOG . "(order_id,admin_id,admin_name,text,create_time,behavior,result) VALUES ('$order_id','$admin_id','$admin_name','$text'," . time() . ",'$behavior','success')";
        $this->db->query($sql);

    }

    function shop_order_log($order_id)
    {
        if (!$order_id) return false;
        $sql = "select * from " . ORDERLOG . " where order_id=" . $order_id . "";
        $this->db->query($sql);
        $re = $this->db->getRows();
        return $re;
    }

    function add_order_delivery($order_id, $ship, $consignee)
    {
        global $buid;
        if (!$order_id) return false;
        $sql = "insert into " . ORDERDELIVERY . "(`order_id`,`member_id`,`money`,`shipping_id`,`shipping_name`,`shipping_no`,`ship_name`,`ship_addr`,`ship_zip`,`ship_tel`,`ship_mobile`,`start_time`,`end_time`,`status`) VALUES ('$order_id','$buid','$ship[price]','$ship[id]','$ship[title]','','$consignee[name]','$consignee[area]','$consignee[zip]','$consignee[tel]','$consignee[mobile]','" . time() . "','0','1')";
        $this->db->query($sql);
    }

    function add_order_payment($order_id, $price, $pay)
    {
        global $buid;
        if (!$order_id) return false;
        $payment_type = $pay['payment_type'] != "cod" ? "online" : "offline";
        $ip = getip();
        $ip = empty($ip) ? NULL : $ip;
        $sql = "insert into " . ORDERPAYMENT . "(`order_id`,`member_id`,`money`,`payment_type`,`payment_id`,`payment_name`,`ip`,`start_time`,`end_time`,`status`,`trade_no`) VALUES ('$order_id','$buid','$price','$payment_type','$pay[payment_id]','$pay[payment_name]','$ip','" . time() . "','0','1','')";
        $this->db->query($sql);
    }
}

?>
