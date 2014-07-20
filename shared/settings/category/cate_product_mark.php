<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['product_mark']=array (
  'id' => '1',
  'name' => 'product_mark',
  'description' => '作品关键字',
  'perpage' => '10',
  'level' => '1',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    11 => 
    array (
      'id' => '11',
      'name' => 'mark_name',
      'description' => '关键字名称',
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
      'order' => '1',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '11',
  ),
  'searchable' => 
  array (
    0 => '11',
  ),
);