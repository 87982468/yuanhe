<?php


class Cms_mdl extends CI_Model
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

	/*
	 * 查看某一条新闻
	 */
	function getCmsById($id)
	{
		$result= $this->db->where('id',$id)->get($this->db->dbprefix('u_m_cms'))->result_array() ;
		//插入浏览记录
		$this->InsertBrowse_Record($result);
		return $result;
	}

	/*
	 * 获取文章的上一篇
	 */
	function getCmsLastOne($id)
	{

		$sql="SELECT * FROM dili_u_m_cms d
				where create_time<(select create_time from dili_u_m_cms where id=".intval($id).
				") order by create_time desc	limit 0,1";
	return	$this->db->query($sql)->result_array();

	}
	/*
	 * 获取文章的下一篇
	 */
	function getCmsNextOne($id)
	{
		$sql="SELECT * FROM dili_u_m_cms d
				where create_time>(select create_time from dili_u_m_cms where id=".intval($id).
				") order by create_time asc	limit 0,1";
		
		return $this->db->query($sql)->result_array();
	}

	/*
	 * 查看最新的10条新闻
	 */
	function getLastNewCms()
	{
		$result= $this->db->select('*')
		->order_by('create_time','desc')
		->get($this->db->dbprefix('u_m_cms'),10,0)->result_array() ;
		return $result;
	}


	/*
	 * 查看最热的10条新闻
	 */
	function getHotCms()
	{
		$result= $this->db->select('*')
		->order_by('count','desc')
		->get($this->db->dbprefix('u_m_browse_record'),10,0)->result_array() ;
		return $result;
	}


	/*
	 * 查看某类别的新闻 $type: menu ID
	 */
	function getCmsByType($type, $per_page=10, $offset =1,$total=false)
	{

		/*	$where=$type;
		 $result=  $this->db->select('classid')->where('menu_name',$where)->get($this->db->dbprefix('u_c_menu'))->result_array() ;

		 if(count($result)>0)
		 {*/
		//获取书画知识ID
		$menu_name=$type;
		//取总页数

		if($menu_name)
		{
			$table_cms = $this->db->dbprefix('u_m_cms');
			//取总页数
			if($total)
			{
				$table_cms = $this->db->dbprefix('u_m_cms');
				return $this->db
				->where("$table_cms.menu_name",$menu_name)
				->order_by("$table_cms.create_time", 'desc')
				->get($table_cms)
				->result_array();
			}
			//取文章数据
			return $this->db
			->where("$table_cms.menu_name",$menu_name)

			->order_by("$table_cms.create_time", 'desc')
			->get($table_cms,$per_page,$offset)
			->result_array();
		}else
			
		{
			//取总行数
		 if($total)
		 {
		 	$table_cms = $this->db->dbprefix('u_m_cms');
		 	return $this->db

		 	->order_by("$table_cms.create_time", 'desc')
		 	->get($table_cms)
		 	->result_array();
		 }
		 $table_cms = $this->db->dbprefix('u_m_cms');
		 return $this->db
		 ->order_by("$table_cms.create_time", 'desc')
		 ->get($table_cms,$per_page,$offset)
		 ->result_array();
		}
		//}
	}

	function getCmsBySearchText($text)
	{


	}

	/*
	 * 插入文章浏览记录
	 */
	function  InsertBrowse_Record($value)
	{
		$table_browse_record = $this->db->dbprefix('u_m_browse_record');
		$record=$this->db
		->where('cms_id',$value[0]['id'])
		->get($table_browse_record)
		->result_array();
		if($record)
		{
			//更新操作

			$sql="update dili_u_m_browse_record set count=count+1 where id=". intval($record[0]['id']);

		 $this->db->query($sql);

		}
		else {
			//新增操作
			$data['cms_id']=$value[0]['id'];
			$data['cms_title']=$value[0]['title'];
			$data['count']=1;
			$data['menu_name']=$value[0]['menu_name'];

	  $this->db->insert($this->db->dbprefix('u_m_browse_record'), $data);
		}
	}
}
?>