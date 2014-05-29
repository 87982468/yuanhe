<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 开发资源库前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class Companies extends CI_Controller {

    /**
     * 首页入口
     *
     * @access  public
     * @return  void
     */
	public function index($classid = 0)
	{
		$this->_lists($classid);

	}

	// ------------------------------------------------------------------------
 
    /**
     * 列表页
     *
     * @access  public
     * @return  void
     */
	public function _lists($classid = 0)
	{
		$classid = intval($classid);
		$data['classid'] = $classid;
		$data['class_list'] = $this->_get_classes();

		$db_companies = $this->db->dbprefix('u_m_companies');

		//分页
		if($classid)
		{
			$this->db->where("classid", $classid);
		}
		$rows = 20;
		$segment = 4;
		$this->load->helper('global');
		$data['page'] = page_html("companies/index/{$classid}", $this->db->count_all_results($this->db->dbprefix('u_m_companies')), $rows, $segment);
		$this->db->offset($this->uri->segment($segment, 0));
		$this->db->limit($rows);

		if($classid)
		{
			$this->db->where("classid", $classid);
		}
		$data['list'] = $this->db->get($db_companies)->result();

		$this->load->view('Companies_list', $data);
	}

	// ------------------------------------------------------------------------

    /**
     * 详细页
     *
     * @access  public
     * @return  void
     */
	public function detail($id = 1)
	{
		$id = intval($id);
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_companies'))->row();
		if(!$data['detail'])
		{
			show_404();
		}
		
		$this->load->view('Companies_detail', $data);
	}

	// ------------------------------------------------------------------------

    /**
     * 独立分类
     *
     * @access  public
     * @return  void
     */
	public function _get_classes()
	{
		return $this->db->where('parentid', 0)->get($this->db->dbprefix('u_c_Companies_class'))->result();
	}

	// ------------------------------------------------------------------------

	/**
     * 相关的项目集合
     *
     * @access  public
     * @return  void
     */
	public function project($id = 1, $classid = 0)
	{
		$id = abs($id);
		$data['id'] = $id;
		$classid = $data['classid'] = abs($classid);
		$data['method'] = $this->uri->segment(2);
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_companies'))->row();

		$projects_ids = $this->db->select('projects_ids')->where('companies_id', $id)->get($this->db->dbprefix('u_m_resources'))->result();
		$_arr = array();
		foreach ($projects_ids as $key => $value) {
			foreach (explode('|', $value->projects_ids) as $_ids) {
				$_arr[] = end(explode('-', $_ids));
			}
		}

		//相关项目列表
		$data['projects_list'] = array();
		if($_arr)
		{
			$_arr = array_unique($_arr);

			//分页
			if($classid) $this->db->where('classid', $classid);
			$this->db->where_in('id', $_arr);
			$rows = 20;
			$segment = 5;
			$this->load->library('pagination');
			$config['base_url'] = base_url() . "companies/project/{$id}/{$classid}";
			$config['total_rows'] = $this->db->count_all_results($this->db->dbprefix('u_m_projects'));
			$config['per_page'] = $rows;
			$config['uri_segment'] = $segment;
			$config['display_pages'] = false;
			$config['prev_tag_open'] = $config['next_tag_close'] = false;
			$config['first_link'] = $config['last_link'] = false;
			//下一页
			$config['prev_link'] = false;
			$config['next_link'] = '&nbsp;';
			$config['anchor_class'] = ' class="btnRight case-slide-btn" ';
			$this->pagination->initialize($config);
			$data['next_link'] = $this->pagination->create_links();
			//上一页
			$config['next_link'] = false;
			$config['prev_link'] = '&nbsp;';
			$config['anchor_class'] = ' class="btnLeft case-slide-btn" ';
			$this->pagination->initialize($config);
			$data['pre_link'] = $this->pagination->create_links();

			$this->db->offset($this->uri->segment($segment, 0));
			$this->db->limit($rows);

			if($classid) $this->db->where('classid', $classid);
			$this->db->where_in('id', $_arr);
			$data['projects_list'] = $this->db->get($this->db->dbprefix('u_m_projects'))->result();			
		}

		//获取相关资源的分类
		$data['projects_classes'] = $this->db->where('level', 1)->get($this->db->dbprefix('u_c_projects_class'))->result();

		$this->load->view('companies_project', $data);
	}

	// ------------------------------------------------------------------------

    /**
     * 相关的资源集合
     *
     * @access  public
     * @return  void
     */
	public function resource($id = 1, $classid = 0)
	{
		$id = abs($id);
		$classid = $data['classid'] = abs($classid);
		$data['id'] = $id;
		$data['method'] = $this->uri->segment(2);
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_companies'))->row();

		$resources_where = array('companies_id'=>$id);
		if($classid) $resources_where['classid'] = $classid;

		//分页
		$this->db->where($resources_where);
		$rows = 20;
		$segment = 5;
		$this->load->library('pagination');
		$config['base_url'] = base_url() . "companies/resource/{$id}/{$classid}";
		$config['total_rows'] = $this->db->count_all_results($this->db->dbprefix('u_m_resources'));
		$config['per_page'] = $rows;
		$config['uri_segment'] = $segment;
		$config['display_pages'] = false;
		$config['prev_tag_open'] = $config['next_tag_close'] = false;
		$config['first_link'] = $config['last_link'] = false;
		//下一页
		$config['prev_link'] = false;
		$config['next_link'] = '&nbsp;';
		$config['anchor_class'] = ' class="btnRight case-slide-btn" ';
		$this->pagination->initialize($config);
		$data['next_link'] = $this->pagination->create_links();
		//上一页
		$config['next_link'] = false;
		$config['prev_link'] = '&nbsp;';
		$config['anchor_class'] = ' class="btnLeft case-slide-btn" ';
		$this->pagination->initialize($config);
		$data['pre_link'] = $this->pagination->create_links();
		$this->db->offset($this->uri->segment($segment, 0));
		$this->db->limit($rows);

		//相关资源列表
		$this->db->where($resources_where);
		$data['resources_list'] = $this->db->get($this->db->dbprefix('u_m_resources'))->result();

		//获取相关资源的分类
		$data['resources_classes'] = $this->db->where('level', 2)->get($this->db->dbprefix('u_c_resources_class'))->result();

		$this->load->view('companies_resource', $data);
	}

	// ------------------------------------------------------------------------

}

/* End of file Companies.php */
/* Location: ./application/controllers/products.php */