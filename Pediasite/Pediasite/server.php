<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$email1   = "";
$sector   = "";
$location = "";
$website  = "";
$contact  = "";
$name = "";
$fname = "";
$lname = "";
$experiences = "";
$errors = array();
$_SESSION['success'] = "";
$msg = "";
$result = "";
$current = "";
$available_time = "";
$describe_hos = "";
$ped_avai = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '','forumseries');


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($fname) or empty($lname)) { array_push($errors, "Full name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	 array_push($errors, "The two passwords do not match");
  }
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (fname,lname,username, email, password)
  			  VALUES('$fname','$lname','$username', '$email', '$password')";

  	$s = mysqli_query($db, $query);

    if ($s == false){
      array_push($errors, "Username or Email already exists.");
      header('location:blog.php');
    }
    else{
  	$_SESSION['username'] = $username;
    $_SESSION['logged'] = true;
  	$_SESSION['success'] = "You are now logged in";
  	echo "Logged in";
    header('location: index.php');
    exit();
    }
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $query1 = "SELECT * FROM do WHERE username='$username' AND password='$password'";
    
    $results = mysqli_query($db, $query);
    $results1 = mysqli_query($db, $query1);
    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);
        $_SESSION['uid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
      $_SESSION['logged'] = true;
       $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
      exit();
    }
    if (mysqli_num_rows($results1) == 1) {
      $row = mysqli_fetch_assoc($results1);
        $_SESSION['uid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
      $_SESSION['logged'] = true;
       $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
      exit();
    }
    else {
      array_push($errors, "Username/Password donot match");
      $t = 0;
      $_SESSION['logged']=false;
      session_destroy();
      header('location:index.php');
      exit();
      }
   }
}



//Login Doctors
if (isset($_POST['login_doc'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM do WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['logged'] = true;
      $_SESSION['success'] = "You are now logged in";
      header('location: home.php');
    }else {
      array_push($errors, "Username/Password donot preg_match(pattern, subject)");
    }
  }
}


// REGISTER HOSPITAL
if (isset($_POST['reg_hospital'])) {
  // receive all input values from the form


  $username = mysqli_real_escape_string($db, $_POST['username']);
  $sector = mysqli_real_escape_string($db, $_POST['sector']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $website = mysqli_real_escape_string($db, $_POST['website']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $describe_hos = mysqli_real_escape_string($db, $_POST['describe_hos']);
  $ped_avai = mysqli_real_escape_string($db, $_POST['ped_avai']);

  // form validation: ensure that the form is correctly filled
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($sector)) { array_push($errors, "Your Information is necessary."); }
  if (empty($location)) { array_push($errors, "Location is required"); }
  if (empty($website)) { array_push($errors, "website is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact)) { array_push($errors, "Contact No. is required"); }


  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO hospitals (username,sector,location,website,email,contact,describe_hos,ped_avai)
          VALUES('$username','$sector','$location','$website','$email','$contact','$describe_hos','$ped_avai')";
    $res = mysqli_query($db, $query);
    //$_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');   
  }
  exit();

}

// REGISTER HOSPITAL 
if (isset($_POST['reg_doctor'])) {
  
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
  $experiences = mysqli_real_escape_string($db, $_POST['experiences']);
  $current = mysqli_real_escape_string($db, $_POST['current']);
  $available_time = mysqli_real_escape_string($db, $_POST['available_time']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  //Get image name
  $image = $_FILES['image']['name'];
  //$image= fopen($_FILES["image"]["tmp_name"], 'r');

  //Get text
  $image_text = mysqli_real_escape_string($db,$_POST['image_text']);

  //image file directory
  $target = '/img/'.basename($image);

  // form validation: ensure that the form is correctly filled
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($qualification)) { array_push($errors, "Your qualification is necessary."); }
  if (empty($experiences)) { array_push($errors, "Experience level is required"); }
  if (empty($available_time)) { array_push($errors, "Please specify your availability time."); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact)) { array_push($errors, "Contact No. is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }

  if (empty($password_1) || empty($password_2)){
    array_push($errors, "Password field is empty");
  }

  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    
    $query = "INSERT INTO do (name,username,qualification,experiences,current,location,available_time,email,contact,password,image,image_text) 
          VALUES('$name','$username','$qualification','$experiences','$current','$location','$available_time','$email','$contact','$password','$image','$image_text')";
    
    //Insert the submitted images into the dateabase table do      
    mysqli_query($db, $query);
    
    //Now uploading image into the folder
    
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
    exit();
  }
}


if (isset($_POST['send']))//value comes from post_reply.php
  {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name,surname,email,phone,message) VALUES ('$name','$surname', '$email', '$phone', '$message')";
    $res = mysqli_query($db, $sql);
    if($res)
    {            
      header("Location: contact_after.php"); 
      exit();                        
    }

}

//Forgot Password connection to the database
if (isset($_POST['forgot_pass'])) {
  $email = $_POST['email'];
  $connect = mysql_connect("localhost","root","","forumseries");
  mysql_select_db("users");
  $query = mysql_query("SELECT * FROM `forumseries`.`users` WHERE `email` = '$email'");

  // While a row of data exists, put that row in $row as an associative array
  //put extract($row); inside the following loop, you'llthen create $userid, $fullname, and $userstatus
  while ($row = mysql_fetch_assoc($query)){
    $username = $row['username'];
    $password = $row['password'];
    $email1    = $row['email'];
    }

    if($email == $email1){
      $from = "FROM: www.pediasite.com";
      $to = $email;
      $subject = "Lost Password or Username";
      $body = "Dear $fname $lname \nYour Username is: $username \nYour Password is: $password";
      $mail($to,$subject,$body,$from);
      echo "Please check you email.";

    }
    else{
      echo "Incorrect Email.";
      echo email;
    }
  }


if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM admindatas WHERE adminusername='$username' AND adminpassword='$password'";
    
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);
        $_SESSION['uid'] = $row['id'];
        $_SESSION['username'] = $row['adminusername'];
      $_SESSION['admlogged'] = true;
       $_SESSION['success'] = "You are now logged in";
      header('location: adminpanel.php');
      exit();
    }
    
    else {
      array_push($errors, "Username/Password donot match");
      $t = 0;
      $_SESSION['logged']=false;
      session_destroy();
      header('location:adminpanel.php');
      exit();
      }
   }
}


