<?php
session_start();
if($_SESSION['uid'] == "")
{
    header("Location: forum.php");
    exit();
}
if(isset($_POST['topic_submit']))
{
    //for not filled boxes
    if(($_POST['topic_title'] == "") || ($_POST['topic_content'] == ""))
    {
       echo "You did not fill in all the fields. Please return to the previous page.";

    }
    else // for posting of topic
    {
        //$_POST is from create_topic.php
        include_once("connect.php");
        $cid = $_POST['cid'];
        $title = $_POST['topic_title'];
        $content = $_POST['topic_content'];
        $creator = $_SESSION['uid'];
        //acessing user table to get username
        $sql4 = "SELECT username FROM users WHERE id='".$creator."'";
        $res4 = mysqli_query($dbconn,$sql4) or die(mysql_error());
        while ($row = mysqli_fetch_assoc($res4))
        {
            $postcreator = $row['username'];
        }

        $sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date,topic_content, topic_reply_date) VALUES ('".$cid."', '".$title."', '".$postcreator."', now(),'".$content."', now())";
        $res = mysqli_query($dbconn,$sql) or die(mysql_error());
        $new_topic_id = mysqli_insert_id();

        $sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$postcreator."', '".$content."', now())";
        $res2 = mysqli_query($dbconn,$sql2) or die(mysql_error());

        $sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$postcreator."' WHERE id='".$cid."' LIMIT 1";
        $res3 = mysqli_query($dbconn,$sql3) or die(mysql_error());

        if(($res) && ($res2) && ($res3)) //when the table is updated then goes to view_topic.php
        {
            header("Location: view_category.php?cid=".$cid."&tid=".$new_topic_id."");
        }
        else
        {
            echo "There was a problem creating your topic. Please try again";
        }
    }
}

?>