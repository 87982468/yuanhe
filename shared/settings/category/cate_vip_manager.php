<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['vip_manager']=array (
  'id' => '9',
  'name' => 'vip_manager',
  'description' => '会员管理',
  'perpage' => '20',
  'level' => '1',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    13 => 
    array (
      'id' => '13',
      'name' => 'vip_m',
      'description' => '会员管理菜单',
      'model' => '9',
      'type' => 'input',
      'length' => '100',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '1',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '13',
  ),
  'searchable' => 
  array (
  ),
);