// REGISTER USER
if (isset($_POST['adreg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($fname) or empty($lname)) { array_push($errors, "Full name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
   array_push($errors, "The two passwords do not match");
  }
  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (fname,lname,username, email, password)
          VALUES('$fname','$lname','$username', '$email', '$password')";

    $s = mysqli_query($db, $query);

    if ($s == false){
      array_push($errors, "Username or Email already exists.");
      header('location:blog.php');
    }
    else{
    $_SESSION['username'] = $username;
    $_SESSION['logged'] = true;
    $_SESSION['success'] = "You are now logged in";
    echo "Logged in";
    header('location: index.php');
    exit();
    }
  }
}

if (isset($_POST['adreg_doctor'])) {
  
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
  $experiences = mysqli_real_escape_string($db, $_POST['experiences']);
  $current = mysqli_real_escape_string($db, $_POST['current']);
  $available_time = mysqli_real_escape_string($db, $_POST['available_time']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  //Get image name
  $image = $_FILES['image']['name'];
  //$image= fopen($_FILES["image"]["tmp_name"], 'r');

  //Get text
  $image_text = mysqli_real_escape_string($db,$_POST['image_text']);

  //image file directory
  $target = '/img/'.basename($image);

  // form validation: ensure that the form is correctly filled
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($qualification)) { array_push($errors, "Your qualification is necessary."); }
  if (empty($experiences)) { array_push($errors, "Experience level is required"); }
  if (empty($available_time)) { array_push($errors, "Please specify your availability time."); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact)) { array_push($errors, "Contact No. is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }

  if (empty($password_1) || empty($password_2)){
    array_push($errors, "Password field is empty");
  }

  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    
    $query = "INSERT INTO do (name,username,qualification,experiences,current,location,available_time,email,contact,password,image,image_text) 
          VALUES('$name','$username','$qualification','$experiences','$current','$location','$available_time','$email','$contact','$password','$image','$image_text')";
    
    //Insert the submitted images into the dateabase table do      
    mysqli_query($db, $query);
    
    //Now uploading image into the folder
    
    $_SESSION['success'] = "You are now logged in";
    header('location: adminpanel.php');
    exit();
  }
}

if (isset($_POST['del_user']))
{
   $username='';
    
      $username = $_POST['username'];
      $sql= "DELETE from users where username='".$username."'";
      $sql1 = "SELECT * FROM users WHERE username='".$username."'";
      $res = mysqli_query($db,$sql1);
      
        if (mysqli_num_rows($res)===1)
        {
      if (mysqli_query($db,$sql))
      { echo "data deleted successfully"; }
      }
      else
      { echo "username doesn't exist."; }

}

if (isset($_POST['del_doc']))
{
   $username='';
    
      $username = $_POST['username'];
      $sql= "DELETE from do where username='".$username."'";
      $sql1 = "SELECT * FROM do WHERE username='".$username."'";
      $res = mysqli_query($db,$sql1);
      
        if (mysqli_num_rows($res)===1)
        {
      if (mysqli_query($db,$sql))
      { echo "data deleted successfully"; }
      }
      else
      { echo "username doesn't exist."; }

}

if(isset($_POST['adm_signup'])) 
{
  $adminid = mysqli_real_escape_string($db, $_POST['username']);
    $adminpwd = mysqli_real_escape_string($db, $_POST['password']);
      $key = mysqli_real_escape_string($db, $_POST['key']);

 
  if (count($errors) == 0) {
      $adminpwd = md5($adminpwd);
      $sql ="SELECT * FROM activation WHERE keyforadmins = '".$key."'";
      $result = mysqli_query($db,$sql);
      $resultcheck = mysqli_num_rows($result);

      if (isset($_POST['submit']))
      {
        if ($resultcheck!=1)
        {
          echo "The activation key is invalid";
        }
        else
        {
          $insert = "INSERT into admindatas (adminusername,adminpassword) VALUES ('$adminid','$adminpwd')";
          if (mysqli_query($db,$insert))
          {
             {
               echo "Admin registered successfully";

              }
          }
        }
      }
}

}
?>