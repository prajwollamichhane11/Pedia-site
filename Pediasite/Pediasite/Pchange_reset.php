<?php include('reset_validate.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br>
<div class="container">
<h2>Create New Password</h2>
  <form ction = "Pchange_reset.php" method="post">
    <div class="form-group">
      <label for="text">New Password:</label>
      <input type="password" class="form-control" id="new_password" placeholder="" name="new_password">
      <input type = "checkbox" onclick = "myFunction()"> Show Password
    </div>
    <div class="form-group">
      <label for="text">Confirm Password:</label>
      <input type="password" class="form-control" id="con_new_password" placeholder="" name="con_new_password">
    </div>
    <button input type="submit" class="btn btn-primary" name = "submit" value = "submit">Change Password</button>
  </form>
</div>
<script>  
function myFunction()
{
  var x = document.getElementById("new_password");
    if (x.type === "password")
  {
        x.type = "text";
    } 
  else 
  {
        x.type = "password";
    }
}
</script>
</body>
</html>