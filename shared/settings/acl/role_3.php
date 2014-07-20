<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['current_role']=array (
  'id' => '3',
  'name' => '画家组',
  'rights' => 
  array (
    0 => 'content@view',
    1 => 'content@form@add',
    2 => 'content@form@edit',
    3 => 'content@save@add',
    4 => 'content@save@edit',
    5 => 'content@del',
  ),
  'models' => 
  array (
    0 => 'cms',
    1 => 'person_product',
    2 => 'person_detail_info',
    3 => 'message',
  ),
  'category_models' => 
  array (
    0 => '0',
  ),
  'plugins' => 
  array (
    0 => '0',
  ),
);