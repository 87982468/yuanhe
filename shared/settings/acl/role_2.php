<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['current_role']=array (
  'id' => '2',
  'name' => '超级管理员',
  'rights' => 
  array (
    0 => 'system@password',
    1 => 'system@cache',
    2 => 'setting@site',
    3 => 'setting@backend',
    4 => 'content@view',
    5 => 'content@form@add',
    6 => 'content@form@edit',
    7 => 'content@save@add',
    8 => 'content@save@edit',
    9 => 'content@del',
    10 => 'category_content@view',
    11 => 'category_content@form@add',
    12 => 'category_content@form@edit',
    13 => 'category_content@save@add',
    14 => 'category_content@save@edit',
    15 => 'category_content@del',
  ),
  'models' => 
  array (
    0 => 'companies',
    1 => 'products',
    2 => 'resources',
    3 => 'projects',
    4 => 'news',
    5 => 'messages',
  ),
  'category_models' => 
  array (
    0 => 'companies_class',
    1 => 'resources_class',
    2 => 'projects_class',
    3 => 'news_class',
    4 => 'products_class',
  ),
  'plugins' => 
  array (
    0 => 'm2n',
  ),
);