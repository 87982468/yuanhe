<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['cate_models']['product_type']=array (
  'id' => '10',
  'name' => 'product_type',
  'description' => '作品标签',
  'perpage' => '20',
  'level' => '1',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    14 => 
    array (
      'id' => '14',
      'name' => 'type_name',
      'description' => '作品标签',
      'model' => '10',
      'type' => 'input',
      'length' => '50',
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
    15 => 
    array (
      'id' => '15',
      'name' => 'sort',
      'description' => '排序',
      'model' => '10',
      'type' => 'int',
      'length' => '8',
      'values' => '0',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '2',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '14',
    1 => '15',
  ),
  'searchable' => 
  array (
  ),
);