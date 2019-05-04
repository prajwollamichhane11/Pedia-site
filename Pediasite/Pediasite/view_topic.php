<?php session_start();  ?>

<!DOCTYPE HTML>

<html>

<head>
   
    <title>Forum-Topic</title>
    <link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Forum-ViewTopic</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style1.css" />
</head>

<body style="background-color: #f0f5f5;">
    <?php include 'navbar.php';?>
    <br><br>
    
                <?php
             if (!isset($_SESSION['uid'])) //if user has not logged in
            {
                echo "<br>";
                echo "<div class='container'>";
                echo "<p><b>Log In to Reply</b></p><br>";
                echo "<form action='login_parse.php' method='post'>
                <p>Username: <input type='text' name='username' size='33' maxlength='150'  height: 30px; placeholder='username'></p>
                <p>Password:&nbsp; <input type='password' name='password' size='33' maxlength='150'  height: 30px; placeholder='password'/></p>
                <input type='submit' class='btn btn-secondary btn-send' name='submit_forum' value='Log In'/><br><br>
                ";
                echo "</div>";
            }
            else //if user has logged in
            {
                echo "<div class='container'>";
                echo "<center><p>You are logged in as ".$_SESSION['username']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='logout_parse.php' class='btn btn-secondary'>Logout</a></p></center>";
                echo "</div>";
            }
        ?>
                <hr/>
                <br><br>
                <a href='forum.php'><button class="btn btn-arrow-right btn-info " style="float:right;">  Return to the Forum index </button></a></a></p>
                 


<div class="container">
    <?php

        include_once("connect.php");
        $cid = $_GET['cid'];
        $tid = $_GET['tid'];
        $sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
        $res = mysqli_query($dbconn,$sql) or die(mysql_error());
        if (mysqli_num_rows($res) == 1)
        {
            while ($row = mysqli_fetch_assoc($res))
            {
                $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
                $res2 = mysqli_query($dbconn,$sql2) or die(mysql_error());
                //for topic title
                echo "<br><br><p style='background-color:#3B6487; font-size:20px;padding-left:20px; padding-right:30px; color:#F4F7FC; padding-top:5px; padding-bottom:10px; border-top-left-radius:8px; border-top-right-radius:8px;'>Topic: ".$row['topic_title']."</p></b>
                    
                    </br><b><p style='padding-left:10px; background-color:#F9F9F9; margin-top:-31px; padding-top:5px; padding-bottom:10px; margin-bottom: -22px;'>".$row['topic_content']."</p></br> </b>
                    <p style='padding-left:100px;background-color:#F9F9F9; margin-top:-2px; padding-top:5px; padding-bottom:10px; margin-bottom: 0px;'>- ".$row['topic_date']."</p>

                    <p style='font-size:18px; background-color:#3B6487;padding-left:20px;padding-top:3px; padding-bottom:3px; padding-right:30px; color:white;'>Replies: </p>";

                $sql3 = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."'";
                    $res3 = mysqli_query($dbconn,$sql3) or die(mysql_error());
                    while ($row3 = mysqli_fetch_assoc($res3))
                    {
                        $count = $row3['topic_views'];//for view counter
                        $i = $row3['id'];
                        $count ++;
                    }
                while ($row2 = mysqli_fetch_assoc($res2))
                {
                    //for topic content
                    echo "<table width='100%' style='border-collapse: collapse; background-color:#F9F9F9; margin-top:-15px;'>";
                    echo "<tr><td valign='top' style='padding-top: 10px; min-height: 125px;padding-left:10px; width:400px;font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #3D3D00;'>
                     ".$row2['post_content']."<br><p style='font-size:13px; padding-left:80px; padding-top:10px; padding-bottom:0px;'>".$row2['post_creator']." - ".$row2['post_date']."<br>
                    </p></td></tr>";
                    echo "<tr><td colspan='3'> </td></tr>";
                    echo "</table>";
                }
                echo "<hr style='margin-top:-1px; background-color:black;";
                        //for notification icon in header
                        if (isset($_SESSION['uid']))
                        {
                            $view = $_SESSION['uid'];
                            $sql6 = "SELECT username FROM users WHERE id='".$view."'";
                            $res6 = mysqli_query($dbconn,$sql6) or die(mysql_error());
                            while ($row6 = mysqli_fetch_assoc($res6))
                            {
                                $creator = $row6['username'];
                            }
                            $sql5 = "SELECT * FROM topics WHERE topic_creator='".$creator."' AND id='".$tid."'";
                            $res5 = mysqli_query($dbconn,$sql5) or die(mysql_error());
                            while ($row5 = mysqli_fetch_assoc($res5))
                            {
                                $reply = $row5['replies'];
                                $replycheck = $row5['reply_check'];
                                $sql7 = "UPDATE topics SET reply_check = '".$reply."' WHERE id='".$tid."'";
                                $res7 = mysqli_query($dbconn,$sql7) or die(mysql_error());
                            }
                            //for notification icon ends here
                            $sql4 = "UPDATE topics SET topic_views = '".$count."' WHERE category_id='".$cid."' AND id='".$i."'";
                $res4 = mysqli_query($dbconn,$sql4) or die(mysql_error());
                        }

            }
            if (isset($_SESSION['uid']))//following is for reply of the topic
            {
                echo "<div id='content'>";
                echo "<br>";
                echo " <form action='post_reply_parse.php' method='post'>";
                echo "<p style='padding-left:20px; padding-top:15px;'>Reply Content </p>";
                echo "<textarea name='reply_content' rows='5' cols='75' placeholder=' Post your reply here.'></textarea><br><br> ";
                echo "<input type='hidden' name='cid' value='".$cid."' />";
                echo "<input type='hidden' name='tid' value='".$tid."' />";
                echo "<input type='submit' name='reply_submit' value='Post Your Reply' class='btn btn-secondary' />";
                echo "<br><br>";
                echo "</form>";
                echo "</div>";
            }
            else
            {
                echo "<p>Please log in to reply.</p>";
            }
        }
        else
        {
            echo "<p>This topic does not exist.</p>";
        }
    ?>
</div>


<! for footer>
        <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>

</html>