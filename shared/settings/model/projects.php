<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['projects']=array (
  'id' => '4',
  'name' => 'projects',
  'description' => '项目管理',
  'perpage' => '10',
  'hasattach' => '1',
  'built_in' => '0',
  'fields' => 
  array (
    23 => 
    array (
      'id' => '23',
      'name' => 'classid',
      'description' => '项目所属分类',
      'model' => '4',
      'type' => 'select_from_model',
      'length' => '8',
      'values' => 'projects_class|title',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '1',
      'editable' => '1',
    ),
    24 => 
    array (
      'id' => '24',
      'name' => 'title',
      'description' => '项目名称',
      'model' => '4',
      'type' => 'input',
      'length' => '150',
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
    27 => 
    array (
      'id' => '27',
      'name' => 'begin_time',
      'description' => '项目启动时间',
      'model' => '4',
      'type' => 'datetime',
      'length' => '0',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '3',
      'editable' => '1',
    ),
    28 => 
    array (
      'id' => '28',
      'name' => 'end_time',
      'description' => '项目截止时间',
      'model' => '4',
      'type' => 'datetime',
      'length' => '0',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '4',
      'editable' => '1',
    ),
    25 => 
    array (
      'id' => '25',
      'name' => 'adv',
      'description' => '广告位图片',
      'model' => '4',
      'type' => 'file',
      'length' => '255',
      'values' => 'jpg|png|jpeg|bmp',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '5',
      'editable' => '1',
    ),
    26 => 
    array (
      'id' => '26',
      'name' => 'cover',
      'description' => '项目封面图',
      'model' => '4',
      'type' => 'file',
      'length' => '255',
      'values' => 'jpg|png|jpeg|bmp',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '6',
      'editable' => '1',
    ),
    29 => 
    array (
      'id' => '29',
      'name' => 'intro',
      'description' => '项目简介',
      'model' => '4',
      'type' => 'textarea',
      'length' => '255',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '7',
      'editable' => '1',
    ),
    30 => 
    array (
      'id' => '30',
      'name' => 'info',
      'description' => '项目详细介绍',
      'model' => '4',
      'type' => 'wysiwyg_basic',
      'length' => '0',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '8',
      'editable' => '1',
    ),
    33 => 
    array (
      'id' => '33',
      'name' => 'sort',
      'description' => '排序',
      'model' => '4',
      'type' => 'int',
      'length' => '8',
      'values' => '0',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '1',
      'order' => '9',
      'editable' => '1',
    ),
    54 => 
    array (
      'id' => '54',
      'name' => 'products_id',
      'description' => '所属产品名称',
      'model' => '4',
      'type' => 'content',
      'length' => '8',
      'values' => 'products|title',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '10',
      'editable' => '1',
    ),
    47 => 
    array (
      'id' => '47',
      'name' => 'resources_ids',
      'description' => '配置资源',
      'model' => '4',
      'type' => 'linked_menu',
      'length' => '0',
      'values' => 'resources_class|title|3|100|1',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '0',
      'listable' => '0',
      'order' => '11',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '23',
    1 => '24',
    2 => '27',
    3 => '28',
    4 => '26',
    5 => '29',
    6 => '33',
  ),
  'searchable' => 
  array (
  ),
);