<?php 
namespace App\Models;

use mysqli;

class Comment
{

    /*
    * Get comments of the post (by id)
    */
    public function get(int $id)
    {

        $comment= array();

        try {    
            //connect to db 
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            //Get comments
            $query= "SELECT * FROM comments WHERE post=?";
            if($stmt = $conn->prepare($query))
            {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $comments= $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close();

            }  else {
                $error = $conn->errno . ' ' . $conn->error;
                echo $error; 
            }


        } catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }

        return $comments;
    }

    /*
    * Create a comment of the post (by id)
    */
    public function create(int $post, string $author, string $comment)
    {
        try {    
            //connect to db 
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            //Get comments
            $query_insert= "INSERT INTO comments(author, commentText, post, created_at) VALUES (?, ?, ?, '".date("Y-m-d H:i:s")."')";
            $stmt = $conn->prepare($query_insert);
            $stmt->bind_param("ssi", $author, $comment, $post);
            $stmt->execute();
            $stmt->close();

            session_start();
            $_SESSION["mess_confirm"] = "Comment sent";

        } catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }

        return true;
    }
}