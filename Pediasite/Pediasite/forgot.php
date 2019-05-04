<?php include('check.php'); ?>
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

<br><br><br><br><br>
<div class="container">
  <h2>Forgot Password</h2>
  <form action = "forgot.php" method="post">
    <div class="form-group">
      <label for="text">Email:</label>
      <input type="email" rows="2" class="form-control" id="email" placeholder="Valid registered email" name="email">
    </div>
    <button input type="submit" class="btn btn-primary" name = "ForgotPassword" value = "Log In">Submit</button>
    <a href="index.php">Back to Home</a>
  </form>
</div>
</body>
</html>