<?php

$db = mysqli_connect('localhost', 'root', '','forumseries');

?>

<!DOCTYPE htm>
<html>
<head>
    <title>Search results</title>
    <link rel="stylesheet" type="text/css" href="./css/styleshan.css">

</head>
<body>
  <?php //include 'navbar.php';?>
    <br><br><br>
<?php
$query = $_GET['query'];
$min_length = 3;

if (strlen($query) >= $min_length){
    $query = htmlspecialchars($query);
    $query = mysqli_real_escape_string($db, $query);
    $raw_results = "SELECT * FROM do
        WHERE (`name` LIKE '%".$query."%')
         OR (`qualification` LIKE '%".$query."%')
         OR (`experiences` LIKE '%".$query."%')
         OR (`contact` LIKE '%".$query."%')
         OR (`image` LIKE '%".$query."%') ";

    $sql = mysqli_query($db,$raw_results);

    // * means that it selects all fields, you can also write: `id`, `title`, `text`
    // do is the name of our table
    // '%$query%' is what we're looking for, % means anything, for example if $query is cat
    //it will search for rcat ggcat catt array_multisort(arr)
    echo "<div class='container'";
     echo "You searched for: ". $query . "<br>";

     if(mysqli_num_rows($sql) > 0){
        echo mysqli_num_rows($sql) ." doctor(s) found.";
        echo "<br> <h2 style = 'color:#005252'>Results:</h2>";
        echo "<div class = 'search_result'>";
        while($results = mysqli_fetch_array($sql)){
            echo "<div class = 'search_content'>";
            echo "<h2>".$results['name']."</h2>"
            ."<img src='img/$results[image]' style='height:100px;display:block;'><br>"
            ."<h3>Experiences: </h3><h4>".$results['experiences']." years</h4><br><br>"
            ."<h3>Qualification: </h3><h4>".$results['qualification']."</h4><br><br>"
            ."<h3>Email: </h3><h4>".$results['email']."</h4><br><br>"
            ."<h3>Contact: </h3><h4>".$results['contact']."</h4><br><br>"
            ."<h3>Available Time: </h3><h4>".$results['available_time']."</h4><br><br>"
            ."<h3>About me: </h3><br><h4>".$results['image_text']."</h4><br><br>";
            echo "</div>";
        }
        echo "</div>";
     }
     else
        echo "No Results";
 }
 else
    echo "Minimum length is ".$min_length;
    echo "<br><br><br><br><br><br><br><br><br><br><br>";
?>
</div>

<div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</html>