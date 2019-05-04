<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

<head>
    
    <title>Forum-Topic</title>
    <link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body style="background-color: #f0f5f5;">
  <?php include 'navbar.php';?>
  <br><br>
        <div class="middle">
          <div>
           <?php
             if (!isset($_SESSION['uid'])) //if user has not logged in
            {
              echo "<br>";
                echo "<div class='container'>";
                echo "<p><b>Log In to take part in FORUM</b></p><br/>";
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
                <!link for forum index>
               <a href='forum.php'><button class="btn btn-arrow-right btn-info " style="float:right;">  Return to the Forum index</button></a>
                <center> <h1 class="display-4">Forum Topics</h1></center>

<div class="container" >
        <?php
                include_once("connect.php");
                $cid = $_GET['cid'];
                if(isset($_SESSION['uid']))//when its logged in.. provide user adress to create topic
                {
                    $logged = "<a href='create_topic.php?cid=".$cid."'><button class='btn btn-secondary'>Click Here to create a topic</button></a>";
                }
                else
                {
                   $logged = "<p style=' font-size:20px;'>| Please log in to create topic in this forum</p>";
                }
                $sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
                $res = mysqli_query($dbconn,$sql) or die (mysql_error());
                if (mysqli_num_rows($res) == 1)
                {
                      $sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
                      $res2 = mysqli_query($dbconn,$sql2) or die (mysql_error());

                      if(mysqli_num_rows($res2) > 0)
                      {
                        echo $logged;
                        echo "<br><br>";
                        //table title section
                          $topics = "<table class='table-light table-hover' width='100%' style='border-collapse: collapse;'>";
                          
                          $topics .= "<tr class='table-secondary' style='background-color: #CCCC99;'><td style='padding-left: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #3D3D00;  padding-top:10px; padding-bottom:10px;'><b>Topic Title</b></td>
                                                                             <td width='65' align='center' style='padding-left: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #3D3D00;'><b>Replies</b></td>
                                                                             <td width='65' align='center' style='padding-left: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #3D3D00;'><b>Views</b></td></tr>";
                          
                          while ($row =mysqli_fetch_assoc($res2))
                          {
                              $tid = $row['id'];
                              $title = $row['topic_title'];
                              $views = $row['topic_views'];
                              $date = $row['topic_date'];
                              if (isset($_SESSION['uid']))
                              {$creator = $_SESSION['uid'];}
                              $reply = $row['replies'];
                              $sql4 = "SELECT topic_creator FROM topics WHERE id='".$tid."'";
                              $res4 = mysqli_query($dbconn,$sql4) or die(mysql_error());
                              while ($row4 = mysqli_fetch_assoc($res4))
                              {
                                  $postcreator = $row4['topic_creator'];
                              }
                              //table content
                              $topics .= "<tr class='table-link'><td style='padding-top: 30px;'><a href='view_topic.php?cid=".$cid."&tid=".$tid."' style='font-size:16px; padding-left:10px;margin-bottom:20px;'>".$title."</a><br /><span class='post_infor' style='padding-left:50px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #3D3D00;'> ".$postcreator." - ".$date."</span></td>
                                              <td align='center'>".$reply."</td>
                                              <td align='center'>".$views."</td></tr>";
                              //$topics .= "<tr><td colspan='3'><hr /> </td></tr>";
                          }
                          $topics .= "</table>";
                          echo $topics;
                      }
                      else
                      {
                            echo "<a href='forum.php'>Return to forum index</a><hr />";
                            echo "<p>There are no topics in this category yet.".$logged."</p>";
                      }
                }
                else
                {
                    echo "<a href='forum.php'>Return to forum index</a><hr />";
                    echo "<p>You are trying to view a category that does not exist yet.";
                }
        ?>
</div>
          </div>

        </div>
<! for footer>
   <?php include 'footer.php';?>
</body>

</html>