<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Create a new post - Post & Comment</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/template.css">
</head>

<body>
    <section>
        <div id="top">
            <a href="http://<?=constant('HOST').'/'.constant('URL_SUBFOLDER')?>/index.php" class="text-decoration-none" style="color:white;"><h1>Post & Comment</h1></a>
        </div>

        <!-- ALERT -->
        <?
        if(isset($_SESSION["mess_confirm"])) {
            echo '<div class="alert alert-info" role="alert">'
                . '<strong>'.$_SESSION["mess_confirm"].'</strong>'
                . '</div>';
        
            unset($_SESSION["mess_confirm"]);
        }
        ?>

        <div class="container">
            <h3 class="title-comment">Create a new post</h3>
            
            <!-- Form for create a new post -->
            <form name="createPost" id="createPost" method="post" action="store-post" enctype="multipart/form-data">
                   
                <label for="name_author"><strong>Your name</strong></label> <br>
                <input type="text" name="name_author" style="width:100%;" maxlength="250" required>
                <br><br>

                <label for="title_post"><strong>Title post</strong></label> <br>
                <input type="text" name="title_post" style="width:100%;" maxlength="255" required>
                <br><br>

                <label for="introtext"><strong>Intro</strong></label> <br>
                <textarea name="introtext" style="width: 100%; height:100px;"></textarea>
                <br><br>

                <label for="fulltext"><strong>Text of post</strong></label> <br>
                <textarea name="fulltext" style="width: 100%; height:100px;" required></textarea>
                <br><br>
                    
                <input type="submit" value="Create Post">        
        </form>    
    </section>
</body>
</html>