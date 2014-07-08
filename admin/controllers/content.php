<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
/**
 * DiliCMS
 *
 * 一款基于并面向CodeIgniter开发者的开源轻型后端内容管理系统.
 *
 * @package     DiliCMS
 * @author      DiliCMS Team
 * @copyright   Copyright (c) 2011 - 2012, DiliCMS Team.
 * @license     http://www.dilicms.com/license
 * @link        http://www.dilicms.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * DiliCMS 内容模型内容管理控制器
 *
 * @package     DiliCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Jeongee
 * @link        http://www.dilicms.com
 */
class Content extends Admin_Controller
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

	// ------------------------------------------------------------------------

	/**
	 * 默认入口(列表页)
	 *
	 * @access  public
	 * @return  void
	 */
	public function view()
	{

		$this->_view_post();
	}

	// ------------------------------------------------------------------------

	/**
	 * 内容列表页
	 *
	 * @access  public
	 * @return  void
	 */
	public function _view_post()
	{
		$model = $this->input->get('model', TRUE);
		if ( ! $model AND $this->acl->_default_link)
		{
			redirect($this->acl->_default_link);
		}
		$this->_check_permit();
		if ( ! $this->platform->cache_exists(DILICMS_SHARE_PATH . 'settings/model/' . $model . '.php'))
		{
			$this->_message('不存在的模型！', '', FALSE);
		}
		$this->plugin_manager->trigger('reached');
		$this->settings->load('model/' . $model);
		$data['model'] = $this->settings->item('models');
		$data['model'] = $data['model'][$model];
		$this->load->library('form');
		$this->load->library('field_behavior');
		$data['provider'] = $this->_pagination($data['model']);
		$data['bread'] = make_bread(Array(
			'内容管理' => '',
		$data['model']['description'] => site_url('content/view?model=' . $data['model']['name']),
		));
		$this->_template('content_list', $data);
	}

	// ------------------------------------------------------------------------

	/**
	 * 分页处理
	 *
	 * @access  private
	 * @param   array
	 * @return  array
	 */
	private function _pagination($model)
	{
		$this->load->library('pagination');
		$config['base_url'] = backend_url('content/view');
		$config['per_page'] = $model['perpage'];
		$config['uri_segment'] = 3;
		$config['suffix'] = '?model=' . $model['name'];
			
		// 判断权限,如果用户role不是0 和1则只显示create_user是会员追加的数据,可以进行显示
		$condition = array('id >' => '0');

		$this->load->library('session');

		$roleid = $this->session->userdata('roleid');
		$uid=$this->session->userdata('uid');
		//画家组只显示自己添加的数据
		if ($roleid==3)
		{
			$roleCondition=array('create_user'=>$uid);
			$condition= array_merge($condition,$roleCondition);
		}


		$data['where'] = array();

		foreach ($model['searchable'] as $v)
		{
			$this->field_behavior->on_do_search($model['fields'][$v], $condition, $data['where'], $config['suffix']);
		}

		$this->plugin_manager->trigger('querying', $condition);

		$config['total_rows'] = $this->db->where($condition)->count_all_results($this->db->dbprefix('u_m_') . $model['name']);

		$this->db->from($this->db->dbprefix('u_m_') . $model['name']);
		$this->db->select('id, create_time');
		$this->db->where($condition);

		$this->field_behavior->set_extra_condition();
		foreach ($model['listable'] as $v)
		{
			$this->db->select($model['fields'][$v]['name']);
		}

		$this->db->order_by('create_time', 'DESC');
		$this->db->offset($this->uri->segment($config['uri_segment'], 0));
		$this->db->limit($config['per_page']);

		$data['list'] = $this->db->get()->result();

		$this->plugin_manager->trigger('listing', $data['list']);

		$config['first_url'] = $config['base_url'] . $config['suffix'];

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		return $data;
	}

	// ------------------------------------------------------------------------

	/**
	 * 添加/修改入口
	 *
	 * @access  public
	 * @return  void
	 */
	public function form()
	{
		$this->_save_post();
	}

	// ------------------------------------------------------------------------

	/**
	 * 添加/修改表单显示/处理函数
	 *
	 * @access  public
	 * @return  void
	 */
	public function _save_post()
	{
		$model = $this->input->get('model', TRUE);
		$this->settings->load('model/' . $model);
		$data['model'] = $this->settings->item('models');
		$data['model'] = $data['model'][$model];
		$id = $this->input->get('id');

		$data['button_name'] = $id ? '编辑' : '添加';
		$data['bread'] = make_bread(Array(
			'内容管理' => '',
		$data['model']['description'] => site_url('content/view?model=' . $data['model']['name']),
		$data['button_name'] => '',
		));

		if ($id)
		{
			$this->_check_permit('edit');
			$data['content'] = $this->db->where('id',$id)->get($this->db->dbprefix('u_m_') . $model)->row_array();
			$data['attachment'] = $this->db->where('model', $data['model']['id'])
			->where('content', $id)
			->where('from', 0)
			->get($this->db->dbprefix('attachments'))
			->result_array();
		}
		else
		{
			$this->_check_permit('add');
			$data['content'] = array();
		}

		$this->load->library('form_validation');

		foreach ($data['model']['fields'] as $v)
		{
			if ($v['rules'] != '')
			{
				$this->form_validation->set_rules($v['name'], $v['description'], str_replace(",", "|", $v['rules']));
			}
		}


		$this->load->library('form');
		$this->load->library('field_behavior');
		if ($this->form_validation->run() == FALSE)
		{
			$this->_template('content_form', $data);
		}
		else
		{
			$modeldata = $data['model'];
			$data = array();
			foreach ($modeldata['fields'] as $v)
			{
				if ($v['editable'])
				{
					$this->field_behavior->on_do_post($v, $data);
				}

			}
			$attachment = $this->input->post('uploadedfile', TRUE);
			// cxh 判断$attachment第一个字符是否是','
			if ($attachment != '0'){
				$firstStr=substr($attachment,0,1);
				if($firstStr)
				$attachment=substr($attachment,1,strlen($attachment)-1);
			}
			//cxh 判断$attachment第一个字符是否是','
			if ($id)
			{

				$data['update_time'] = $this->session->_get_time();
				$data['update_user'] = $this->_admin->uid;
				$this->plugin_manager->trigger('updating', $data , $id);
				$this->db->where('id', $id);
				$this->db->update($this->db->dbprefix('u_m_') . $model, $data);
				$this->plugin_manager->trigger('updated', $data , $id);
				if ($attachment != '0')
				{
					$this->db->set('model', $modeldata['id'])
					->set('from', 0)
					->set('content', $id)
					->where('aid in (' . $attachment . ')')
					->update($this->db->dbprefix('attachments'));
				}
				$this->_message('修改成功！', 'content/form', TRUE, '?model=' . $modeldata['name'] . '&id=' . $id);
			}
			else
			{
					
				$data['create_time'] = $data['update_time'] = $this->session->_get_time();
				$data['create_user'] = $data['update_user'] = $this->_admin->uid;
				$this->plugin_manager->trigger('inserting', $data);
				$this->db->insert($this->db->dbprefix('u_m_') . $model, $data);
				$id = $this->db->insert_id();
				$this->plugin_manager->trigger('inserted', $data, $id);
				if ($attachment != '0')
				{

					$this->db->set('model', $modeldata['id'])
					->set('from', 0)
					->set('content', $id)
					->where('aid in (' . $attachment . ')')
					->update($this->db->dbprefix('attachments'));
				}
				$this->_message('添加成功！', 'content/view', TRUE, '?model=' . $modeldata['name']);
			}
		}

	}

	// ------------------------------------------------------------------------

	/**
	 * 删除入口
	 *
	 * @access  public
	 * @return  void
	 */
	public function del()
	{
		$this->_check_permit();
		$this->_del_post();
	}

	// ------------------------------------------------------------------------

	/**
	 * 删除处理函数
	 *
	 * @access  public
	 * @return  void
	 */
	public function _del_post()
	{
		$this->_check_permit();
		$ids = $this->input->get_post('id', TRUE);
		$model = $this->input->get('model', TRUE);
		$model_id = $this->db->select('id')->where('name', $model)->get($this->db->dbprefix('models'))->row()->id;
		if ($ids)
		{

			if ( ! is_array($ids))
			{
				$ids = array($ids);
			}
			$this->plugin_manager->trigger('deleting', $ids);
			$attachments = $this->db->select('name, folder, type')
			->where('model', $model_id)
			->where('from', 0)
			->where_in('content', $ids)
			->get($this->db->dbprefix('attachments'))
			->result();
			foreach ($attachments as $attachment)
			{
				$this->platform->file_delete(DILICMS_SHARE_PATH . '../' .
				setting('attachment_dir') . '/' .
				$attachment->folder . '/' .
				$attachment->name . '.' .
				$attachment->type);
			}
			$this->db->where('model', $model_id)->where_in('content', $ids)->where('from', 0)->delete($this->db->dbprefix('attachments'));
			$this->db->where_in('id', $ids)->delete($this->db->dbprefix('u_m_') . $model);
			$this->plugin_manager->trigger('deleted', $ids);
		}
		$this->_message('删除成功！', '', TRUE);
	}

	// ------------------------------------------------------------------------

	/**
	 * 相关附件列表和删除
	 *
	 * @access  public
	 * @param   string
	 * @return  void
	 */
	public function attachment($action = 'list')
	{
		if ($action == 'list')
		{
			$response = array();
			$ids = $this->input->get('ids', TRUE);
			$attachments = 	$this->db->select('aid, realname, name, image, folder, type')
			->where("aid in ($ids)")
			->get($this->db->dbprefix('attachments'))
			->result_array();
			foreach ($attachments as $v)
			{
				array_push($response, implode('|', $v));
			}
			echo implode(',', $response);
		}
		else if($action == 'del')
		{
			$attach = $this->db->select('aid, name, folder, type')
			->where('aid', $this->input->get('id', TRUE))
			->get($this->db->dbprefix('attachments'))
			->row();
			if ($attach)
			{
				$this->platform->file_delete(DILICMS_SHARE_PATH . '../' .
				setting('attachment_dir') . '/' .
				$attach->folder . '/' .
				$attach->name . '.' .
				$attach->type);
				$this->db->where('aid', $attach->aid)->delete($this->db->dbprefix('attachments'));
				echo 'ok';
			}
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * 模糊搜索记录,用于调用内容字段
	 *
	 * @access  public
	 * @param   string
	 * @return  void
	 */
	public function search($model, $field)
	{
		$html = '';
		$q = $this->input->get('keyword', TRUE);
		if ($q AND $results = $this->db->select("id, $field")->like($field, $q)->limit(10)->get('u_m_'.$model)->result())
		{
			foreach ($results as $result)
			{
				$html .= '<p data-text="'.$result->$field.'" onclick="autocomplete_set_value(this,\''.$result->id.'\');">'.str_replace($q, "<span style=\"background:yellow\">$q</span>", $result->$field).'</p>';
			}
		}
		echo $html;
	}


	public function imageEdit()
	{
	 


		$this->load->view('upload_crop');
	}

public function  upload_photo()
	{

		$config['upload_path'] = './img/user_head';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '4096';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);//加载upload类
		if(!$this->upload->do_upload('photo_src')){ //一定要写表单对应字段
			echo 0; //失败返回给ajax请求0
		}else{
			$data = $this->upload->data();
			echo $data['file_name'];//成功后返回相对路径+图片名
		}
	}
	//生产裁剪后图片
	public function  save_photo()
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = $_POST['photo_url'];
		$config['new_image'] = './img/user_head/'.'用户ID'.'.jpg';
		$config['maintain_ratio'] = FALSE;//保证设置的长宽有效
		$config['x_axis'] = $_POST['p_x']*$_POST['p_k']; //一定要乘以p_k，因为这里存放的
		$config['y_axis'] = $_POST['p_y']*$_POST['p_k']; //是原图而不是浏览器上经过缩放的
		$config['width'] = $_POST['p_w']*$_POST['p_k'];//的图
		$config['height'] = $_POST['p_h']*$_POST['p_k'];
		//$this->load->library('image_lib', $config);
		if ( ! $this->image_lib->crop())
		{
			echo $this->image_lib->display_errors();
		}else{
			//裁剪完毕
		}
	}

	// ------------------------------------------------------------------------

}

/* End of file content.php */
/* Location: ./admin/controllers/content.php */
