<?php session_start(); ?>
<?php
                        if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == ""))
                        {
                            header("Location: forum.php");
                            exit();
                        }
                        $cid = $_GET['cid'];
                ?>
<!DOCTYPE HTML>

<html>

<head>
    <title>Forum-CreateTopic</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style1.css" />
</head>

<body style="background-color: #f0f5f5;">
    <?php include 'navbar.php';?>
        <div class="container">              
        <br>
        <!to return to the forum index>
        <p style="text-align: right; padding-bottom: 10px;"><a href='forum.php'>Return to the Forum index</a></p>
        <br>
         <h2>Please fill the boxes</h2>

<div class="container">
    <!table for creating topic of forum>
    <form action="create_topic_parse.php" method="post">
        <p><b>Topic Title</b></p>
        <input type="text" name="topic_title" size="73" maxlength="150" height: 30px;' placeholder="title here">
        <br>
        <br>
        <p><b>Topic Content</b></p>
        <textarea name="topic_content" id="" cols="75" rows="5" placeholder="content here"></textarea>
        <br><br>
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" >
        
        <div class="row">
            <pre>  </pre>
            <input type="submit" class="btn btn-secondary btn-send" name="topic_submit" value="Create Your Topic">
        </div>
    </form>
</div>
<br>
<br>
</div>
</div>
<! for footer>
     <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>

</html>