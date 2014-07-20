<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['menu']=array (
  'id' => '3',
  'name' => 'menu',
  'description' => '栏目分类',
  'perpage' => '20',
  'level' => '2',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    13 => 
    array (
      'id' => '13',
      'name' => 'menu_name',
      'description' => '栏目名称',
      'model' => '3',
      'type' => 'input',
      'length' => '100',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '1',
      'editable' => '1',
    ),
    14 => 
    array (
      'id' => '14',
      'name' => 'menu_link',
      'description' => '链接',
      'model' => '3',
      'type' => 'input',
      'length' => '200',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '2',
      'editable' => '1',
    ),
    15 => 
    array (
      'id' => '15',
      'name' => 'sort',
      'description' => '排序',
      'model' => '3',
      'type' => 'int',
      'length' => '8',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '3',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '13',
    1 => '14',
    2 => '15',
  ),
  'searchable' => 
  array (
    0 => '13',
    1 => '14',
    2 => '15',
  ),
);