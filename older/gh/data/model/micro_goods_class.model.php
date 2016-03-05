<?php
/**
 * 微商城推荐商品分类模型
 *
 * 
 *
 *
 * by shopjl 锦尚中国  bbs.52jscn.com 开发
 */
defined('InShopNC') or exit('Access Invalid!');
class micro_goods_classModel extends Model{

    public function __construct(){

        parent::__construct('micro_goods_class');

    }

	/**
	 * 读取列表 
	 * @param array $condition
	 *
	 */
	public function getList($condition,$page=null,$order='',$field='*'){

        $result = $this->field($field)->where($condition)->page($page)->order($order)->select();
        return $result;

	}

    /**
	 * 读取单条记录
	 * @param array $condition
	 *
	 */
    public function getOne($condition,$order=''){

        $result = $this->where($condition)->order($order)->find();
        return $result;

    }

	/*
	 *  判断是否存在 
	 *  @param array $condition
     *
	 */
	public function isExist($condition) {

        $result = $this->getOne($condition);
        if(empty($result)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	/*
	 * 增加 
	 * @param array $param
	 * @return bool
	 */
    public function save($param){

        return $this->insert($param);	

    }
	
	/*
	 * 更新
	 * @param array $update
	 * @param array $condition
	 * @return bool
	 */
    public function modify($update, $condition){

        return $this->where($condition)->update($update);

    }
	
	/*
	 * 删除
	 * @param array $condition
	 * @return bool
	 */
    public function drop($condition){

        return $this->where($condition)->delete();

    }
	
}

