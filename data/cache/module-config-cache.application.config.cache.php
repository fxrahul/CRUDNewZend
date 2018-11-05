<?php
return array (
  'service_manager' => 
  array (
    'aliases' => 
    array (
      'HttpRouter' => 'Zend\\Router\\Http\\TreeRouteStack',
      'router' => 'Zend\\Router\\RouteStackInterface',
      'Router' => 'Zend\\Router\\RouteStackInterface',
      'RoutePluginManager' => 'Zend\\Router\\RoutePluginManager',
      'ValidatorManager' => 'Zend\\Validator\\ValidatorPluginManager',
    ),
    'factories' => 
    array (
      'Zend\\Router\\Http\\TreeRouteStack' => 'Zend\\Router\\Http\\HttpRouterFactory',
      'Zend\\Router\\RoutePluginManager' => 'Zend\\Router\\RoutePluginManagerFactory',
      'Zend\\Router\\RouteStackInterface' => 'Zend\\Router\\RouterFactory',
      'Zend\\Validator\\ValidatorPluginManager' => 'Zend\\Validator\\ValidatorPluginManagerFactory',
    ),
  ),
  'route_manager' => 
  array (
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'home' => 
      array (
        'type' => 'Zend\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'User\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'application' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/application[/:action]',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'user' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/user[/:action[/:id]]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
          ),
          'defaults' => 
          array (
            'controller' => 'User\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
    ),
  ),
  'controllers' => 
  array (
    'factories' => 
    array (
      'Application\\Controller\\IndexController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'User\\Controller\\IndexController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'view_manager' => 
  array (
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => 'D:\\xampp\\htdocs\\crud-git\\module\\User\\config/../view/layout/layout.phtml',
      'application/index/index' => 'D:\\xampp\\htdocs\\crud-git\\module\\Application\\config/../view/application/index/index.phtml',
      'error/404' => 'D:\\xampp\\htdocs\\crud-git\\module\\User\\config/../view/error/404.phtml',
      'error/index' => 'D:\\xampp\\htdocs\\crud-git\\module\\User\\config/../view/error/index.phtml',
      'user/index' => 'D:\\xampp\\htdocs\\crud-git\\module\\User\\config/../view/user/index.phtml',
    ),
    'template_path_stack' => 
    array (
      0 => 'D:\\xampp\\htdocs\\crud-git\\module\\Application\\config/../view',
      1 => 'D:\\xampp\\htdocs\\crud-git\\module\\User\\config/../view',
    ),
  ),
);