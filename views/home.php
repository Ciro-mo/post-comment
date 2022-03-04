<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home - Post & Comment</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/template.css">
</head>

<body>
    <section>
        <div id="top">
            <a href="" class="text-decoration-none" style="color:white;"><h1>Post & Comment</h1></a>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-8" style="margin-top: 30px;">
                    <?php
                    //print all post
                    foreach($Posts as $post)
                    {
                        echo "<article>";
                        echo "<a href=\"index.php/post/".$post['id']."\">" 
                                ."<h2>".$post['title']."</h2>"
                            ."</a>";
                        echo "<p>".$post['introtext']."</p>";
                        echo "<div style=\"text-align:right;\">"
                                ."<a href=\"index.php/post/".$post['id']."\">Read more</a>"
                                ."</div>";
                        echo "</article>";
                        echo "<hr style=\"height:2px; width:50%; border-width:0; color:red; background-color:red\">";
                    }                    ?>
                </div>
                <div class="col">
                    <a href="./index.php/new-post">Create a new post</a>
                </div>
            </div>
        </div>     
    </section>
</body>
</html>