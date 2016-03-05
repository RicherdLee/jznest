<?php
if (empty($buid) && empty($_GET['type']))
    msg($config['weburl'] . "/login.php?forward=" . urlencode("$config[weburl]/?m=product&s=shop_order"));
else {
    if (!empty($buid)) {
        include_once("$config[webroot]/module/member/includes/plugin_orderadder_class.php");
        include_once("$config[webroot]/module/member/includes/plugin_invoice_class.php");
        include_once("$config[webroot]/module/product/includes/plugin_cart_class.php");
        include_once("$config[webroot]/module/logistics/includes/logistics_class.php");
        $logistics = new logistics();
        $cart = new cart();
        $orderadder = new orderadder();
        $invoice = new invoice();
        if ($_POST['act'] != 'order' and $_POST) {
            if ($_POST['act'] == 'consignee') {
                echo include_once("$config[webroot]/module/product/consignee.php");
            } elseif ($_POST['act'] == 'invoice') {
                echo include_once("$config[webroot]/module/product/invoice.php");
            } elseif ($_POST['act'] == 'payment') {
                $city = $_POST['city'];
                $weight = $_POST['weight'];
                $sumprice = $_POST['sumprice'];
                echo include_once("$config[webroot]/module/product/payment.php");
            } elseif ($_POST['act'] == 'add_consignee') {
                echo $orderadder->add_orderadder();
            } elseif ($_POST['act'] == 'add_invoice') {
                echo $invoice->add_invoice();
            } elseif ($_POST['act'] == 'select_consignee') {
                $re = $orderadder->get_orderadder($_POST['id']);
                $str .= "{'id':'$re[id]','address':'$re[address]','name':'$re[name]','mobile':'$re[mobile]','tel':'$re[tel]','t':'$re[area]','areaid':'$re[areaid]','cityid':'$re[cityid]','provinceid':'$re[provinceid]','email':'$re[email]'}";
                echo $str;
            } elseif ($_POST['act'] == 'select_invoice') {
                $re = $invoice->get_invoice($_POST['id']);
                $itype = $lang['itype'][$re['type']];
                $irise = $lang['irise'][$re['rise']];
                $icontent = $lang['icontent'][$re['content']];
                $str .= "{'id':'$re[id]','type':'$re[type]','rise':'$re[rise]','content':'$re[content]','company':'$re[company]','number':'$re[number]','address':'$re[address]','telephone':'$re[telephone]','bank':'$re[bank]','account':'$re[account]','itype':'$itype','irise':'$irise','icontent':'$icontent'}";
                echo $str;
            }
            die;
        }
        //============================获取数据
        $tpl->assign("cart", $cartlist = $cart->get_listcart($on_city));
        if ($config['temp'] == 'wap') {
            $tpl->assign("consignee", $re = $orderadder->get_default_orderadder());
            $tpl->assign("invoice", $invoice->get_default_invoice());

            $sql = "select id,type,title,`desc` from " . LGSTEMP . " where status=1";
            $db->query($sql);
            $ship = $db->getRows();

            foreach ($ship as $key => $val) {
                $ship[$key]['price'] = $logistics->count_freight($val['id'], getdistrictname($re['cityid']), $cartlist['sumprice'], $cartlist['weight']);
                if ($val['type'] == '1') {
                    $sql = "select payment_id from " . PAYMENT . " where payment_type='cod' and active=1";
                } else {
                    $sql = "select payment_id from " . PAYMENT . " where payment_type='account' and active=1";
                }
                $db->query($sql);
                $ship[$key]['pay'] = $db->fetchField('payment_id');
                if ($ship[$key]['pay']) {
                    $ships[$key] = $ship[$key];
                }
            }
            $tpl->assign("ship", $ships);

            if ($ship['type'] == '1') {
                $str = " and payment_type='cod'";
            }
            $sql = "select payment_id,payment_name,payment_type,payment_desc from " . PAYMENT . " where payment_type!='cards' and active=1 $str order by payment_id limit 0,1";
            $db->query($sql);
            $pay = $db->fetchRow();
            $tpl->assign("pay", $pay);
        } else {
            $tpl->assign("consignee", $re = $orderadder->get_consignee());
            $tpl->assign("invoice", $invoice->get_defaultinvoice());

            $sql = "select id,type,title,`desc` from " . LGSTEMP . " where status=1 limit 0,1";
            $db->query($sql);
            $ship = $db->fetchRow();
            $ship['price'] = $logistics->count_freight($ship['id'], getdistrictname($re['cityid']), $cartlist['sumprice'], $cartlist['weight']);
            $tpl->assign("ship", $ship);

            if ($ship['type'] == '1') {
                $str = " and payment_type='cod'";
            }
            $sql = "select payment_id,payment_name,payment_type,payment_desc from " . PAYMENT . " where payment_type!='cards' and active=1 $str order by payment_id limit 0,1";
            $db->query($sql);
            $pay = $db->fetchRow();
            $tpl->assign("pay", $pay);
        }

        //=============================提交订单
        if ($_POST['act'] == 'order' && is_numeric($_POST['hidden_invoice_id']) && is_numeric($_POST['hidden_consignee_id']) && is_numeric($_POST['hidden_payment_id']) && is_numeric($_POST['hidden_ship_id'])) {
            $str = "";
            //收货地址
            $consignee = $orderadder->get_orderadder($_POST['hidden_consignee_id']);
            //物流信息
            $sql = "select id,type,title from " . LGSTEMP . " where id = '$_POST[hidden_ship_id]'";
            $db->query($sql);
            $ship = $db->fetchRow();
            //支付信息
            if ($ship['type'] == '1') {
                $str = " and payment_type='cod'";
            }
            $sql = "select payment_id,payment_name from " . PAYMENT . " where payment_id='$_POST[hidden_payment_id]' $str";
            $db->query($sql);
            $pay = $db->fetchRow();

            if (!empty($consignee['id']) && !empty($pay['payment_id']) && !empty($ship['id'])) {
                foreach ($cartlist['cart'] as $key => $val) {
                    $sell_userid = $val['sell_userid'];
                    $product_price = $val['sumprice'];//总价
                    $weight = $val['weight'];//重量
                    //modify by lihao 添加优惠码
                    //优惠码
                    $code = $_POST['code'];
                    $neddupdatecode = false;
                    if (!empty($code)) {
                        $sql = 'SELECT * FROM ' . CODE . " WHERE code = '" . $code . "'";
                        $db->query($sql);
                        $flag = $db->fetchRow();
                        //优惠码存在,且优惠码状态为可用(0表示不可用,1表示可用,2表示被锁定,3表示已使用)
                        if (!empty($flag) && $flag['status'] == '1') {
                            //若过期时间为0,表示永不过期或者过期时间小于当前时间
                            if ($flag['expire_time'] == 0 || $flag['expire_time'] > time()) {
                                $discount_cost = $val['sumprice'] *  $flag['discont']/100;
                                $neddupdatecode = ture;
                                $codestatus = 2;
                            }else{
                                $discount_cost = $val['sumprice'];
                            }
                        } else {
                            $discount_cost = $val['sumprice'];
                        }
                    }
                    $ship['price'] = $logistics->count_freight($ship['id'], getdistrictname($consignee['cityid']), $product_price, $weight);//运费
                    $order_id = date("Ymdhis") . rand(0, 9);//订单号
                    $pname = NULL;//此次购物的产品名总称

                    /***生成订单****/

                    //modify by lihao,添加字段real_真实价格,原price字段是计算折扣后的价格
                    $sql = "INSERT INTO " . ORDER . "(member_id,order_id,seller_id,create_time,invoice_id,payment_id,payment_name,shipping_id,shipping_name,ship_name,ship_addr,ship_tel,ship_mobile,ship_zip,des,cost,real_cost,freight,weight) VALUES ($buid,$order_id,$sell_userid,'" . time() . "','$_POST[hidden_invoice_id]','$pay[payment_id]','$pay[payment_name]','$ship[id]','$ship[title]','$consignee[name]','$consignee[area]','$consignee[tel]','$consignee[mobile]','$consignee[zip]','','$discount_cost','$product_price','$ship[price]','$weight')";

                    $flag = $db->query($sql);
                    //更新优惠码状态
                    $sql = 'UPDATE ' . CODE . ' SET status = 2 , opt_time=' . time().', order_id = '.$order_id.' WHERE code = "' . $code . '"';
                    $db->query($sql);
                    //--产品信息
                    foreach ($val['prolist'] as $key => $val) {
                        $sql = "INSERT INTO " . ORPRO . " (`order_id`,`buyer_id`,`pid`,`pcatid`,`name`,`pic`,`price`,`num`,`time`,`product_give`,`code`,`service`) VALUES ($order_id,$buid,$val[pid],'$val[catid]','$val[pname] $val[setmealname]','" . $val['pic'] . "','" . $val['price'] . "','" . $val['num'] . "','" . time() . "','$val[product_give_id]','$val[code]','$val[services]')";
                        $db->query($sql);
                        $pname = $pname . '-' . $val['pname'];
                    }

                    include_once("$config[webroot]/module/product/includes/plugin_order_class.php");
                    $order = new order();
                    $order->order_log($order_id, '订单创建', '创建');

                    $order->add_order_delivery($order_id, $ship, $consignee);
                    $order->add_order_payment($order_id, $product_price * 1 + $ship['price'] * 1, $pay);

                    include_once("$config[webroot]/module/payment/lang/$config[language].php");
                    $post['type'] = 1;//直接到账
                    $post['action'] = 'add';//
                    $post['buyer_email'] = $buid;
                    $post['seller_email'] = 'admin@systerm.com';
                    $post['order_id'] = $order_id;//外部订单号

                    $post['price'] = $discount_cost * 1 + $ship['price'] * 1;//订单总价，单价元
                    $post['return_url'] = 'main.php?m=product&s=admin_orderdetail&id=' . $order_id . '&type=buy';//返回地址
                    $post['notify_url'] = 'main.php?m=product&s=admin_orderdetail&id=' . $order_id . '&type=buy';//异步返回地址。
                    $post['note'] = $note[3] . $pname;
                    pay_get_url($post);//跳转至订单生成页面
                    if ($re < 0) {
                        if ($re == -2)
                            msg('main.php?m=payment&s=admin_info', '您的支付账户还没有开通');
                        if ($re == -1)
                            msg("$config[weburl]/?m=product&s=cart", '卖家没有开通支付功能，暂不能购买');
                    }
                }
                //------------清空购物车
                $cart->clear_cart();
                msg($config['weburl'] . "/main.php?m=product&s=admin_buyorder");//订单提交成功
                die;
            }
        }
    }
}
//=================================================
$tpl->assign("config", $config);
$tpl->assign("current", "product");
include_once("footer.php");
$out = tplfetch("shop_order.htm", $flag, true);

?>