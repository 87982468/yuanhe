<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新闻中心前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class Resources extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->uid = $this->session->userdata('uid');
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->_post = $this->input->post(null, true);
            $this->load->helper('global');
            $this->load->library('form_validation');
        }
    }

    /**
     * 首页入口
     *
     * @access  public
     * @return  void
     */
	public function index()
	{
        $data['lists'] = $this->db->select('id,classid,update_time,title,intro')->where(array('create_user'=>$this->uid))->get($this->db->dbprefix('u_m_resources'))->result();
		$this->load->view('u/resources_list', $data);
	}

	// ----------------------------------------------------------------------

    /**
     * 新增
     *
     * @access  public
     * @return  void
     */
    public function add()
    {
        $this->load->view('u/resources_list');
    }

    // ------------------------------------------------------------------------

    /**
     * 修改
     *
     * @access  public
     * @return  void
     */
    public function edit($id)
    {
        $id = intval($id);
        $data['detail'] = $this->db->select('id,classid,update_time,title,intro,info')->where('id', $id)->get($this->db->dbprefix('u_m_resources'))->row();
        if(! $data['detail'])
        {
            show_404();
        }
        $this->load->view('u/resources_list', $data);
    }

    // ------------------------------------------------------------------------

    /**
     * 新增
     *
     * @access  public
     * @return  void
     */
    public function del($id)
    {
        $id = intval($id);
        $title = $this->db->select('title')->where('id', $id)->get($this->db->dbprefix('u_m_resources'))->row()->title;
        if(! $title)
        {
            show_404();
        }
        else
        {
            $this->load->helper('global');
            sys_message("“{$title}”删除成功", 'u/resources');
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */