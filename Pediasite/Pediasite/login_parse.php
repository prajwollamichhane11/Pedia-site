<?php
//for login
//session_start();
include_once("server.php");

$username='';
$password='';

if (isset($_POST['submit_forum']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    

    $sql = "SELECT * FROM users WHERE username='$username' AND password= '$password' ";
    $res = mysqli_query($db,$sql) or die(mysql_error());


    if (mysqli_num_rows($res) === 1)
    {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['uid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: forum.php");
        exit();
    }
    else
    {
        echo "Invalid login information. Please return to the previous page.";
        exit();
    }
}

?>