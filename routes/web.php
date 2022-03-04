<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('home', new Route(constant('URL_SUBFOLDER'), array('controller' => 'PageController', 'method'=>'index'), array()));
$routes->add('home', new Route(constant('URL_SUBFOLDER') . '/index.php', array('controller' => 'PageController', 'method'=>'index'), array()));

$routes->add('post', new Route(constant('URL_SUBFOLDER') . '/index.php/post/{id}', array('controller' => 'PostController', 'method'=>'show'), array('id' => '[0-9]+')));
$routes->add('new-post', new Route(constant('URL_SUBFOLDER') . '/index.php/new-post', array('controller' => 'PostController', 'method'=>'create'), array()));
$routes->add('store-post', new Route(constant('URL_SUBFOLDER') . '/index.php/store-post', array('controller' => 'PostController', 'method'=>'store'), array()));

$routes->add('new-comment', new Route(constant('URL_SUBFOLDER') . '/index.php/post/new-comment', array('controller' => 'CommentController', 'method'=>'create'), array()));
