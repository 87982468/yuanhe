<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 产品中心前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class Projects extends CI_Controller {

    /**
     * 详细内容(默认主入口)
     *
     * @access  public
     * @return  void
     */
	public function detail($id = 1)
	{
		$id = abs($id);
		$data['id'] = $id;
		$data['method'] = $this->uri->segment(2);
		$data['list'] = $this->_lists();
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_projects'))->row();

		$ids = array();
		foreach (explode('|', $data['detail']->resources_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$data['resources_counts'] = $this->db->where_in('id', $ids)->count_all_results($this->db->dbprefix('u_m_resources'));

		$this->load->view('projects_detail', $data);
	}

	// ------------------------------------------------------------------------

     /**
     * 相关的新闻集合
     *
     * @access  public
     * @return  void
     */
	public function news($id = 1)
	{	$page = 0;
		$id = abs($id);
		$page = $data['page'] = abs($page);
		$data['id'] = $id;
		$data['method'] = $this->uri->segment(2);
		$data['list'] = $this->_lists();
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_projects'))->row();

		//分页
		$this->db->where('projects_id', $id);
		$rows = 5;
		$segment = 4;
		$this->load->library('pagination');
		$config['base_url'] = base_url() . "projects/news/{$id}";
		$config['total_rows'] = $this->db->count_all_results($this->db->dbprefix('u_m_news'));
		$config['per_page'] = $rows;
		$config['uri_segment'] = $segment;
		$config['display_pages'] = false;
		$config['prev_tag_open'] = $config['next_tag_close'] = false;
		$config['first_link'] = $config['last_link'] = false;
		//下一页
		$config['prev_link'] = false;
		$config['next_link'] = '>';
		$config['anchor_class'] = ' class="project-state-btn" style="right:0" ';
		$this->pagination->initialize($config);
		$data['next_link'] = $this->pagination->create_links();
		//上一页
		$config['next_link'] = false;
		$config['prev_link'] = '<';
		$config['anchor_class'] = ' class="btnLeft project-state-btn" ';
		$this->pagination->initialize($config);
		$data['prev_link'] = $this->pagination->create_links();

		$this->db->order_by('create_time', 'DESC');
		$this->db->offset($this->uri->segment($segment, 0));
		$this->db->limit($rows);

		$this->db->where('projects_id', $id);
		$data['news_list'] = $this->db->get($this->db->dbprefix('u_m_news'))->result();

		$ids = array();
		foreach (explode('|', $data['detail']->resources_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$data['resources_counts'] = $this->db->where_in('id', $ids)->count_all_results($this->db->dbprefix('u_m_resources'));

		$this->load->view('projects_news', $data);
	}

	// ------------------------------------------------------------------------

    /**
     * 相关的资源集合
     *
     * @access  public
     * @return  void
     */
	public function resource($id = 1)
	{
		$id = abs($id);
		$data['id'] = $id;
		$data['method'] = $this->uri->segment(2);
		$data['list'] = $this->_lists();
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_projects'))->row();

		//相关资源分类列表
		$data['resources_classes'] = $this->_get_resource_classes();
		$_arr = array();
		foreach ($data['resources_classes'] as $key => $value) {
			foreach ($value['sub_classid'] as $k => $v) {
				$_arr[] = 'classid_' . $v->classid;
			}
		}

		//相关资源列表
		$ids = array();
		foreach (explode('|', $data['detail']->resources_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$resources_lists = $this->db->where_in('id', $ids)->order_by('static', 'desc')->group_by('classid')->limit(100)->get($this->db->dbprefix('u_m_resources'))->result();
		if($resources_lists){
			foreach ($resources_lists as $key => $value) {
				$data['resources_lists']['classid_' . $value->classid] = $value;
				$data['resources_lists'] = array_merge(array_flip($_arr), $data['resources_lists']);
			}
		}
		$data['resources_counts'] = $this->db->where_in('id', $ids)->count_all_results($this->db->dbprefix('u_m_resources'));

		$this->load->view('projects_resource', $data);
	}

	// ------------------------------------------------------------------------

	/**
     * 项目的独立分类
     *
     * @access  public
     * @return  void
     */
	public function _get_resource_classes()
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

    /**
     * 列表
     *
     * @access  public
     * @return  void
     */
	public function _lists()
	{
		return $this->db->get($this->db->dbprefix('u_m_projects'))->result();
	}

	// ------------------------------------------------------------------------
}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */