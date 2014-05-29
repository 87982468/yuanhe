<?php
class m2n_hook_resources_class extends   DiliCMS_Plugin_Controller{

public function __construct()
{
	$this->name = 'm2n_hook_resources_class';
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
	public function inserted($data, $id){
		if($this->input->post('attribute'))
		{
			$attributes = explode('|', $this->input->post('attribute'));
			foreach ($attributes as $title)
			{
				$this->db->insert($this->db->dbprefix('u_c_resources_class'), array('parentid'=>null, 'level'=>$id, 'path'=>'', 'title'=>$title));
			}
		}
	}
	
	/**
     * 模型数据修改入库前
     */
	public function updating(&$data, $id){}	
	
	/**
     * 模型数据修改入库后
     */
	public function updated($data, $id)
	{
		$this->inserted($data, $id);
		$attr_lists = $this->input->post('attr_lists');
		if($attr_lists)
		{
			foreach ($attr_lists as $classid => $attr)
			{
				if($attr)
				{
					$this->db->where('classid', $classid)->update($this->db->dbprefix('u_c_resources_class'), array('title'=>$attr));
				}
				else
				{
					$this->db->delete($this->db->dbprefix('u_c_resources_class'), array('classid'=>$classid));
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
	public function rendered($content)
	{
		$attrHtml = '';
		if($content)
		{
			$attributes = $this->db->where(array('parentid'=>null, 'level'=>$content['classid'], 'path'=>''))->get($this->db->dbprefix('u_c_resources_class'))->result_array();		
			foreach ($attributes as $k => $attr) {
				$attrHtml .= '属性'. ++$k .'：<input class="normal" name="attr_lists['. $attr['classid'] .']" id="title" type="text" style="width:150px" autocomplete="off" value="'. $attr['title'] .'" /><br />';
			}
		}
		echo '<tr><th>属性列表：</th><td>'. $attrHtml  .'<textarea class="hack_xheditor" id="attribute" name="attribute" style="width:300px;height:100px"></textarea><label>用"|"分割添加各个属性名，清空某输入框表示删除该属性</lable></tr>';
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