<?php
class m2n_hook_resources extends   DiliCMS_Plugin_Controller{

public function __construct()
{
	$this->name = 'm2n_hook_resources';
	$this->app = & get_instance();
	$this->app->load->model('m2n_mdl');
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
	public function updated($data, $id){
		//资源表和产品表多对多
		$this->app->m2n_mdl->db_m2n(array('resources','products'), $id, $this->app->input->post('old_products_ids'), $data['products_ids']);
		//资源表和项目表多对多
		$this->app->m2n_mdl->db_m2n(array('resources','projects'), $id, $this->app->input->post('old_projects_ids'), $data['projects_ids']);

		//存储属性项
		$attribute_lists = $this->app->input->post('attribute');
		if($attribute_lists)
		{
			foreach ($attribute_lists as $classid => $title)
			{
				$this->db->where(array('resources_classid'=>$classid, 'resources_id'=>$id));
				if($this->db->get($this->db->dbprefix('resources_attributes'))->row())
				{
					//修改
					if($title)
					{
						$this->db->where(array('resources_classid'=>$classid, 'resources_id'=>$id));
						$this->db->update($this->db->dbprefix('resources_attributes'), array('title'=>$title));
					}
					//删除
					else
					{
						$this->db->where(array('resources_classid'=>$classid, 'resources_id'=>$id));
						$this->db->delete($this->db->dbprefix('resources_attributes'));
					}
				}
				//新增
				else
				{
					$this->db->insert($this->db->dbprefix('resources_attributes'), array('resources_classid'=>$classid, 'resources_id'=>$id, 'title'=>$title));
				}
			}
		}
	}
	
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
	public function rendered($content){
		if($content)
		{
			echo '<input type="hidden" name="old_products_ids" value="'.$content['products_ids'].'">';
			echo '<input type="hidden" name="old_projects_ids" value="'.$content['projects_ids'].'">';

			//显示属性项
			$class_lists = $this->db->where(array('level'=>$content['classid']))->get($this->db->dbprefix('u_c_resources_class'))->result();
			if($class_lists)
			{
				foreach ($class_lists as $value) {
					$this->db->where(array('resources_classid'=>$value->classid, 'resources_id'=>$content['id']));
					$row = $this->db->get($this->db->dbprefix('resources_attributes'))->row();
					echo '<tr><th>'. $value->title .'</th><td><input class="normal" type="text" autocomplete="off" name="attribute['. $value->classid .']" value="'. ($row ? $row->title : '') .'"></td></tr>';
				}
			}
		}
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