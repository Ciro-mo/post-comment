<?
session_start();
?>
        
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$post_page['title']?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/template.css">
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
            <div class="row">
                <div class="col-8" style="margin-top: 30px;">
                    <!-- POST -->
                    <article>
                        <!-- TITlE -->
                        <h2><?=$post_page['title']?></h2>

                        <!-- SUB TITLE -->
                        <span id="sub-title">Author: <?=$post_page['author']?> - Created: <?=date("j F Y, g:i", strtotime($post_page['created_at']))?></span>

                        <!-- INTRO TEXT -->
                        <p id="introtext"><?=$post_page['introtext']?></p>

                        <!-- FULL TEXT -->
                        <p id="fulltext"><?=$post_page['textpost']?></p>
                    </article>

                    <!-- Comments -->
                    <? require_once 'comments.php'; ?>

                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>     
    </section>
</body>
</html>