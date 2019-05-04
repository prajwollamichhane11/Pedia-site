<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="./css/stylelog.css">

</head>
<body>
  <?php include'navbar.php' ; ?>
  <br><br>
  <div class="header">
    <h2>Register</h2>
  </div>
  <div class="container">
 <div class="forrm">
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    
    <div class="input-group">
      <label>First Name</label>
      <input type="text" name="fname" value="<?php echo $fname; ?>">
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" value="<?php echo $lname; ?>">
    </div>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    
  </form>
<br>
</div>

</body>
<br>
</div>
     <div class="container-fluid">
      <div class="row" style="background-color:#999966;">

      <?php include("footer.php");?>
    </div>
    </div>


</html>