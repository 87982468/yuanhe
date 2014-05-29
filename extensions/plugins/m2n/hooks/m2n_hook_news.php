<?php
class m2n_hook_news extends   DiliCMS_Plugin_Controller{

public function __construct()
{
	$this->name = 'm2n_hook_news';
	$this->app = & get_instance();
}

    /**
     * 为操作工具栏新增按钮 
     */
	public function buttons(){}
	
	/**
     * 模型数据新增入库前
     */
	public function inserting(&$data){}
	
	/**
     * 模型数据新增入库后
     */
	public function inserted($data, $id){}
	
	/**
     * 模型数据修改入库前
     */
	public function updating(&$data, $id){}	
	
	/**
     * 模型数据修改入库后
     */
	public function updated($data, $id){}
	
	/**
     * 模型数据删除操作前
     */
	public function deleting(&$ids){}
	
	/**
     * 模型数据删除操作后
     */
	public function deleted($ids){}
	
	/**
     * 模型数据表单展示后
     */
	public function rendered($content)
	{
		//新闻子分类
		// 1 项目新闻   2 资源新闻
		$subclasses['projects'] = $this->db->select('classid,title')->where('`level` = 1 and `parentid` is not null', null, false)->get($this->db->dbprefix('u_c_projects_class'))->result();
		$subclasses['resources'] = $this->db->select('classid,title')->where('`level` = 2 and `parentid` is not null', null, false)->get($this->db->dbprefix('u_c_resources_class'))->result();
		$projects = $resources = '<option value="">请选择</option>';
		$projects_{$content['subclassid']} = $resources_{$content['subclassid']} = 'selected="selected"';
		foreach ($subclasses['projects'] as $v)
		{
			$projects .= '<option value="'. $v->classid .'" '. $projects_{$v->classid} .'>'. $v->title .'</option>';
		}
		foreach ($subclasses['resources'] as $v)
		{
			$resources .= '<option value="'. $v->classid .'" '. $resources_{$v->classid} .'>'. $v->title .'</option>';
		}
		echo <<<EOD
			<script>
			jQuery(function(){
				resources = '$resources';
				projects = '$projects';
				if($("#rad_classid_1").is(":checked")){
					$("#subclassid").html(projects);
				}
				if($("#rad_classid_2").is(":checked")){
					$("#subclassid").html(resources);
				}
				$("#rad_classid_1").click(function(){
					$("#subclassid").html(projects);
				});
				$("#rad_classid_2").click(function(){
					$("#subclassid").html(resources);
				});
			});
			</script>
EOD;
	}

	/**
     * 模型数据列表执行查询前
     */
	public function querying(&$where){}
	
	/**
     * 模型数据列表展示前
     */
	public function listing(&$results){}
	
	/**
     * 模型数据列表展示后
     */
	public function listed($results){}
	
	/**
     * 模型数据列表各记录操作位置
     */
	public function row_buttons($data){}
	
	/**
     * 模型数据进入列表页面开始处理前
     * 
     * 可用于更细化的权限判断
     */
	//注册模型信息进入列表信息动作
	public function reached(){}
}