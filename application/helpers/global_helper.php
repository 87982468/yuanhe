<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * 前台公用函数库
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		lxping
 */

// ------------------------------------------------------------------------

/**
 * 固化样式的分页函数
 *
 * @access	public
 * @param	array
 * @param	bool
 * @return	string
 */
if ( ! function_exists('page_html'))
{
	function page_html($base_url, $total_rows, $per_page, $uri_segment = 3)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');

		$config['base_url'] = base_url() . $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = ' <div class="js-newsitems-page clearfix">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['prev_tag_open'] = '<span class="newspage-mgr" style="margin-right:15px">';
		$config['prev_tag_close'] = '</span>';
		$config['next_tag_open'] = '<span class="newspage-mgr" style="margin-left:15px">';
		$config['next_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="newspage-numlink" style="margin:0">';
		$config['num_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="newspage-numlink" style="margin:0"><a class="on">';
		$config['cur_tag_close'] = '</a></span>';
		$config['anchor_class'] = ''; 

		$CI->pagination->initialize($config); 

		return $CI->pagination->create_links();
	}
}

// ------------------------------------------------------------------------

/**
 * 跳转等待页面
 *
 * @access	public
 * @param	array
 * @param	bool
 * @return	string
 */
if ( ! function_exists('sys_message'))
{
	function sys_message($message, $location = '', $template = 'sys_message')
	{
		if($location)
		{
			if(strpos($location, 'http://') === false)
			{
				$location = base_url() . $location;
			}
			include(APPPATH.'errors/'.$template.'.php');
		}
		//ajax输出
		else
		{
			echo $message;
		}
		exit;
	}
}

// ------------------------------------------------------------------------

/**
 * 生成salt
 *
 * @access	public
 * @param	array
 * @param	bool
 * @return	string
 */
if ( ! function_exists('salt'))
{
	function salt()
	{
		return substr(sha1(time()), -10);
	}
}

// ------------------------------------------------------------------------

/**
 * 跳转等待页面
 *
 * @access	public
 * @param	array
 * @param	bool
 * @return	string
 */
if ( ! function_exists('password'))
{
	function password($password, $salt)
	{
		return sha1($password . $salt);
	}
}

// ------------------------------------------------------------------------

/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */