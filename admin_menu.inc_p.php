<?php
$menu = array(
    'main' => array(
        'name' => '首页',
        'action' => 'main',
        'sub' => array(
            array(
                'name' => '我的订单',
                'type' => array(1, 2),
                'action' => "?m=product&s=admin_buyorder",
            ),
            array(
                'name' => '我的团购',
                'type' => array(1, 2),
                'action' => '?m=tg&s=admin_tg_order',
            ),
            array(
                'name' => '我的关注',
                'type' => array(1, 2),
                'action' => '?m=sns&s=admin_share_product',
            ),
            array(
                'name' => '我的积分',
                'type' => array(1, 2),
                'action' => array(
                    '?m=points&s=admin_points' => '积分明细',
                    '?m=points&s=admin_points_order' => '已兑换的商品',
                )
            ),
            //modify by lihao,添加我的优惠码列表
            array(
                'name' => '我的优惠码',
                'type' => array(1, 2),
                'action' => '?m=product&s=admin_code'
            ),
            array(
                'name' => '社区中心',
                'type' => array(1, 2),
                'action' => array(
                    '?m=product&s=admin_credit' => '商品评价',
                    '?m=product&s=admin_consult' => '购买咨询',
                    '?m=report&s=admin_myreport' => '举报中心',
                )
            ),
        ),
    ),

    'friend' => array(
        'name' => '好友',
        'sub' => array(
            array(
                'name' => '好友',
                'type' => array(1, 2),
                'action' => array(
                    '?m=sns&s=admin_friends' => "好友",
                ),
            )
        )
    ),
    'inquire' => array(
        'name' => '站内信',
        'sub' => array(
            array(
                'name' => $lang['mes'],
                'type' => array(1, 2),
                'action' => array(
                    '?m=message&s=admin_message_list_inbox' => $lang['inbox'],
                    '?m=message&s=admin_message_list_savebox' => $lang['savebox'],
                    '?m=message&s=admin_message_list_delbox' => $lang['delbox'],
                    '?m=message&s=admin_message_det' => '',
                    '?m=message&s=admin_message_sed' => '',
                )
            )
        )
    ),
    'user' => array(
        'name' => '设置',
        'sub' => array(
            array(
                'name' => '账户中心',
                'type' => array(1, 2),
                'action' => array(
                    '?m=member&s=admin_member' => '个人资料',
                    '?m=member&s=admin_orderadder' => '收货地址',
                    '?m=member&s=admin_invoice' => '发票信息',
                ),
            ),
            array(
                'name' => '支付管理',
                'type' => array(1, 2),
                'action' => array(
                    '?m=payment&s=admin_accounts_base' => '账户信息',
                    '?m=payment&s=admin_accounts_cashflow' => '资金流水',
                    '?m=payment&s=admin_accounts_pay' => '账户充值',
                    '?m=payment&s=admin_accounts_bind' => '提现银行',
                    '?m=payment&s=admin_accounts_pickup' => '资金提现',
                    '?m=payment&s=admin_info' => '支付账户',
                    '?m=payment&s=admin_pay' => '',
                ),
            ),
        ),
    ),

    'personal' => array(
        'name' => '个人中心',
        'action' => $config['weburl'] . '/home.php?uid=' . $buid,
    ),

);

foreach ($menu as $key => $v) {
    if (isset($menu[$key]['sub'])) {
        foreach ($menu[$key]['sub'] as $sv) {
            if (is_array($sv['action'])) {
                foreach ($sv['action'] as $sskey => $ssv) {
                    if ($sskey == $_GET['action'] || $sskey == '?m=' . $_GET['m'] . '&s=' . $_GET['s'])
                        $cmenu = $key;
                }
            }
        }
        ksort($menu[$key]['sub']);
    }
    if (isset($admin)) {
        if ($key != 'main' && is_array($menu[$key]['sub'])) {
            $act = each($menu[$key]['sub']);
            $subkey = $act['key'];//取出第一个下标
            $act = @each($menu[$key]['sub'][$subkey]['action']);
            $menu[$key]['action'] = $act['key'];
        }
    }
}
//----------------------------------------

if (isset($tpl)) {
    $cmenu = !empty($cmenu) ? $cmenu : 'main';
    $smenu = !empty($cmenu) ? ($cmenu == 'friend' || $cmenu == 'inquire' ? 'main' : $cmenu) : 'main';
    $tpl->assign("submenu", $menu[$smenu]);
    $tpl->assign("menu", $menu);
    $tpl->assign("cmenu", $cmenu);
}
?>