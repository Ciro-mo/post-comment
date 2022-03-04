<?php 
namespace App\Models;

use mysqli;

class Post
{

    /*
    * Get a post by id
    */
    public function getPost(int $id)
    {
        $post= array();

        try {            
            //connect to db 
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            //Get post
            $query= "SELECT * FROM post WHERE id=?";
            if($stmt = $conn->prepare($query))
            {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $post= $result->fetch_assoc();
                $stmt->close();
            }  else {
                $error = $conn->errno . ' ' . $conn->error;
                echo $error; 
            }

            $conn->close();

        } catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }

        return $post;
    }


    /*
    * Save post
    */
    public function store(string $author, string $title, string $intro, string $fulltext)
    {
        try {    
            //connect to db 
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            $query_insert= "INSERT INTO post(author,title,introtext,textpost,created_at) VALUES (?, ?, ?, ?, '".date("Y-m-d H:i:s")."')";
            $stmt = $conn->prepare($query_insert);
            $stmt->bind_param("ssss", $author, $title, $intro, $fulltext);
            $stmt->execute();
            $stmt->close();

            session_start();
            $_SESSION["mess_confirm"] = "Post created";

        } catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }

        return true;
    }

    /*
    * Get all post
    */
    public function all()
    {
        $posts= array();

        try {            
            //connect to db
            $link_id=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            //Get all post
            $query= "SELECT * FROM post ORDER BY id DESC";
            $result=mysqli_query($link_id,$query);
            while ($tmp=mysqli_fetch_assoc($result))
        	{
		        array_push($posts, $tmp);
            }

            mysqli_close($link_id);

        } catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }

        return $posts;

    }
}