<?php 
namespace App\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Symfony\Component\Routing\RouteCollection;

class PostController
{
    // Show the post 
    public function show(int $id)
    {

      //Get post
      $post= new Post();
      $post_page= $post->getPost($id);
      //Comment
      $comment= new Comment();
      $comment_post= $comment->get($id);
      

      require_once APP_ROOT . '/views/post.php';
    }

    // Create a new post 
    public function create()
    {
      require_once APP_ROOT . '/views/new-post.php';
    }

    // Store post 
    public function store()
    {
      $post= new Post();
      $post->store($_POST['name_author'], $_POST['title_post'], $_POST['introtext'], $_POST['fulltext']);

      require_once APP_ROOT . '/views/new-post.php';
  
    }
}