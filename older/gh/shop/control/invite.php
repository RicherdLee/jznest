<?php
/**
 * 邀请返利页面
 * by 锦尚中国 ww w.33 ha o.c om 
 */
defined('InShopNC') or exit('Access Invalid!');
class inviteControl extends BaseHomeControl{
	public function indexOp(){
		Tpl::showpage('invite');
	}
}
