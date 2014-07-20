<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['plugins']=array (
  'm2n' => 
  array (
    'classmap' => 
    array (
      'news' => 'plugins/m2n/hooks/m2n_hook_news.php',
      'products' => 'plugins/m2n/hooks/m2n_hook_products.php',
      'projects' => 'plugins/m2n/hooks/m2n_hook_projects.php',
      'resources' => 'plugins/m2n/hooks/m2n_hook_resources.php',
      'resources_class' => 'plugins/m2n/hooks/m2n_hook_resources_class.php',
    ),
    'menus' => 
    array (
    ),
    'access' => '0',
  ),
  'helloworld' => 
  array (
    'classmap' => 
    array (
    ),
    'menus' => 
    array (
    ),
    'access' => '0',
  ),
);