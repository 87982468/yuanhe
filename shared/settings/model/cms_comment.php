<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['cms_comment']=array (
  'id' => '8',
  'name' => 'cms_comment',
  'description' => '文章评论',
  'perpage' => '20',
  'hasattach' => '0',
  'built_in' => '0',
  'fields' => 
  array (
    53 => 
    array (
      'id' => '53',
      'name' => 'cms_id',
      'description' => '文章ID',
      'model' => '8',
      'type' => 'int',
      'length' => '8',
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
    54 => 
    array (
      'id' => '54',
      'name' => 'cms_title',
      'description' => '文章标题',
      'model' => '8',
      'type' => 'input',
      'length' => '200',
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
    55 => 
    array (
      'id' => '55',
      'name' => 'userID',
      'description' => '用户ID',
      'model' => '8',
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
    56 => 
    array (
      'id' => '56',
      'name' => 'userName',
      'description' => '用户名',
      'model' => '8',
      'type' => 'input',
      'length' => '100',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '4',
      'editable' => '1',
    ),
    57 => 
    array (
      'id' => '57',
      'name' => 'comment',
      'description' => '评论内容',
      'model' => '8',
      'type' => 'input',
      'length' => '200',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => '',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '5',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '53',
    1 => '54',
    2 => '55',
    3 => '56',
    4 => '57',
  ),
  'searchable' => 
  array (
    0 => '53',
    1 => '54',
    2 => '55',
    3 => '56',
    4 => '57',
  ),
);