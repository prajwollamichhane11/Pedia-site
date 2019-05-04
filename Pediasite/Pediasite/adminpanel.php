<?php 
include_once 'server.php'; ?>
<!DOCTYPE html>
<head>
	<title> Admin Panel </title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#424242;">

	
	
	<div class="container-fluid" style=" width:100%; background-color:#212121; height:200px;" >

		 <center>
			<img src="img/adm.png" width="100" class="rounded-circle" alt="Cinque Terre" height="100" style="background-color:white";> <br> 
			 <h4><p style="color:white;">Admin Panel</p></h4>
			 <p style="color:red;">! This is Admin Panel.Please proceed with caution. </p>  
		</center>

	</div>

	<div class="container-fluid" style="width:500px;">
		<br>
		<?php 
		if (!isset($_SESSION['admlogged']))
		{
			echo '<center> <h1><span class="badge badge-dark">Admin Login</span></h1> </center>
		  <form action="server.php" method="POST">
		    <div class="form-group">
		      <label for="email">Email:</label>
		      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Password:</label>
		      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
		    </div>
		    <div class="form-check">
		      <label class="form-check-label">
		        <input class="form-check-input" type="checkbox" name="remember"> Remember me
		      </label>
		    </div>
		    <button type="submit" class="btn btn-primary" name="login_admin">Log In</button> <br> <br>
		    <a href="#" data-toggle="modal" data-target="#admsignup"> Not an admin? Sign-up. </a>
		  </form></center>';
			}
		

		else { 
				 echo "<div class='container'>";
                echo "<center><p>You are logged in as ".$_SESSION['username']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='admlogout_parse.php' class='btn btn-secondary'>Logout</a></p></center>";
                echo "</div>";		   
		    ?> 
		</div>
		    <br>
		    <div class="container-fluid">
			    <div class="row">
			    	<div class="col-sm-3">
			    		<nav class="navbar navnavbar-expand-sm bg-dark navbar-dark nav" role="tablist">
						  <ul class="navbar-nav">
						     <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#home">Add or Remove patient</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu1">Add or Remove doctor</a>
						    </li>

						    <li class="nav-item">
						      <a class="nav-link" href="index.php">Home</a>
						    </li>
						  </ul>
						</nav>

			    	</div>
			    	<div class="col-sm-8">
			    		 <div class="tab-content">
						    <div id="home" class="container tab-pane fade"><br>
						      <center><img src="img/patient.png" width="200px" height="200px"><br><br>
						       <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#usersign_popup">Add a user </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#del_user">Remove an existing patient</button>
						      </center>
						    </div>
						    <div id="menu1" class="container tab-pane fade"><br>
						       <center><img src="img/doctor.png" class="rounded-circle" alt="Cinque Terre" width="200px" height="200px"><br><br>
						       <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#docsign_popup">Add a doctor </button>
						      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#del_doc">Remove an existing doctor</button></a>
						      </center>
						      </div>
						    <div id="menu2" class="container tab-pane fade"><br>
						      <h3>Menu 2</h3>
						      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
						    </div>
						  </div>
						</div>
			    	</div>
			    
		</div>

<?php } ?>


