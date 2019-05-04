<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	
<?php 
  session_start();
  $Acode=$em="";
  
if ($_SERVER['REQUEST_METHOD']=='POST') { 
	if (empty($_POST['code']))
		{ echo 'Please enter your reset code ';
		  echo "</br>";
		}
	else
		{ $Acode = $_POST['code'];
			$em = $_SESSION['Email'];
			//echo $em;
		}

	$connections=mysqli_connect('localhost','root','','forumseries');
	$query="SELECT * FROM users ";
	$result=mysqli_query($connections, $query);

	if(mysqli_num_rows($result)>= 1){

		 while ($row=mysqli_fetch_array($result)) {

			if ($_SESSION['Email'] == $row['email']){

  			if ($row['R_code']==$Acode)

  				{ echo $Acode; echo "<br>";
  				 echo "Correct"; echo "<br>";
  				echo $row['Email'];
  					//header("Pchange_reset.php");
  					header("location:Pchange_reset.php"); }

  		else { echo "Use Correct Code From Email !";}
  	}
   } 
 }
}
?>


</head>
<body>
<body>
<br><br><br><br><br>
	<div class="container">
  <form action = "reset.php" method="post">
    <div class="form-group">
      <label for="text"> <h3> Your Reset Code has been sent to your email ! </h3></label><br>
      <label for="text">Enter Your Reset Code:</label>
      <input type="text" class="form-control" id="code" placeholder="Reset code" name="code">
    </div>
    <button input type="submit" class="btn btn-primary" name = "submit" value = "submit">Submit</button>
    <a href="index.php">Back To Home</a>
</form>
</div>


<?php echo( $_SESSION['Email']."xx");  echo( "<br>"); //echo $em;
 ?>

</body>
</html>
