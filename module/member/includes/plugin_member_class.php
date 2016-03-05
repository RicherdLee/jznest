<?php

class member
{
    var $db;

    function member()
    {
        global $db;
        $this->db = &$db;
    }

    function get_member_detail($id)
    {
        global $buid, $config;
        if (empty($id))
            $id = $buid;
        $sql = "select * from " . MEMBER . " WHERE userid='$id'";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        return $re;
    }

    function update_member($uid)
    {
        global $config, $buid;
        $logo = NULL;
        $ssql = NULL;
        if (empty($uid))
            $uid = $buid;

        $_POST['sex'] = empty($_POST['sex']) ? 1 : $_POST['sex'];

        $sql = "UPDATE " . MEMBER . " SET
		name='$_POST[name]',qq='$_POST[qq]',provinceid='$_POST[province]',cityid='$_POST[city]',areaid='$_POST[area]',area='$_POST[t]',sex='$_POST[sex]',logo='$_POST[logo]'
		WHERE userid='$uid'";

        $re = $this->db->query($sql);
        return $re;
    }

    function resetpass($buid)
    {
        $sql = "SELECT password FROM " . MEMBER . " WHERE userid='$buid'";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        if (empty($_POST["oldpass"]) || empty($_POST["newpass"]) || empty($_POST["renewpass"])) {
            return '0';
            die;
        }
        if ($re['password'] != md5($_POST["oldpass"])) {
            return '1';
            die;
        }
        if ($_POST["newpass"] != $_POST["renewpass"]) {
            return '2';
            die;
        }
        $sql = "UPDATE " . MEMBER . " SET password='" . md5($_POST['newpass']) . "' WHERE userid='$buid'";
        $re = $this->db->query($sql);
        return '3';

    }

    function resetemail($buid)
    {
        $sql = "SELECT password FROM " . MEMBER . " WHERE userid='$buid'";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        if (empty($_POST["pass"]) || empty($_POST["mail"])) {
            return '0';
            die;
        }
        if ($re['password'] != md5($_POST["pass"])) {
            return '1';
            die;
        }
        $sql = "UPDATE " . MEMBER . " SET email='" . $_POST['mail'] . "' WHERE userid='$buid'";
        $re = $this->db->query($sql);
        return '2';
    }

    //获取当前会员产品订单总数
    function get_all_count($table, $array = "", $type = "1")
    {
        global $buid;
        if (is_array($array)) {
            foreach ($array as $k => $v) {
                if ($table == ORDER) {
                    if ($type == "1") {
                        if ($v == "all") {
                            $str = " and buyer_id!=''";
                        } else {
                            $str = " and buyer_id!='' and status=$v";
                        }
                    } else {
                        if ($v == "all") {
                            $str = " and seller_id='0'";
                        } elseif ($v == "4") {
                            $str = " and seller_id='0' and status=$v and is_comment='false'";
                        } else {
                            $str = " and seller_id='0' and status=$v";
                        }
                    }
                } else {
                    $str = " and statu=$v ";
                }
                $sql = "select count(*) as count from " . $table . " where member_id='$buid' $str ";
                $this->db->query($sql);
                $count[$k] = $this->db->fetchField('count');
            }
        } else {
            $sql = "select count(*) as count from " . $table . " where fromid='$buid'";
            $count = $this->db->fetchField('count');
        }
        return $count;;
    }

    function get_member_info($id)
    {
        if (empty($id)) return NULL;
        $sql = "select logo as plogo,name,grade,update_date from " . MEMBER . " WHERE userid='$id'";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        return $re;
    }

    function GetCount($id)
    {
        /*
        if(empty($id)) return NULL;
        $sql="select * from ".MEMBERINFO." WHERE member_id='$id'";
        $this->db->query($sql);
        $re=$this->db->fetchRow();
        return $re;
        */
    }

