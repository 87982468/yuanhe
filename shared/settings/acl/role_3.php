<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['current_role']=array (
  'id' => '3',
  'name' => '画家组',
  'rights' => 
  array (
    0 => 'content@view',
    1 => 'content@form@add',
    2 => 'content@form@edit',
    3 => 'user@edit',
  ),
  'models' => 
  array (
    0 => 'news',
    1 => 'messages',
    2 => 'publised_product',
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