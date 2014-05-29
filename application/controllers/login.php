<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public $uid = 0;

	public $_post = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->uid = $this->session->userdata('uid');
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->_post = $this->input->post(null, true);
			$this->load->helper('global');
			$this->load->library('form_validation');
		}
		else
		{
			if($this->uid)
			{
				if($this->uri->segment(2) != 'me')
				{
					redirect(base_url().'login/me','location');
				}
			}
			else
			{
				if($this->uri->segment(2))
				{
					redirect(base_url().'login','location');
				}
			}
			$this->load->helper('form');
		}
    }

    // ---------------------------------------------------------------------------------------------------

	/**
     * 登录页面
     *
     * @access  public
     * @return  void
     */
	public function index()
	{
		$this->load->view('login');
	}
	
	// ------------------------------------------------------------------------

	/**
     * 登录处理
     *
     * @access  public
     * @return  void
     */
	public function do_login()
	{
		if($this->_post['tel'] && $this->_post['password'])
		{
			//验证手机号合法性
			$this->_v_tel();
			//验证密码合法性
			$this->_v_pw();

			$user = $this->db->where(array('username'=>$this->_post['tel']))->get($this->db->dbprefix('admins'))->row();
			if($user)
			{
				if($user->password == password($this->_post['password'], $user->salt))
				{
					$this->uid = $user->uid;
					$this->session->set_userdata('uid', $this->uid);
					sys_message('登录成功，正在前往资源管理页面', 'login/me');
				}
				sys_message('登录失败，用户密码错误', 'login');
			}
			else
			{
				sys_message('用户名错误，请确认帐号或重新注册', 'login');
			}
		}
		else
		{
			sys_message('用户名和密码不能为空，请重新输入', 'login');
		}	
	}
	
	// ------------------------------------------------------------------------

	/**
     * 注册处理
     *
     * @access  public
     * @return  void
     */
	public function do_register()
	{
		if($this->_post['tel'] && $this->_post['password'] && $this->_post['email'] && $this->_post['realname'])
		{
			//验证手机号合法性
			$this->_v_tel();
			//验证密码合法性
			$this->_v_pw();
			//验证邮箱合法性
			$this->_v_e();
			//验证真实姓名合法性
			$this->_v_rn();

			if($this->db->where('username', $this->_post['tel'])->get($this->db->dbprefix('admins'))->row())
			{
				sys_message('用户名已存在，请更换用户名或直接登录', 'login');
			}
			if($this->db->where('email', $this->_post['email'])->get($this->db->dbprefix('admins'))->row())
			{
				sys_message('邮箱已存在，请更换邮箱重新注册', 'login');
			}
			$this->_post['username'] = $this->_post['tel'];
			$this->_post['salt'] = salt();
			$this->_post['password'] = password($this->_post['password'], $this->_post['salt']);
			$this->_post['role'] = $this->_post['status'] = 0;
			$this->db->insert($this->db->dbprefix('admins'), $this->_post);

			$this->uid = $this->db->insert_id();
			$this->session->set_userdata('uid',  $this->uid);

			//插入一条空的留言记录
			$data['verify_img'] = $data['company_name'] = $data['message'] = '';
			$data['create_time'] = $data['update_time'] = time();
			$data['create_user'] = $data['update_user'] = $this->uid;
			$data['status'] = 0;
			$this->db->insert($this->db->dbprefix('u_m_messages'), $data);

			sys_message('注册成功，正在前往资源管理页面', 'login/me');
 		}
		else
		{
			sys_message('用户名/密码/邮箱/真实姓名不能为空，请重新输入', 'login');
		}
	}
	
	// ------------------------------------------------------------------------

	/**
     * 个人资料展示页
     *
     * @access  public
     * @return  void
     */
	public function me()
	{
		$db_messages = $this->db->dbprefix('u_m_messages');
		$db_admins = $this->db->dbprefix('admins');
		$this->db->from("$db_admins as u");
		$this->db->where('u.uid', $this->uid);
		$this->db->join("$db_messages as m", 'm.create_user = u.uid', 'left');
		$this->db->select('u.tel,u.email,u.realname,m.company_name,m.verify_img,m.status');
		$data = $this->db->get()->row_array();

		$this->load->view('login_me', $data);
	}
	
	// ------------------------------------------------------------------------

	/**
     * 公司资质验证
     *
     * @access  public
     * @return  void
     */
	public function do_verify()
	{
		if(! $this->uid)
		{
			sys_message('您还未登录，请先登录后再试', 'login');
		}
		if($this->db->where(array('create_user'=>$this->uid, 'status'=>1))->get($this->db->dbprefix('u_m_messages'))->row())
		{
			sys_message('公司资质已经通过审核，请勿重复提交', 'login/me');
		}
		$file_name = 'verify';
		if(! empty($_FILES[$file_name]['name']))
		{
			$data['verify_img'] = $this->_do_upload($file_name);
		}
		$data['company_name'] = $this->_post['company'];
		$data['update_time'] = time();
		$data['update_user'] = $this->uid;
		$this->db->update($this->db->dbprefix('u_m_messages'), $data, array('create_user'=>$this->uid, 'status <>'=>1));

		sys_message('资料更新成功，等待管理员审核', 'login/me');
	}
	
	// ------------------------------------------------------------------------

    /**
     * 上传图片处理
     *
     * @access  public
     * @return  void
     */
	function _do_upload($upfile = 'verify')
	{
		$img_dir = '/' . date('Y/m', time());
		$upload_path = setting('attachment_dir') . $img_dir;
		if(! is_dir($upload_path))
		{
			mkdir($upload_path, 0, true);
		}
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size'] = '2000';
		$config['file_name']  = time() . substr(md5(microtime(true) . rand()), 0, 16);


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($upfile))
		{
			show_error();
			sys_message($this->upload->display_errors(), 'login/me');
		} 
		else
		{
			$data = $this->upload->data();
			return $img_dir.'/'.$data['orig_name'];
		}	
	}

	/**
     * 验证手机号合法性
     *
     * @access  public
     * @return  void
     */
	public function _v_tel()
	{
		$v = $this->form_validation;
		if(! ($v->integer($this->_post['tel']) && $v->exact_length($this->_post['tel'], 11)) )
		{
			sys_message('手机号码格式不正确，请重新输入', 'login');
		}
	}

	/**
     * 验证密码合法性
     *
     * @access  public
     * @return  void
     */
	public function _v_pw()
	{
		$v = $this->form_validation;
		if(! ($v->min_length($this->_post['password'], 6) && $v->max_length($this->_post['password'], 16) && $v->alpha_dash($this->_post['password'])) )
		{
			sys_message('密码格式不正确，密码长度6-16个字符，仅支持英文字母、数字、下划线', 'login');
		}
	}

	/**
     * 验证邮箱合法性
     *
     * @access  public
     * @return  void
     */
	public function _v_e()
	{
		if(! $this->form_validation->valid_email($this->_post['email']) )
		{
			sys_message('邮箱格式不正确，请重新输入', 'login');
		}
	}

	/**
     * 验证真实姓名合法性
     *
     * @access  public
     * @return  void
     */
	public function _v_rn()
	{
		$v = $this->form_validation;
		if(! ($v->min_length($this->_post['realname'], 2) && $v->max_length($this->_post['realname'], 4)) )
		{
			sys_message('请正确填写真实姓名', 'login');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */