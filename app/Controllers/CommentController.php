<?php 
namespace App\Controllers;

use App\Models\Comment;
use Symfony\Component\Routing\RouteCollection;

class CommentController
{
    /* 
     * Show the comments of the post 
     * @param int $id
     * */
    public function show(int $id)
    {
      //Get comment
      $comment= new Comment();
      $comment_posst= $comment->get($id);

      require_once APP_ROOT . '/views/comment.php';
    }

    
    /* 
     * Create a new comment
     * */
    public function create()
    {

      $comment= new Comment();
      //Store comment
      $comment->create($_POST['id_post'], $_POST['name_author'], $_POST['comment']);

      header("Location: ".$_POST['id_post']);
      exit();

    }
}