    function get_growth()
    {
        global $buid;
        $sql = "select growth from " . MEMBERINFO . " WHERE member_id='$buid'";
        $this->db->query($sql);
        $growth = $this->db->fetchField('growth');
        return $growth;
    }

    function update_grade($grade, $time)
    {
        global $buid;
        $sql = "select * from " . GRADE . " where id=$grade";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        if (time > $time + 60 * 60 * 24 * 365 * $re['valid'] and $re['valid'] > 0) {
            $growth = $this->get_growth();
            $news = $growth - $re['sum'];
            $this->add_growth($re['sum'] * -1);
            if ($news >= $re['demand']) {
                $sql = "UPDATE " . MEMBER . " SET update_date='" . time() . "' WHERE `userid` = '$buid'";
                $this->db->query($sql);
            } else {
                $sql = "select id,demand from " . GRADE;
                $this->db->query($sql);
                $de = $this->db->getRows();
                foreach ($de as $val) {
                    if ($news >= $val['demand']) {
                        $statu = $val['id'];
                    }
                }
                $sql = "UPDATE " . MEMBER . " SET `grade` = '$statu' , update_date='" . time() . "' WHERE `userid` = '$buid'";
                $this->db->query($sql);
            }
        }
    }

    function add_growth($sum, $uid = '')
    {
        global $buid;
        $sum = $sum ? round($sum) : 0;
        $buid = $uid ? $uid : $buid;
        $statu = 1;
        $sql = "UPDATE " . MEMBERINFO . " SET `growth` = growth + $sum  WHERE `member_id` = '$buid'";
        $this->db->query($sql);
        $growth = $this->get_growth();
        if (isset($growth)) {
            $sql = "select id,demand from " . GRADE;
            $this->db->query($sql);
            $re = $this->db->getRows();
            foreach ($re as $val) {
                if ($growth >= $val['demand']) {
                    $statu = $val['id'];
                }
            }
            $sql = "select grade from " . MEMBER . " WHERE userid='$buid'";
            $this->db->query($sql);
            $grade = $this->db->fetchField('grade');
            if ($statu and $grade != $statu) {
                $sql = "UPDATE " . MEMBER . " SET `grade` = '$statu' , update_date='" . time() . "' WHERE `userid` = '$buid'";
                $this->db->query($sql);
            }
        }
    }

    function get_points()
    {
        global $buid;
        $sql = "select points from " . MEMBERINFO . " WHERE member_id='$buid'";
        $this->db->query($sql);
        $points = $this->db->fetchField('points');
        return $points;
    }

    function add_points($sum, $type, $order_id, $uid = '')
    {
        global $buid;
        $sum = $sum ? round($sum) : 0;
        $num = $sum < 0 ? $sum * (-1) : $sum;
        $points = $this->get_points();
        if ($num > $points and $sum < 0) {
            return '1';
        }
        $buid = $uid ? $uid : $buid;
        $statu = 1;
        $sql = "UPDATE " . MEMBERINFO . " SET `points` = points + $sum  WHERE `member_id` = '$buid'";
        $this->db->query($sql);
        if ($type == 2) {
            $desc = "兑换礼品" . $order_id . "消耗积分";
        } elseif ($type == 3) {
            $desc = "取消购物订单" . $order_id;
        } else {
            $desc = "订单" . $order_id . "购物消费";
        }

        $sql = "select user from " . MEMBER . " WHERE userid='$buid'";
        $this->db->query($sql);
        $user = $this->db->fetchField('user');

        $sql = "INSERT INTO " . POINTSLOG . " (member_id,member_name,points,create_time,`desc`) VALUES ('$buid','$user','$sum','" . time() . "','$desc')";
        $this->db->query($sql);
    }

    //modify by lihao
    function get_code($id)
    {
        if (empty($id)) return NULL;
        $sql = "select * from " . CODE . " WHERE member_id='$id'";
        $this->db->query($sql);
        $re = $this->db->fetchRow();
        return $re;
    }
}

?>
