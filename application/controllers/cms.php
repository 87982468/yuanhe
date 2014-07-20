<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {

	public function __construct()
	{parent::__construct();
	$this->load->model("Cms_mdl");
	$this->load->model("Home_mdl");
	$this->load->helper('cookie');

	}

	/*
	 * 查看单篇文章
	 */
	function View()
	{
		//CMSid
		$id= intval($this->input->get ( 'id' ));

		$result=$this->Cms_mdl->getCmsById($id);
		$lastNewCms=$this->Cms_mdl->getLastNewCms();
		//最热文章
		$hotCms=$this->Cms_mdl->getHotCms();
		//上一篇
		$lastOneCms=$this->Cms_mdl->getCmsLastOne($id);
		//下一篇
		$nextOneCms=$this->Cms_mdl->getCmsNextOne($id);
		$data=array(

			"result"=>$result,
			"lastNewCms"=>$lastNewCms,
			"hotCms"=>$hotCms,
		"lastOneCms"=>$lastOneCms,
		"nextOneCms"=>$nextOneCms
		);
		return $this->load->view('cms_detail',$data);
	}

	/*
	 * 查看类别文章
	 */
	function ViewList()
	{

		//总记录数

		$menuId= $this->input->get ( 'menu' );
		
		$this->load->library('pagination');
		$this->load->helper('url');       //系统的帮助类
		$config['per_page'] = 4; //配置每页显示的记录数
		$totalResult=$this->Cms_mdl->getCmsByType($menuId,$config ['per_page'],$this->uri->segment(3),true);//当前页显示的数据

			
		$number=count($totalResult);
		//路径

		$result=$this->Cms_mdl->getCmsByType($menuId,$config ['per_page'],$this->uri->segment(3),false);//当前页显示的数据

		$config['base_url'] =  base_url()."index.php/cms/viewList";
			
		$config['total_rows'] = $number;  //配置记录总条数

		
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['last_link'] = '末页';
		$config['first_link'] = '首页';
		//配置分页导航当前页两边显示的条数
		$config['num_links'] = 3;
		//配置偏移量在url中的位置
		$config['uri_segment'] = 3;
		$config['cur_page'] = $this->uri->segment(3,0);
		//最新文章
		$lastNewCms=$this->Cms_mdl->getLastNewCms();
		//最热文章
		$hotCms=$this->Cms_mdl->getHotCms();
		
		$this->pagination->initialize($config);
		$pageLink= $this->pagination->create_links();
		$data=array(
		"lastNewCms"=>$lastNewCms,
		"result"=>$result,
		"pageLink"=>$pageLink,
		"hotCms"=>$hotCms
		);



		return $this->load->view('cms_list',$data);


	}
}
?>