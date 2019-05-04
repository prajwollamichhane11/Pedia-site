<?php include_once 'server.php';
 include_once 'navbar.php'; ?>  
<!DOCTYPE html>
<html>
<head>
  <title>Doctors Registration</title>
  <head>
  <title>navigation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

  <link rel="stylesheet" type="text/css" href="./css/stylelog.css">
</head>
<br><br><br>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
  <div class="container">
    <div class="forrm">

  <form method="post" enctype="multipart/form-data" action = "doctorreg.php">
  	<?php include('errors.php'); ?>
    
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name">
    </div>

  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
    <div class="input-group">
      <label>Qualification</label>
      <input type="text" name="qualification" placeholder="e.g. MBBS/MD...">
    </div>
    <div class="input-group">
      <label>Experiences(Years)</label>
      <input type="number" name="experiences">
    </div>	

    <div class="input-group">
      <label>Current Working(Hospital/Clinic)</label>
      <input type="text" name="current">
    </div>
        <div class="input-group">
      <label>Location</label>
      <input type="text" name="location" >
    </div>

    <div>
      <label>Availability Time</label>
      <textarea 
        id="text" 
        cols="40" 
        rows="6" 
        name="available_time" 
        placeholder="People with serious problem on their child might be in search of you desperately. So please specify your availability time."></textarea>
    </div>

    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email">
    </div>

    <div class="input-group">
      <label>Contact No.</label>
      <input type="numbers" name="contact">
    </div>

  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
    </div>
    <div>
      <label>Choose Profile Picture</label>
      <input type="file" name="image" >
    </div>
    <hr>
    <div>
      <label>About Me</label>
      <br>
      <textarea 
        id="text" 
        cols="40" 
        rows="6" 
        name="image_text" 
        placeholder="Say something about yourself(Including your work experiences and your educational career awards and achievements)..."></textarea>
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_doctor" >Register</button>
  	</div>
  </div>
  </div>
<br>
<br>
     <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
  </div>

</body>
</html>

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      print_r($file_name);
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>