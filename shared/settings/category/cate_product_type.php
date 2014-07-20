<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['product_type']=array (
  'id' => '2',
  'name' => 'product_type',
  'description' => '作品分类',
  'perpage' => '20',
  'level' => '2',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    12 => 
    array (
      'id' => '12',
      'name' => 'type_name',
      'description' => '分类名称',
      'model' => '2',
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
  ),
  'listable' => 
  array (
    0 => '12',
  ),
  'searchable' => 
  array (
    0 => '12',
  ),
);