<!-- Modal -->
<div id="usersign_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Register a user</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/patient.png" class="rounded-circle" alt="doctor" style="height: 200px; width: 200px;"></center>



          <form action="#" name="signup" method="POST">
          	<?php include('errors.php'); ?>
           <!-- form for email-->
            <div class="form-group">
              <label for="firstname">First Name:
              </label>
              <input type="text" class="form-control" id="email" placeholder="Firstname" name="fname">
            </div>

              <div class="form-group">
              <label for="lastname">Last Name:
              </label>
              <input type="text" class="form-control" id="email" placeholder="lastname" name="lname">
            </div>

              <div class="form-group">
              <label for="username">Username:
              </label>
              <input type="text" class="form-control" id="email" placeholder="username" name="username">
            </div>

              <div class="form-group">
              <label for="email">Email address:
              </label>
              <input type="email" class="form-control" id="email" placeholder="username or email" name="email">
            </div>




                <!-- form for password-->
               <div class="form-group">
             <label for="pwd1">Enter Password:</label>
              <input type="password" class="form-control" placeholder="*******" id="pwd" name="password_1">
             </div>

                <!-- form for password-->
               <div class="form-group">
             <label for="pwd2">Confirm Password:</label>
              <input type="password" class="form-control" placeholder="*******" id="pwd" name="password_2">
             </div>

             <button type="submit" class="btn btn-primary" name= "adreg_user" >Register</button>

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
<div id="docsign_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Register a doctorr</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/doctor.png" class="rounded-circle" alt="doctor" style="height: 200px; width: 200px;"></center>



          <form action="#" name="sign" method="POST">
          	<?php include('errors.php'); ?>
           <!-- form for email-->
            <div class="form-group">
              <label for="name">Name:
              </label>
              <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>

              <div class="form-group">
              <label for="username">Userame:
              </label>
              <input type="text" class="form-control" id="username" placeholder="username" name="username">
            </div>


              <div class="form-group">
              <label for="qualification">Qualification:
              </label>
              <input type="text" class="form-control" id="qualification" placeholder="e.g. MBBS/MD.." name="qualification">
            </div>


              <div class="form-group">
              <label for="experiences">Experience:
              </label>
              <input type="text" class="form-control" id="exp" placeholder="experiences" name="experiences">
            </div>

             <div class="form-group">
              <label for="curr">Current Working(Hospital/Clinic):
              </label>
              <input type="text" class="form-control" id="cur" name="current">
            </div>

             <div class="form-group">
              <label for="loc">Location:
              </label>
              <input type="text" class="form-control" id="loc" name="location">
            </div>

            <div class="form-group">
              <label for ="avail"> Availability Time:
              </label>
      <input type ="text"
        id="text" class="form-control"
        name="available_time"
        placeholder="People with serious problem on their child might be in search of you desperately. So please specify your availability time.">
    </div>

       <div class="form-group">
              <label for="email">Email address:
              </label>
              <input type="email" class="form-control" id="email" placeholder="username or email" name="email">
            </div>

 <div class="form-group">
              <label for="cont">Contact No.:
              </label>
              <input type="text" class="form-control" id="cont" placeholder="98********" name="contact">
            </div>


                <!-- form for password-->
               <div class="form-group">
             <label for="pwd1">Enter Password:</label>
              <input type="password" class="form-control" placeholder="*******" id="pwd" name="password_1">
             </div>

                <!-- form for password-->
               <div class="form-group">
             <label for="pwd2">Confirm Password:</label>
              <input type="password" class="form-control" placeholder="*******" id="pwd" name="password_2">
             </div>

             <div>
      <label>Choose Profile Picture</label>
      <input type="file" name="image" >
    </div>

    				 <div class="form-group">
             <label for="abt">About me</label>
              <input type="text" class="form-control" placeholder="Say something about yourself(Including your work experiences and your educational career awards and achievements)" id="abt" name="image_text">
             </div>
  
   <button type="submit" class="btn btn-primary" name= "adreg_doctor" >Register</button>

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
<div id="del_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remove a user</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/patient.png" class="rounded-circle" alt="doctor" style="height: 200px; width: 200px;"></center>



          <form action="#" name="signup" method="POST">
          	<?php include('errors.php'); ?>
           <!-- form for email-->
            <div class="form-group">
              <label for="username">Insert the username of the user :
              </label>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            </div>


             <button type="submit" class="btn btn-primary" name= "del_user" >Submit</button>

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
<div id="del_doc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remove a doctor</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/doctor.png" class="rounded-circle" alt="doctor" style="height: 200px; width: 200px;"></center>



          <form action="#" name="signup" method="POST">
          	<?php include('errors.php'); ?>
           <!-- form for email-->
            <div class="form-group">
              <label for="username">Insert the username of the doctor :
              </label>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            </div>


             <button type="submit" class="btn btn-primary" name= "del_doc" >Submit</button>

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
<div id="admsignup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sign-up as admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
       <div class="modal-body">
        <center> <img src="img/adm.png" class="rounded-circle" alt="admin" style="height: 200px; width: 200px;"></center>



          <form action="server.php" name="signupadm" method="POST">
          	<?php include('errors.php'); ?>
           <!-- form for email-->
            <div class="form-group">
              <label for="username">Username :
              </label>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            </div>


            <div class="form-group">
              <label for="password">Password :
              </label>
              <input type="password" class="form-control" id="pwd" placeholder="**********" name="password">
            </div>


            <div class="form-group">
              <label for="key">Provided key :
              </label>
              <input type="text" class="form-control" id="key" placeholder="provided key" name="key">
            </div>


             <button type="submit" class="btn btn-primary" name= "adm_signup" >Submit</button>

           </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div> 



</body>


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