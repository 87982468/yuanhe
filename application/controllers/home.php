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
		//历代名家
		$liDaiMingJia=$this->Home_mdl->get_CmsByType('历代名家');
		
				//成名故事
		$chengMingGuShi=$this->Home_mdl->get_CmsByType('成名故事');
				//文人轶事
		$wenRenYiShi=$this->Home_mdl->get_CmsByType('文人轶事');
				//藏品故事
		$cangPinGuShi=$this->Home_mdl->get_CmsByType('藏品故事');
		//书画
		$shuHuaDongTai=$this->Home_mdl->get_CmsByType('书画动态');
		//广告
		$advertInfo=$this->Home_mdl->get_Advert();
		//检索关键字
		$keyInfo=$this->Home_mdl->get_Searchkey();
		$data=array(
            //"menuItem"=>$menus,
			"artInfo"=>$artInfo	,
		"liDaiMingJia"=>$liDaiMingJia,
			"chengMingGuShi"=>$chengMingGuShi,
			"wenRenYiShi"=>$wenRenYiShi,
			"cangPinGuShi"=>$cangPinGuShi,
		"ShuHuaDongTai"=>$shuHuaDongTai,
		"advertInfo"=>$advertInfo,
		"keyInfo"=>$keyInfo
		);
			
		$this->load->view('home',$data);
			

	}
}

?>