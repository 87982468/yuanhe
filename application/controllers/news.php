<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新闻中心前台管理器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      lxping
 */
class News extends CI_Controller {

    /**
     * 首页入口
     *
     * @access  public
     * @return  void
     */
	public function index()
	{
		//推荐的一篇新闻
		$data['detail'] = $this->db->select('id,title,intro,cover,update_time')->order_by('sort', 'DESC')->limit(1)->get($this->db->dbprefix('u_m_news'))->row();
		//分页
		$rows = 20;
		$this->load->helper('global');
		$data['page'] = page_html('news/index', $this->db->count_all_results($this->db->dbprefix('u_m_news')), $rows);
		$this->db->order_by('create_time', 'DESC');
		$this->db->offset($this->uri->segment(3, 0));
		$this->db->limit($rows);

		$data['index_list'] = $this->db->get($this->db->dbprefix('u_m_news'))->result();
		$data['classid'] = $data['subclassid'] = 0;
		$data['class_list'] = $this->_get_classes();
		$this->load->view('news_index', $data);
	}

	// ------------------------------------------------------------------------
 
    /**
     * 列表页
     *
     * @access  public
     * @return  void
     */
	public function lists($classid = 0, $subclassid = 0)
	{
		$classid = intval($classid);
		$subclassid = intval($subclassid);
		$data['classid'] = $classid;
		$data['subclassid'] = $subclassid;
		if($classid)
		{
			if($subclassid)
			{
				$_w['subclassid'] = $subclassid;
			}
			$_w['classid'] = $classid;
		}

		//分页
		$rows = 20;
		$segment = 5;
		$this->load->helper('global');
		
		$data['page'] = page_html("news/lists/{$classid}/{$subclassid}", $this->db->count_all_results($this->db->dbprefix('u_m_news')), $rows, $segment);
		$this->db->order_by('create_time', 'DESC');
		$this->db->offset($this->uri->segment($segment, 0));
		$this->db->limit($rows);

		$this->db->where($_w);
		$data['list'] = $this->db->get($this->db->dbprefix('u_m_news'))->result();
		$data['class_list'] = $this->_get_classes($classid);
		$this->load->view('news_list', $data);
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
		$data['detail'] = $this->db->where('id', $id)->get($this->db->dbprefix('u_m_news'))->row();
		if(! $data['detail'])
		{
			show_404();
		}

		$data['classid'] = $data['detail']->classid;
		$data['subclassid'] = $data['detail']->subclassid;
		$data['class_list'] = $this->_get_classes($data['detail']->classid);

		//相关推荐
		if($data['detail'])
		{
			$recommend_where = array();
			if($data['detail']->recommend1)
			{
				$recommend_where[] = $data['detail']->recommend1;
			}
			if($data['detail']->recommend2)
			{
				$recommend_where[] = $data['detail']->recommend2;
			}
			if($recommend_where)
			{
				$data['recommend'] = $this->db->where_in('id', $recommend_where)->get($this->db->dbprefix('u_m_news'))->result();
			}
		}

		//上一条
		$data['pre_news'] = $this->db->query("select id,title from ". $this->db->dbprefix('u_m_news') ." where id < '$id' order by id DESC limit 1")->row();
		//上一条
		$data['next_news'] = $this->db->query("select id,title from ". $this->db->dbprefix('u_m_news') ." where id > '$id' order by id DESC limit 1")->row();

		$this->load->view('news_detail', $data);
	}

	// ------------------------------------------------------------------------

    /**
     * 独立分类 + 二级栏目分类
     *
     * @access  public
     * @return  void
     */
	public function _get_classes($classid = 0)
	{
		if($classid == 1 || $classid == 2)
		{
			$_news_class_key = array(
						1 => 'projects', //项目管理
						2 => 'resources', //资源管理
					);
			$new_class_sub = $this->db->where('`level` = 2 and `parentid` is not null', null, false)->get($this->db->dbprefix('u_c_' . $_news_class_key[$classid] . '_class'))->result();
			//默认输出2级分类
			if($new_class_sub)
			{
				return $new_class_sub;
			}
			else
			{
				return $this->db->where('`level` = 1 and `parentid` is not null', null, false)->get($this->db->dbprefix('u_c_' . $_news_class_key[$classid] . '_class'))->result();
			}
		}
		return $this->db->where('parentid', 0)->get($this->db->dbprefix('u_c_news_class'))->result();
	}

	// ------------------------------------------------------------------------

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */