<!DOCTYPE HTML>

<html>

<head>
  <title>Forum</title>
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

$raw_results = mysqli_query($id,"SELECT * FROM do ");

if(mysqli_num_rows($raw_results) > 0){
	while($results = mysqli_fetch_array($raw_results))
	{
    echo"<br>";
		echo "<table>";
		echo "<tr><td width='200px'>";
		echo ""."<a href=doc_show.php?ID=".$results['id']."><img src='img/$results[image]' height='100px' width='100px'> </a>"."";
		echo "</td>";
		echo "<td width='600px'>";
		echo "<h3>".$results['name']."</h3><br>
		<p>Location: ".$results['location']."</p><p>Contact: ".$results['contact']." </p><hr>";	
		echo "</td></tr></table>";

}

}
?>
<br>
</div>
     <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</html>