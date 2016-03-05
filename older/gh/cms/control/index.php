<?php
/**
 * cms首页
 *
 *
 **by 锦尚中国 bbs.52jscn.com 运营版*/

defined('InShopNC') or exit('Access Invalid!');
class indexControl extends CMSHomeControl{

	public function __construct() {
		parent::__construct();
        Tpl::output('index_sign','index');
    }
	public function indexOp(){
        Tpl::showpage('index');
	}
}
