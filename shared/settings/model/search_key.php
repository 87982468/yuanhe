<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['search_key']=array (
  'id' => '6',
  'name' => 'search_key',
  'description' => '查询关键字',
  'perpage' => '20',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    40 => 
    array (
      'id' => '40',
      'name' => 'key',
      'description' => '关键字',
      'model' => '6',
      'type' => 'input',
      'length' => '200',
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
    41 => 
    array (
      'id' => '41',
      'name' => 'display',
      'description' => '是否显示',
      'model' => '6',
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
      'order' => '2',
      'editable' => '1',
    ),
    45 => 
    array (
      'id' => '45',
      'name' => 'count',
      'description' => '查询次数',
      'model' => '6',
      'type' => 'int',
      'length' => '8',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '3',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '40',
    1 => '41',
    2 => '45',
  ),
  'searchable' => 
  array (
    0 => '40',
    1 => '41',
    2 => '45',
  ),
);