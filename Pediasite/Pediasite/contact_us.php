<?php include"server.php";?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="scripts/validator.js"></script>
  <script src="scripts/contact.js"></script>
  <link rel="stylesheet" href="./css/follow.css">
  <style>
</style>
</head>
<body style="background-color:lavender;">
    <?php include("navbar.php");?>
    <br>
    <br>
    <br>



	    <div class="container">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">

                    <h1>Contact Us Form<a href-"#"></a></h1><br>


                    <!-- We're going to place the form here in the next step -->
                    <form id="contact-form" method="post" action="contact_us.php" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
        	
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Firstname</label>
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="firstname " required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Lastname </label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder= "lastname " required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email </label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="email " required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_phone">Contact </label>
                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Contact Number">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message </label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me " rows="4" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message" name = "send">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted"> All these fields are required</p>
            </div>
        </div>
    </div>

    </form>

                </div>

            </div>

        </div>

        </div>
            <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</body>
</html>