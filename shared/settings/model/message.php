<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['message']=array (
  'id' => '4',
  'name' => 'message',
  'description' => '留言管理',
  'perpage' => '20',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    31 => 
    array (
      'id' => '31',
      'name' => 'person_product_id',
      'description' => '作品ID',
      'model' => '4',
      'type' => 'int',
      'length' => '8',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '0',
      'editable' => '0',
    ),
    25 => 
    array (
      'id' => '25',
      'name' => 'message_content',
      'description' => '留言内容',
      'model' => '4',
      'type' => 'wysiwyg_basic',
      'length' => '500',
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
    32 => 
    array (
      'id' => '32',
      'name' => 'person_product_name',
      'description' => '作品名称',
      'model' => '4',
      'type' => 'input',
      'length' => '100',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '2',
      'editable' => '1',
    ),
    29 => 
    array (
      'id' => '29',
      'name' => 'display_top_flg',
      'description' => '置顶',
      'model' => '4',
      'type' => 'checkbox',
      'length' => '8',
      'values' => 
      array (
        1 => '置顶',
      ),
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '3',
      'editable' => '0',
    ),
  ),
  'listable' => 
  array (
    0 => '25',
    1 => '32',
    2 => '29',
  ),
  'searchable' => 
  array (
    0 => '25',
    1 => '32',
  ),
);