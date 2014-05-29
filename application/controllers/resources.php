<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 开发资源库前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class Resources extends CI_Controller {

    /**
     * 首页入口
     *
     * @access  public
     * @return  void
     */
	public function index($classid = 0, $orderby = 0)
	{
		$this->_lists($classid, $orderby);

	}

	// ------------------------------------------------------------------------
 
    /**
     * 列表页
     *
     * @access  public
     * @return  void
     */
	public function _lists($classid = 0, $orderby = 1)
	{
		$classid = intval($classid);
		$data['classid'] = $classid;
		$data['class_list'] = $this->_get_classes();

		$db_companies = $this->db->dbprefix('u_m_companies');
		$db_resources = $this->db->dbprefix('u_m_resources');

		//分页
		if($classid)
		{
			$this->db->where("{$db_resources}.classid", $classid);
		}
		$rows = 20;
		$segment = 5;
		$this->load->helper('global');
		$data['page'] = page_html("resources/index/{$classid}/{$orderby}", $this->db->count_all_results($this->db->dbprefix('u_m_resources')), $rows, $segment);
		$this->db->offset($this->uri->segment($segment, 0));
		$this->db->limit($rows);

		if($classid)
		{
			$this->db->where("{$db_resources}.classid", $classid);
		}
		if ($orderby) {
			$this->db->order_by('create_time', 'asc');
		}
		else
		{
			$this->db->order_by('create_time', 'desc');
		}		
		$data['list'] = $this->db->select("{$db_resources}.*,{$db_companies}.title as company_name")
								->join($db_companies, "{$db_resources}.companies_id = {$db_companies}.id", 'left')
								->get($db_resources)->result();

		$this->load->view('resources_list', $data);
	}

	// ------------------------------------------------------------------------

    /**
     * 详细页
     *
     * @access  public
     * @return  void
     */
	public function detail($id)
	{
		$id = intval($id);
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_resources'))->row();
		if(!$data['detail'])
		{
			show_404();
		}

		$data['classid'] = $data['detail'] ? $data['detail']->classid : 0;
		$data['class_list'] = $this->_get_classes();

		//显示属性项
		$class_lists = $this->db->where(array('level'=>$data['classid']))->get($this->db->dbprefix('u_c_resources_class'))->result();
		$data['attributes'] = array();
		foreach ($class_lists as $value) {
			$this->db->where(array('resources_classid'=>$value->classid, 'resources_id'=>$id, 'title <>'=>''));
			$row = $this->db->get($this->db->dbprefix('resources_attributes'))->row();
			if ($row) {
				$data['attributes'][$value->classid]['classid'] = $value->classid;
				$data['attributes'][$value->classid]['title'] = $value->title;
				$data['attributes'][$value->classid]['value'] = $row->title;
			}
		}

		//所属公司
		$data['company'] = $this->db->where('id', $data['detail']->companies_id)->limit(1)->get($this->db->dbprefix('u_m_companies'))->row();
  
		//所属产品集
		$ids = array();
		foreach (explode('|', $data['detail']->products_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$data['products_list'] = $this->db->where_in('id', $ids)->limit(5)->get($this->db->dbprefix('u_m_products'))->result();

		//所属项目集
		$ids = array();
		foreach (explode('|', $data['detail']->projects_ids) as $_ids) {
			$ids[] = end(explode('-', $_ids));
		}
		$data['projects_list'] = $this->db->where_in('id', $ids)->limit(10)->get($this->db->dbprefix('u_m_projects'))->result();

		$this->load->view('resources_detail', $data);
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

/* End of file resources.php */
/* Location: ./application/controllers/products.php */