<!DOCTYPE HTML>

<html>

<head>
  <title>Doctors</title>
  <head>
  <title>navigation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/style1.css" />
</head>

<body>
    <?php include 'navbar.php';?>
    <br><br><br>
    <div class="container">
        
<?php
$id = mysqli_connect('localhost', 'root', '','forumseries');

if(isset($_GET['ID'])){
	$doc_id=$_GET['ID'];
}

$raw_results = mysqli_query($id,"SELECT * FROM do WHERE id= $doc_id ");

if(mysqli_num_rows($raw_results) > 0){
	while($results = mysqli_fetch_array($raw_results))
	{
		echo "<td rowspan='5'><img src='img/$results[image]' style='height:200px;display:block;'>";
		echo "<h3><left>".$results['name']."</left></h3><hr>";
		echo "<table><tr><td>";
		echo "<p><font style='font-weight: bold;'>Experiences: </font>".$results['experiences']." years</p>";
		echo "</td>";
		echo "</td></tr>";
		echo "<tr>";
		echo "<td><p><font style='font-weight: bold;'>Qualification: </font>".$results['qualification']."</p></td></tr>";
		echo "<tr><td><p><font style='font-weight: bold;'>Email: </font>".$results['email']."</p></td></tr>";
		echo "<tr><td><p><font style='font-weight: bold;'>Contact: </font>".$results['contact']."</[></td></tr>";
		echo "<tr><td><p><font style='font-weight: bold;'>Available Time: </font>".$results['available_time']."</p></td></tr>";
		echo "<tr><td><p><font style='font-weight: bold;'>About me:<br></font>".$results['image_text']."</p></td></tr>";
		echo "</table>";

}
}
?>

</div>
     <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</html>