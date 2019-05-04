<?php

     include_once 'server.php';
     $result = mysqli_query($db,"SELECT * FROM hospitals");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Username</th>
<th>Qualification</th>
<th>Experiences</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['sector'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['website'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['describe_hos'] . "</td>";
echo "<td>" . $row['ped_avai'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($db);

?>
<br> 
<a href="home.php"> Home </a>