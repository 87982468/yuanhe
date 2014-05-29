<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 产品中心前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class Products extends CI_Controller {

    /**
     * 详细内容(默认主入口)
     *
     * @access  public
     * @return  void
     */
	public function detail($id = 0)
	{
		$id = abs($id);
		$data['method'] = $this->uri->segment(2);
		$data['list'] = $this->_lists();

		if($id)
		{
			$this->db->where('id', $id);
		}
		else
		{
			$this->db->order_by('create_time', 'DESC');
			$this->db->limit(1);
		}
		$data['detail'] = $this->db->get($this->db->dbprefix('u_m_products'))->row();
		$data['id'] = $data['detail']->id;

		//可配置资源数目
		$ids = array();
		foreach (explode('|', $data['detail']->resources_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$data['resources_counts'] = $this->db->where_in('id', $ids)->count_all_results($this->db->dbprefix('u_m_resources'));

		$this->load->view('products_detail', $data);	
	}

	// ------------------------------------------------------------------------

     /**
     * 相关的项目集合
     *
     * @access  public
     * @return  void
     */
	public function project($id = 1, $page = 0)
	{
		$id = abs($id);
		$page = $data['page'] = abs($page);
		$data['id'] = $id;
		$data['method'] = $this->uri->segment(2);
		$data['list'] = $this->_lists();
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_products'))->row();

		$data['projects_list'] = $this->db->where('products_id', $id)->order_by('begin_time')->limit(5, $page)->get($this->db->dbprefix('u_m_projects'))->result();

		//可配置资源数目
		$ids = array();
		foreach (explode('|', $data['detail']->resources_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$data['resources_counts'] = $this->db->where_in('id', $ids)->count_all_results($this->db->dbprefix('u_m_resources'));

		$this->load->view('products_project', $data);
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
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_products'))->row();

		//相关资源列表
		$ids = array();
		foreach (explode('|', $data['detail']->resources_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$resources_lists = $this->db->where_in('id', $ids)->order_by('static', 'desc')->limit(100)->get($this->db->dbprefix('u_m_resources'))->result();
		foreach ($resources_lists as $key => $value) {
			$data['resources_lists'][$value->classid][] = $value;
		}
		$data['resources_counts'] = $this->db->where_in('id', $ids)->count_all_results($this->db->dbprefix('u_m_resources'));
		//相关资源分类列表
		$data['resources_classes'] = $this->_get_resource_classes();

		$this->load->view('products_resource', $data);
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
		$this->db->order_by('create_time', 'DESC');
		return $this->db->get($this->db->dbprefix('u_m_products'))->result();
	}

	// ------------------------------------------------------------------------

	/**
     * 列表
     *
     * @access  public
     * @return  void
     */
	public function albums($id = 1)
	{
		$id = abs($id);
		$data['id'] = $id;
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_products'))->row();

		$data['albums_lists'] = $this->db->select('realname, name, folder, type')->where(array('model'=>2, 'from'=>0, 'content'=>$id, 'image'=>1))->get($this->db->dbprefix('attachments'))->result();

		$this->load->view('products_albums', $data);
	}

	// ------------------------------------------------------------------------
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */