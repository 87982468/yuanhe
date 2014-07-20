<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['advert']=array (
  'id' => '5',
  'name' => 'advert',
  'description' => '广告管理',
  'perpage' => '20',
  'hasattach' => '1',
  'built_in' => '0',
  'fields' => 
  array (
    35 => 
    array (
      'id' => '35',
      'name' => 'advert_name',
      'description' => '广告名称',
      'model' => '5',
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
    36 => 
    array (
      'id' => '36',
      'name' => 'advert_img',
      'description' => '广告图片',
      'model' => '5',
      'type' => 'file',
      'length' => '1000',
      'values' => 'jpg|png|jpeg|bmp',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '2',
      'editable' => '1',
    ),
    37 => 
    array (
      'id' => '37',
      'name' => 'advert_link',
      'description' => '广告链接',
      'model' => '5',
      'type' => 'input',
      'length' => '500',
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
    42 => 
    array (
      'id' => '42',
      'name' => 'display',
      'description' => '是否显示',
      'model' => '5',
      'type' => 'select',
      'length' => '20',
      'values' => 
      array (
        1 => '显示',
        0 => '不显示',
      ),
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
    0 => '35',
    1 => '37',
    2 => '42',
  ),
  'searchable' => 
  array (
    0 => '35',
    1 => '37',
    2 => '42',
  ),
);