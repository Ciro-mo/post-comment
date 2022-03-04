<?php 

namespace App\Controllers;

use App\Models\Post;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
    // Homepage action
	public function index()
	{
        //$routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());

        $post= new Post();
        $Posts= $post->all();

        require_once APP_ROOT . '/views/home.php';
	}
}