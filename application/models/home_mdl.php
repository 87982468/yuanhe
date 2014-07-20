<?php


class Home_mdl extends CI_Model
{
	/**
	 * 构造函数
	 *
	 * @access  public
	 * @return  void
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * 获取菜单
	 *
	 * @access  public
	 * @return  object
	 */
	public function get_Menu()
	{
			
		return  $this->db->select('classid,parentid,level, menu_name,menu_link,sort')->order_by('parentid ,sort', 'ASC')->get($this->db->dbprefix('u_c_menu'))->result_array() ;
	}



	public function  get_ShuHuaZhiShiLanMu()
	{

		$where="书画知识";
		$result=  $this->db->select('classid')->where('menu_name',$where)->get($this->db->dbprefix('u_c_menu'))->result_array() ;

		if(count($result)>0)
		{
			//获取书画知识ID
			$shuHuaZhiShiID=$result[0]['classid'];
			$result= $this->db->select('classid,menu_name')->where('parentid',$shuHuaZhiShiID)->order_by('sort', 'ASC')->get($this->db->dbprefix('u_c_menu'))->result_array() ;
		}


		return $result;
	}


	/**
	 * 获取书画知识的信息
	 * Enter description here ...
	 */
	public function  get_CmsContent()
	{
		$where="书画知识";
		$result=  $this->db->select('classid')->where('menu_name',$where)->get($this->db->dbprefix('u_c_menu'))->result_array() ;

		if(count($result)>0)
		{
			//获取书画知识ID
			$shuHuaZhiShiID=$result[0]['classid'];


			$table_menu = $this->db->dbprefix('u_c_menu');
			$table_cms = $this->db->dbprefix('u_m_cms');

			return $this->db->select("$table_cms.smallimage,$table_cms.imgSendFlg, $table_cms.title, $table_cms.detail_info, $table_cms.id, $table_menu.menu_name")
			->where('parentid',$shuHuaZhiShiID)
			->from($table_menu)
			->join($table_cms, "$table_menu.classid = $table_cms.menu_name")
			->order_by('sort', 'ASC')
			->get()
			->result_array();
		}

	}

	public function  get_CmsByType($type)
	{
		//'书画动态'
		$classid=$this->get_MenuClassId($type);
			
		print $classid;
		$table_menu = $this->db->dbprefix('u_c_menu');
		$table_cms = $this->db->dbprefix('u_m_cms');

		return $this->db->select("$table_cms.smallimage,$table_cms.imgSendFlg, $table_cms.title, $table_cms.detail_info, $table_cms.id, $table_menu.menu_name,$table_cms.menu_name")
		->where("$table_cms.menu_name",$classid)
		->from($table_menu)
		->join($table_cms, "$table_menu.classid = $table_cms.menu_name")
		->order_by('sort', 'ASC')
		
		->get(0,6)//只取前6条数据
		->result_array();
	}

	public function get_MenuClassId($menuName)
	{
		if($menuName)
		{
			$result=  $this->db->select('classid')->where('menu_name',$menuName)->get($this->db->dbprefix('u_c_menu'))->result_array() ;

			if(count($result)>0)
			{

			 return $result[0]['classid'];
			}
		}
		return '';
	}
	
	
	/*
	 * 获取查询关键字
	 */
	public function get_Searchkey()
	{
	return  $this->db->select('key,display')->where('display',1)->order_by('key', 'ASC')->get($this->db->dbprefix('u_m_search_key'))->result_array() ;
	}
	
	/*
	 * 获取广告推广图片
	 */
	public function get_Advert()
	{
	return  $this->db->select('advert_name,advert_img,advert_link')->where('display',1)->order_by('advert_name', 'ASC')->get($this->db->dbprefix('u_m_advert'))->result_array() ;
	}

}
?>