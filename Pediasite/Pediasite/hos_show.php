<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include_once 'navbar.php';
echo '<br><br><br><br>';
$id = mysqli_connect('localhost', 'root', '','forumseries');

if(isset($_GET['ID'])){
	$hos_id=$_GET['ID'];
}

$raw_results = mysqli_query($id,"SELECT * FROM hospitals WHERE id= $hos_id ");

if(mysqli_num_rows($raw_results) > 0){
	while($results = mysqli_fetch_array($raw_results)){
?>
        <div class="container">
		<div class="row">
		        <div class="col-sm-10">
			  <ul class="list-group">
		        <li class="list-group-item active"> <h2><center> Hospital Details </center></h2></li>
                          </ul>
                          </div>
                          </div>
                          <div class="row">
			<div class="col-sm-10">
			<center><img src="img/hospital.jpg" style="width:200px;height:200px;"></center>
			</div>
                        </div>
                        <div class="row">
		  	<div class="col-sm-10">
			  <ul class="list-group">

			    <li class="list-group-item">Name: <?php echo $results['username'] ?></li>
			    <li class="list-group-item">Sector: <?php echo $results['sector'] ?></li>
			    <li class="list-group-item">Location: <?php echo $results['location'] ?></li>
			    <li class="list-group-item">Website: <?php echo $results['website'] ?></li>
			    <li class="list-group-item">Contact: <?php echo $results['contact'] ?></li>
                            <li class="list-group-item">Email: <?php echo $results['email'] ?></li>


			  </ul>
			</div>
		</div>
	</div>

<?php
}
}
?>
  <br><br><br><br><br><br><br><br>
 <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</html>