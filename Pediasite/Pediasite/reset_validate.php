<?php 
	session_start();
	
if (isset($_POST['submit'])){

$p_username=$_SESSION['Email'];
echo $p_username;
//$p_old_password=$_POST['old_password'];
$p_new_password=$_POST['new_password'];
$p_con_new_password=$_POST['con_new_password'];

	if ($_SERVER['REQUEST_METHOD']=='POST')
	{
	//two new  passwords are equal to each other  
					if ($p_new_password==$p_con_new_password)
					{
						$p_new_password=md5($p_new_password);
						$conn=mysqli_connect('localhost','root','','user');
						$query6="SELECT * FROM signin_info";
						$result6=mysqli_query($conn,$query6);

						while ($row=mysqli_fetch_array($result6,MYSQLI_ASSOC)) 
						{
			 					while ($p_username==$row['Email'])
			 				    {
			 						$r_id=$row['id'];
				 				   $conne=mysqli_connect('localhost','root','','user');
				 				   $query7="UPDATE signin_info SET Password='$p_new_password' WHERE id='$r_id'";
				 				   if (mysqli_query($conne,$query7))
				 				   {
				 				   		echo"Updated";
				 				   		header ("refresh:0.1; url= index.php");

				 				   	}
				 				   	else 
				 				   		echo "Not Updated";

			 						break;
			 					}	
			 				
						}

					}
					else echo "NEW PASSWORDS DO NOT MATCH";
		}
	}	
 ?>