<?php include "server.php";
//session_start();
?>

<!DOCTYPE html>
<html lang="en">
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

<nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top" style="background-color:#82b2ff;">
 <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="width: 60px; height: 60px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home </a>
          </li><pre>   </pre>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Pediatrician</a>
            <div class="dropdown-menu">
            <?php
            if(!isset($_SESSION['logged']))
            {
              echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#dologin_popup">Pediatrician Log In</a>';
            }
            else
            {
              echo '<a class="dropdown-item" href="logout_parse.php">Log Out</a>';
             }
             ?>
              <a class="dropdown-item" href="doctorreg.php">Pediatrician Registration</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="pediatricians.php">About Pediatrician</a>
            </div>
          </li><pre>   </pre>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Hospital</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="hos_id.php">Hospital List</a>
              <a class="dropdown-item" href="hospitalreg.php">Hospital Registration</a>

          </li>
          <pre>   </pre>
           <li class="nav-item">
             <a class="nav-link" href="blog.php">Blog</a>
           </li>  <pre>   </pre>
           <li class="nav-item">
             <a class="nav-link" href="forum.php">Forum</a>
           </li>
           <?php
                $reply= $replycheck="";
                $postcreator = "";
                //for notification icon
                    include_once("connect.php");
                        if(isset($_SESSION['uid']))
                        {
                            $creator = $_SESSION['uid'];

                            $sql4 = "SELECT * FROM users WHERE id='".$creator."'";
                            $res4 = mysqli_query($dbconn,$sql4) or die(mysqli_error());
                            while ($row = mysqli_fetch_assoc($res4))
                            {
                                $postcreator = $row['username'];
                            }
                            $sql = "SELECT * FROM topics WHERE topic_creator='".$postcreator."'";
                            $res = mysqli_query($dbconn,$sql) or die(mysqli_error());
                            while($row2 = mysqli_fetch_assoc($res))
                            {
                                $reply = $row2['replies'];
                                $replycheck = $row2['reply_check'];
                            }
                            if ($reply != $replycheck)
                            {
                                echo "";
                                echo "
          <li class='nav-item dropdown'>
            <a data-toggle='dropdown'><img src='./img/notify.png' height='30px' width='30px' style='float: left; padding-top: 3px; padding-bottom: 0px; position: relative;'/></a>
            <div class='dropdown-menu'>
              <p class='dropdown-item'>You have a reply to your forum.<br> Please check your forum topic. <br></p>
            </div>
          </li><pre>  </pre>";

                                
                            }

                        }
                        else
                            {
                              echo "<pre>  </pre>";
                            }
                 ?>

           <pre>   </pre>
           <li class="nav-item">
             <a class="nav-link" href="news.php">News &nbsp;&nbsp;&nbsp;&nbsp;</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="contact_us.php">Contact Us</a>
           </li>
        </ul>


             </li>




      <span class="navbar-item">
        <form class="form-inline" action="search.php"  method = "GET">
          <input class="form-control mr-sm-2" type="text" placeholder="minimum 3 letters" name = "query" type="text" required pattern="[A-Za-z]{3,20}">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

      </span>
      <pre>  </pre>
      <?php if(!isset($_SESSION['logged'])){
          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login_popup">
            Log in
          </button>';
          }
          else{

            echo'<a href="logout_parse.php"><button type="button" class="btn btn-primary" >Log Out</button></a>';
             }
           ?>
                     </div>
</nav>


<!-- Modal -->
<div id="login_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Log In</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/patient.png" class="rounded-circle" alt="doctor" style="height: 200px; width: 200px;"></center>

          <form action="#" name="login_form_post" method="POST">
           <!-- form for email-->
            <div class="form-group">
              <label for="email">Email address:
              </label>
              <input type="text" class="form-control" id="email" placeholder="username or email" name="username">
            </div>


                <!-- form for password-->
               <div class="form-group">
             <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="password" name="password">
             </div>


             <button type="submit" class="btn btn-primary" name= "login_user" >Log In</button>

             <a href="register.php">
            <center>Haven't got account?</center>
            </a>
            <a href="forgot.php"><center>Forgot Password ?</center></a>

           </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="dologin_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Log In</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/doctor.png" class="rounded-circle" alt="doctor" style="height: 200px; width: 200px;"></center>

          <form action="#" name="login_form_post" method="POST">
           <!-- form for email-->
            <div class="form-group">
              <label for="email">Email address:
              </label>
              <input type="text" class="form-control" id="email" placeholder="username or email" name="username">
            </div>


                <!-- form for password-->
               <div class="form-group">
             <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="password" name="password">
             </div>


             <button type="submit" class="btn btn-primary" name= "login_user" >Log In</button>

             <a href="register.php">
            <center>Haven't got account?</center>

          </a>
           </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>

<br>



</body>
</html>
