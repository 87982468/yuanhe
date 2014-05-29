<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 单页系统前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class Archives extends CI_Controller {

    /**
     * "开发模式"默认页面
     *
     * @access  public
     * @return  void
     */
	public function index()
	{
		$this->load->view('archives_index');
	}
	
	// ------------------------------------------------------------------------

    /**
     * "关于我们"
     *
     * @access  public
     * @return  void
     */
	public function about()
	{
		$this->load->view('archives_about');
	}
	
	// ------------------------------------------------------------------------

    /**
     * "联系合作"
     *
     * @access  public
     * @return  void
     */
	public function contact()
	{
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('global');
        $_uid = $this->session->userdata('uid');
        //必须先登录
        if(! $_uid)
		{
			sys_message('您还未登录，请先登录后再试', 'login');
		}
		
		$data['message'] = '';
		$data = $this->db->select('message, classids, status')->where('create_user', $_uid)->get($this->db->dbprefix('u_m_messages'))->row_array();

		$data['classids'] = explode('|', $data['classids']);

		//获取资源栏目分类
		$data['class_list'] = $this->_get_resources_classes();

		return $this->load->view('archives_contact', $data);
	}
	
	// ------------------------------------------------------------------------

    /**
     * "联系合作表单处理"
     *
     * @access  public
     * @return  void
     */
	public function do_message()
	{	
		$this->load->library('session');
		$this->load->helper('global');
        $_uid = $this->session->userdata('uid');
        //必须先登录
        if(! $_uid)
		{
			sys_message('您还未登录，请先登录后再试', 'login');
		}

		$_post['message'] = $this->input->post('message', true);
		$_post['classids'] = implode('|', $this->input->post('classids', true));
		$data['update_time'] = time();
		$data['update_user'] = $_uid;

		$this->db->update($this->db->dbprefix('u_m_messages'), $_post, array('create_user'=>$_uid));

		sys_message('资源信息发布成功', 'archives/contact');
	}
	
	// ------------------------------------------------------------------------

    /**
     * 获取资源分类
     *
     * @access  public
     * @return  void
     */
	public function _get_resources_classes()
	{
		$parent_classid = $this->db->where('parentid', 0)->get($this->db->dbprefix('u_c_resources_class'))->result();

		$resources_classes = array();
		foreach ($parent_classid as $key => $value) {
			$resources_classes[$key]['parent_classid'] = $value;
			$resources_classes[$key]['sub_classid'] = $this->db->where('parentid', $value->classid)->get($this->db->dbprefix('u_c_resources_class'))->result();
		}
		return $resources_classes;
	}

	// ------------------------------------------------------------------------

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */