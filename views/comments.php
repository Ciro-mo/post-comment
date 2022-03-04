<div id="comments">
    <h3 class="title-comment">Comments</h3>

    <?
    if(count($comment_post)>0)
        foreach($comment_post as $comment)
        {
            echo '<div id="comment_box">'
                . '<span id="date_comment">'.date("m-d-Y H:i", strtotime($comment['created_at'])).'</span>'
                .'<h4 style="padding: 10px;">'.$comment['author'].':</h4>'
                .'<span id="body_comment">'.$comment['commentText'].'</span>'
                .'</div>';

        }
    else
        echo "<em>No comment</em>"        
    ?>
</div>


<h3 class="title-comment">Your comment...</h3>
<!-- Form for send comment -->
<form name="sendComment" id="sendComment" method="post" action="new-comment" enctype="multipart/form-data">
    <input type="hidden" name="id_post" value="<?=$post_page['id']?>">

    <label for="name_author"><strong>Your name</strong></label> <br>
    <input type="text" name="name_author" style="width:100%;" maxlength="60" required>
    <br><br>

    <label for="comment"><strong>Your comment</strong></label> <br>
    <textarea name="comment" style="width: 100%; height:100px;" required></textarea>
    <br><br>
    
    <input type="submit" value="Send comment">
</form>