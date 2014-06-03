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
 * DiliCMS 用户管理控制器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Jeongee
 * @link        http://www.dilicms.com
 */
class User extends CI_Controller
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
		//$this->_check_permit();
		$this->load->model("User_mdl");
		$this->load->library('form');
		$this->load->library('form_validation');
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 默认入口
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function index()
	{

		$data['roles']= $this->User_mdl->get_roles();

		$this->load->view('user_add',$data);
	}

	// ------------------------------------------------------------------------
	  
	/**
     * 添加用户表单页
     *
     * @access  public
     * @return  void
     */
	public function add()
	{
		$this->_add_post();
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 添加用户表单生成/处理函数
     *
     * @access  public
     * @return  void
     */
	public function _add_post()
	{
		$data['roles'] = $this->User_mdl->get_roles();
		
		if ( ! $this->_validate_user_form())
		{
			
			$this->load->view('user_add', $data);
		}
		else
		{
			
			$role_id = $this->User_mdl->add_user($this->_get_form_data());
			
			$this->_message('用户添加成功!', 'user/view', TRUE);	
		}
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 修改用户表单入口
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function edit($id = 0)
	{
		$this->_edit_post($id);
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 修改用户表单生成/处理函数
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function _edit_post($id = 0)
	{
		$data['user'] = $this->User_mdl->get_user_by_uid($id);
		$data['roles'] = $this->User_mdl->get_roles();
		if ( ! $data['user'])
		{
			$this->_message('不存在的用户', '', FALSE);
		}
		if ( ! $this->_validate_user_form($data['user']->username, TRUE))
		{
			$this->_template('user_edit', $data);
		}
		else
		{
			$this->User_mdl->edit_user($id, $this->_get_form_data(TRUE));
			
			$this->_message('用户修改成功!', 'user/edit/' . $id, TRUE);
		}
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 删除用户
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function del($id)
	{
		$user = $this->User_mdl->get_user_by_uid($id);
		if ( ! $user)
		{
			$this->_message('不存在的用户!', '', FALSE);
		}
		$this->User_mdl->del_user($id);
		$this->_message('用户删除成功!', '', FALSE); 
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 检查用户名称是否存在
     *
     * @access  public
     * @param   string
     * @return  bool
     */
	public function _check_user_name($name = '')
	{
		if ($this->User_mdl->get_user_by_name($name))
		{
			$this->form_validation->set_message('_check_user_name', '已经存在的用户名称！');
			return FALSE;		
		}
		return TRUE;
	}	
	
	// ------------------------------------------------------------------------
	
	/**
     * 检查表单数据合法性
     *
     * @access  private
     * @param   string
     * @param   bool
     * @return  bool
     */
	private function _validate_user_form($name = '', $edit = FALSE)
	{
		
		//$this->load->library('form_validation');
		
		$callback = '|callback__check_user_name';
		if ($name AND $name == trim($this->input->post('username', TRUE)))
		{
			$callback = '';
		}
		$this->form_validation->set_rules('username', '用户名称', 'trim|required|min_length[3]|max_length[16]' . $callback);
		if ( ! ($edit AND ! $this->input->post('password', TRUE) AND ! $this->input->post('confirm_password', TRUE)))
		{
			$this->form_validation->set_rules('password', '用户密码', 'trim|required|min_length[6]|max_length[16]');
			$this->form_validation->set_rules('confirm_password', '重复用户密码', 'trim|required|min_length[6]|max_length[16]|matches[password]');
		}
		$this->form_validation->set_rules('email', '用户EMAIL', 'trim|required|valid_email');
		$this->form_validation->set_rules('user_type', '会员类型', 'trim|required');
		
		$this->form_validation->set_rules('telphone','手机号码','trim|required|is_numeric|exact_length[13]');
		
		//$this->form_validation->set_rules('role', '用户组', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->library('form');
			
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	// ------------------------------------------------------------------------
	
	/**
     * 获取表单数据
     *
     * @access  private
     * @param   bool
     * @return  array
     */
	private function _get_form_data($edit = FALSE)
	{
		$data['username'] = $this->input->post('username', TRUE);
		if ( ! ($edit AND ! $this->input->post('password', TRUE) AND ! $this->input->post('confirm_password', TRUE)))
		{
			$data['password'] = $this->input->post('password', TRUE);	
		}
		$data['email'] = $this->input->post('email', TRUE);
		
		$data['status'] = $this->input->post('status', TRUE);
		
		//电话
		$data['telphone']=$this->input->post('telphone',TRUE);
		//备注资料
		$data['memo']=$this->input->post('memo',TRUE);
		//默认状态为冻结状态
		$data['status']="2";
		//会员类型
		$data['user_type']=$this->input->post('user_type',TRUE);
		//角色默认3
		$data['role'] = "3";
		return $data;
	}

	// ------------------------------------------------------------------------
	
}

/* End of file user.php */
/* Location: ./admin/controllers/user.php */