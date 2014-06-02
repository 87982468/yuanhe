<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['publised_product']=array (
  'id' => '7',
  'name' => 'publised_product',
  'description' => '作品发布',
  'perpage' => '20',
  'hasattach' => '1',
  'built_in' => '0',
  'fields' => 
  array (
    65 => 
    array (
      'id' => '65',
      'name' => 'type',
      'description' => '作品标签',
      'model' => '7',
      'type' => 'select_from_model',
      'length' => '50',
      'values' => 'product_type|type_name',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '1',
      'editable' => '1',
    ),
    64 => 
    array (
      'id' => '64',
      'name' => 'product_info',
      'description' => '作品信息',
      'model' => '7',
      'type' => 'wysiwyg_basic',
      'length' => '1000',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '2',
      'editable' => '1',
    ),
    66 => 
    array (
      'id' => '66',
      'name' => 'product_img',
      'description' => '作品图片',
      'model' => '7',
      'type' => 'file',
      'length' => '255',
      'values' => 'jpg|png|jpeg|bmp',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '3',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '65',
    1 => '64',
  ),
  'searchable' => 
  array (
  ),
);