<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{parent::__construct();
	$this->load->model("Home_mdl");
	}
	public function Index()
	{
		//菜單信息
		$menus=$this->Home_mdl->get_Menu();
		//首页书画知识内容信息
		$artInfo=$this->Home_mdl->get_CmsContent();
		//书画知识栏目
		$shuHuaZhiShiLanMu=$this->Home_mdl->get_ShuHuaZhiShiLanMu();
		$data=array(
            "menuItem"=>$menus,
			"artInfo"=>$artInfo	,
		"ShuHuaZhiShiLanMu"=>$shuHuaZhiShiLanMu
		);
			
		$this->load->view('home',$data);
			

	}
}

?>