<?php

class User_mdl extends CI_Model
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
	
/**
     * 获取用户组列表
     *
     * @access  public
     * @return  object
     */
	public function get_roles()
	{
		$roles = array();
		foreach ($this->db->select('id, name')->where('id <>', 1)->where('id <>', 2)->get($this->db->dbprefix('roles'))->result_array() as $v)
		{
			$roles[$v['id']] = $v['name'];	
		}
		return $roles;
	}
 /**
     * 添加用户
     *
     * @access  public
     * @param   array
     * @return  bool
     */
	public function add_user($data)
	{
		$data['salt'] = substr(sha1(time()), -10);
		$data['password'] = sha1($data['password'].$data['salt']);
		return $this->db->insert($this->db->dbprefix('admins'), $data);
	}
 /**
     * 根据用户名获取用户信息
     *
     * @access  public
     * @param   string
     * @return  object
     */
	public function get_user_by_name($name)
	{
		return $this->db->where('username', $name)->get($this->db->dbprefix('admins'))->row();
	}
	
	/**
	 * 获取个人详细信息
	 * Enter description here ...
	 * @param unknown_type $uid
	 */
	public function  get_person_detail_info($uid)
	{
	 return $this->db->where('create_user',$uid)->get($this->db->dbprefix('admins'))->row();
	 
	}
	
	/**
	 * 获取个人作品信息
	 * Enter description here ...
	 * @param unknown_type $uid
	 */
	public function get_person_product_info($uid)
	{
		return $this->db->where('create_user',$uid)->get($this->db->dbprefix('admins'))->row();
	}
	
	
}
?>