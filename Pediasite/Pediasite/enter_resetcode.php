<!DOCTYPE html>
<html>	
<head>
	
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

	$connections=mysqli_connect('localhost','root','','user');
	$query="SELECT * FROM signin_info ";
	$result=mysqli_query($connections, $query);

	if(mysqli_num_rows($result)>= 1){

		 while ($row=mysqli_fetch_array($result)) {

			if ($_SESSION['Email'] == $row['Email']){

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
<form align="middle" action="enter_resetcode.php" method="post">
	<table align = "center">
		<tr>
		<td> Enter Your Reset Code : </td>		
		<td> <input type = "text" name = "code" placeholder = "Reset code"/> </td>
		<td><button type = "submit" name = "submit" class = "btn"> Sumit Code</button> 
		</td>
		</tr>
	</table>
</form>

<?php echo( $_SESSION['Email']."xx");  echo( "<br>"); //echo $em;
 ?>

</body>
</html>
