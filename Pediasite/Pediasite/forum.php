<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title>navigation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("navbar.php");?>

        <br>
        <br>
        <br>
        <center>
        <img class="animated bounce infinite" src="img/forum.png">
    </center>
        <?php
            if (isset($_SESSION['uid'])) //if user has not logged in
            {
                echo "<div class='container'>";
                echo "<center><p>You are logged in as ".$_SESSION['username']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='logout_parse.php' class='btn btn-secondary'>Logout</a></p></center>";
                echo "</div>";
            }
            else //if user has logged in
            {
                echo "<div class='container'>";
                echo "<p><b>Log In to take part in FORUM</b></p><br/>";
                echo "<form action='server.php' method='post'>
                <p>Username: <input type='text' name='username' size='33' maxlength='150'  height: 30px; placeholder='username'></p>
                <p>Password:&nbsp; <input type='password' name='password' size='33' maxlength='150'  height: 30px; placeholder='password'/></p>
                <input type='submit' class='btn btn-secondary btn-send' name='login_user' value='Log In'/><br><br>
                ";
                echo "</div>";
                
            }
        ?>

<hr >
<!for the section below login>
<div class ="container">
    <?php
        include_once("connect.php");
        $sql = "SELECT * FROM categories ORDER BY category_title ASC";
        $res = mysqli_query($dbconn,$sql) or die(mysql_error());
        $categories ="";
         if (!isset($_SESSION['uid']))
        {
            echo "<center><h3>To view FORUM conversation Click in the FORUM below.</h2></p></center>";
        }

        if(mysqli_num_rows($res)>0)
        {
            while ($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['category_title'];
                $description = $row ['category_description'];
                //following line gives location of the forum ie forum.. clear your doubt liine.
                $categories .= "<a href='view_category.php?cid=".$id."' ><center><button type='button' class='btn btn-info'>".$title."</button></center><br> -<font size='-1'>".$description."</font></a>";

            }
            echo $categories;
        }
        else
        {
            echo "<p>There are no categories available yet.</p>";
        }
    ?>
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