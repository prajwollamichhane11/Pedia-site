<?php session_start(); ?>
<?php
                        if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == ""))//if user has not logged in then location becomes forum.php
                        {
                            header("Location: forum.php");
                            exit();
                        }
                        $cid = $_GET['cid'];
                        $tid = $_GET['tid'];
                ?>
<!DOCTYPE HTML>

<html>

<head>
    <title>Forum-TopicReply</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style1.css" />
</head>

<body>
    <?php include '../php/header.php';?>
        
                
        <?php
            echo "<p>You are logged in as ".$_SESSION['username']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='logout_parse.php' class='button'>Logout</a>"
        ?>
<hr/>
<br>
                <h3>Reply the comments</h3>
<div id="container">
    <!reply section>
    <form action="post_reply_parse.php" method="post">
    <p>Reply Content </p> 
    <textarea name="reply_content" rows="5" cols="75"></textarea><br><br> 
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type="hidden" name="tid" value="<?php echo $tid; ?>" />
    <input type="submit" name="reply_submit" value="Post Your Reply" class="button" />
    </form>  
</div>

<! for footer>
   <?php include '../php/footer.php';?>
</body>

</html>