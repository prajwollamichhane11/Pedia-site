<?php
error_reporting(0);
 include('server.php');
 include_once 'navbar.php';
 ?>
 <?php include 'navbar.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Hospitals Registration</title> 
  <link rel="stylesheet" type="text/css" href="./css/stylelog.css">
<br><br><br>
<body>
  
  <div class="header">
    <h2>Register</h2>
  </div>
  <div class="container">
    <div class="forrm">

  <form method="POST" action="hospitalreg.php">
  	<?php include('errors.php'); ?>


      <div class="input-group">
  	  <label>Name of the Hospital</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
    </div>

      <div class="input-group1" >
      <label>Private/Government:</label>
      <input type="radio" name="sector" value="Private"  >Private
      <input type="radio" name="sector" value="Government" >Government
   </div>

   <div class="input-group">
      <label>Location</label>
      <input type="text" name="location" value="<?php echo $location; ?>">
    </div>

    <div class="input-group">
  	  <label>Website</label>
  	  <input type="website" name="website" value="<?php echo $website; ?>">
    </div>

    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>

    <div class="input-group">
      <label>Contact No.</label>
      <input type="numbers" name="contact" value="<?php echo $contact; ?>">
    </div>

    <div>
      <label>Hospital Description</label>
      <textarea
        id="text"
        cols="45"
        rows="6"
        name="describe_hos"
        placeholder="Describe The Hospital."></textarea>
    </div>
    <hr>
      <div>
      <label>Pediatricians Available</label>
      <textarea
         rows = "5"
         cols = "45"
         name = "ped_avai"
         >
       </textarea>
    </div>
     <div class="input-group">
  	  <button type="submit" class="btn" name="reg_hospital">Register</button>
    </div>
  </form>


</div>
</div>
<br><br>
   </center>
      <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</html>