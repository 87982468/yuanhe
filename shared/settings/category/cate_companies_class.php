<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['companies_class']=array (
  'id' => '1',
  'name' => 'companies_class',
  'description' => '公司分类',
  'perpage' => '5',
  'level' => '1',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    1 => 
    array (
      'id' => '1',
      'name' => 'title',
      'description' => '公司分类名称',
      'model' => '1',
      'type' => 'input',
      'length' => '100',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '0',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '1',
  ),
  'searchable' => 
  array (
    0 => '1',
  ),
);