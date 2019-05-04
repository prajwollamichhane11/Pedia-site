<?php 
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '','forumseries');

if (isset($_POST['email'])){

	$rcode= rand(10000000,99999999);
	$qu="SELECT * FROM users"; 
	$res=mysqli_query($db, $qu);

		if(mysqli_num_rows($res) > 0 ){
		 	while ($row=mysqli_fetch_array($res)) {
				if ($_POST['email'] == $row['email']){
						$ID=$row['id'];
						$sql1 = "UPDATE `signin_info` SET `R_code` = '$rcode' WHERE `id` = '$ID'";
			
						if (mysqli_query($db,$sql1))
							{echo "Data entered successfully"."<br>";}
						else
							{echo "Error inserting data." .mysqli_error($conn);}
				}
			}
		}
 	$query="SELECT * FROM users"; 
	$result=mysqli_query($db, $query);
	if(mysqli_num_rows($result) > 0 ){

		 while ($row=mysqli_fetch_array($result)) {

			if ($_POST['email'] == $row['email']){

				$_SESSION['Email']=$row['email'];
				
				$code=$row['R_code'];
				$userid = $row['username'];

				$message = "Your Activation Code is ".$code."";
    			$to=$_POST['email'];
    			$subject="Reset Code for Pediasite ";
    			$from = 'prajwollamichhane11@gmail.com';
   				$body='Your Reset Code is '.$code.'. Please follow the website instruction to reset your account. Thank You !';
    			$headers = "From:".$from;
    			mail($to,$subject,$body,$headers);
				echo "<br";
				//echo "Your Reset Code Is Sent To You Check You Emails"."<br>";
				//echo $body."<br>";
			
				header("refresh:0.1 ; url = reset.php");
			}
		else 
			{
				echo ("Enter the email of registered user !!");
			}
		}
	}	
}

?>