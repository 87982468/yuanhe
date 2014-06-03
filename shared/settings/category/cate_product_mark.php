<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['product_mark']=array (
  'id' => '11',
  'name' => 'product_mark',
  'description' => '作品标签',
  'perpage' => '20',
  'level' => '1',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    16 => 
    array (
      'id' => '16',
      'name' => 'mark_name',
      'description' => '标签名称',
      'model' => '11',
      'type' => 'input',
      'length' => '20',
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
    0 => '16',
  ),
  'searchable' => 
  array (
    0 => '16',
  ),
);