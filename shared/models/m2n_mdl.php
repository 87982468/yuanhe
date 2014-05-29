<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
/**
 * DiliCMS
 *
 * 一款基于并面向CodeIgniter开发者的开源轻型后端内容管理系统.
 *
 * @package     DiliCMS
 * @author      DiliCMS Team
 * @copyright   Copyright (c) 2011 - 2012, DiliCMS Team.
 * @license     http://www.dilicms.com/license
 * @link        http://www.dilicms.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * DiliCMS 冗余式多对多表结构存储
 *
 * @package     DiliCMS
 * @subpackage  Models
 * @category    Models
 * @author      lxping
 */
class M2n_mdl extends CI_Model
{
	
	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
	public function __construct()
	{
		parent::__construct();	
	}
	
	// ------------------------------------------------------------------------

	/**
	 * 根据当前栏目填的相关栏目id集合,用遍列的方式将当前栏目的id存储到各个记录的关联字段中
	 *
	 * @access  public
	 * @param $m_n|array 当前栏目名和所关联的栏目名, array(当前栏目名, 关联栏目名)
	 * @param $m_id|int  当前栏目操作记录的id
	 * @param $old_n_ids|string 操作前所关联栏目的id集合,每个id之间用英文'|'分割,为空表示新增
	 * @param $new_n_ids|array 操作后所关联栏目的id集合,每个id之间用英文'|'分割,为空表示删除
	 * @return  bool
	 */
	public function db_m2n($m_n, $m_id, $old_n_ids = '', $new_n_ids = '')
	{
		$old_n_ids = explode('|', $old_n_ids);
		$new_n_ids = explode('|', $new_n_ids);
		
		//无操作行为
		if(! (($old_n_ids || $new_n_ids) && (array_diff($old_n_ids, $new_n_ids) || array_diff($new_n_ids, $old_n_ids)) ) )
		{
			return;
		}
		//当前栏目所对应关联栏目中的关联字段名
		$field_m = $m_n[0] . '_ids';
		//所关联栏目的表名
		$db_n = $this->db->dbprefix("u_m_{$m_n[1]}");

		//新增操作
		if(! $old_n_ids)
		{
			return $this->m2n_action('add', $field_m, $db_n, $m_id, $new_n_ids);
		}
		//删除操作
		elseif(! $new_n_ids)
		{
			return $this->m2n_action('del', $field_m, $db_n, $m_id, $old_n_ids);
		}
		//修改操作
		else
		{
			$ids = array_diff(array_unique(array_merge($old_n_ids, $new_n_ids)), array_intersect($old_n_ids, $new_n_ids));
			return $this->m2n_action('edit', $field_m, $db_n, $m_id, $ids);
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * 根据当前栏目填的相关栏目id集合,用遍列的方式将当前栏目的id存储到各个记录的关联字段中
	 *
	 * @access  public
	 * @param $action|string|'add','del','edit' 当前栏目名和所关联的栏目名, array(当前栏目名, 关联栏目名)
	 * @param $field_m|string 当前栏目所对应关联栏目中的关联字段名
	 * @param $db_n|string  所关联栏目的表名
	 * @param $m_id|int 当前栏目操作记录的id
	 * @param $ids|array 所有需要操作的栏目的id集合
	 * @return  bool
	 */
	public function m2n_action($action, $field_m, $db_n, $m_id, $ids)
	{
			//关联栏目中需要操作的所有记录集
			$result = $this->db->select("id,".$field_m)->where_in('id', $ids)->get($db_n)->result();

			foreach ($result as $key => $value)
			{
				$this->{'_'.$action}($field_m, $db_n, $m_id, $value);
			}
			return true;
	}

	// ------------------------------------------------------------------------

	/**
	 * 新增操作处理
	 *
	 * @access  public
	 * @param $field_m|string 当前栏目所对应关联栏目中的关联字段名
	 * @param $db_n|string  所关联栏目的表名
	 * @param $m_id|int 当前栏目操作记录的id
	 * @param $value|object 关联栏目中需要操作的所有记录集的某个子集
	 * @return  bool
	 */
	public function _add($field_m, $db_n, $m_id, $value)
	{
		$old_ids = explode('|', $value->$field_m);
		$old_ids[] = $m_id;
		$field_m_val = trim(implode('|', array_unique($old_ids)), '|');
		$this->db->update($db_n, array($field_m => $field_m_val), array('id' => $value->id));
		return true;
	}

	// ------------------------------------------------------------------------

	/**
	 * 删除操作处理
	 *
	 * @access  public
	 * @param $field_m|string 当前栏目所对应关联栏目中的关联字段名
	 * @param $db_n|string  所关联栏目的表名
	 * @param $m_id|int 当前栏目操作记录的id
	 * @param $value|object 关联栏目中需要操作的所有记录集的某个子集
	 * @return  bool
	 */
	public function _del($field_m, $db_n, $m_id, $value)
	{
		if(strpos($value->$field_m, $m_id) !== FALSE)
		{
			$old_ids = explode('|', $value->$field_m);
			$field_m_val = implode('|', array_diff($old_ids, array($m_id)));
			$this->db->update($db_n, array($field_m => $field_m_val), array('id' => $value->id));
			return true;
		}
		else
		{
			return false;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * 修改操作处理
	 *
	 * @access  public
	 * @param $field_m|string 当前栏目所对应关联栏目中的关联字段名
	 * @param $db_n|string  所关联栏目的表名
	 * @param $m_id|int 当前栏目操作记录的id
	 * @param $value|object 关联栏目中需要操作的所有记录集的某个子集
	 * @return  bool
	 */
	public function _edit($field_m, $db_n, $m_id, $value)
	{
		if(! $this->_del($field_m, $db_n, $m_id, $value))
		{
			$this->_add($field_m, $db_n, $m_id, $value);
		}
		return true;
	}

	// ------------------------------------------------------------------------

}

/* End of file m2n_model.php */
/* Location: ./shared/models/m2n_model.php */