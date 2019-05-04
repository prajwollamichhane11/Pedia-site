<?php session_start();

if ($_SESSION['uid'])
{
        $row = '';
        $postcreator = '';
	if (isset($_POST['reply_submit']))//value comes from post_reply.php
	{
		include_once("connect.php");
		$creator = $_SESSION['uid'];
		$cid = $_POST['cid'];//from post_reply.php
		$tid = $_POST['tid'];
		//$id = $row['id'];
		$reply_content = $_POST['reply_content'];

		//insert reply in the table
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$postcreator."', '".$reply_content."',now())";
		$res = mysqli_query($dbconn,$sql) or die(mysql_error());
		//floolowing 2 lines are for last post date and last user date which we have not applied yet.
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$postcreator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = mysqli_query($dbconn,$sql2) or die(mysql_error());
		//following is for reply counter.
		$sql4 = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."'";
        $res4 = mysqli_query($dbconn,$sql4) or die (mysql_error());
        if(mysqli_num_rows($res4) > 0)
        {
            while ($row =mysqli_fetch_assoc($res4))
            {
            	$replycount = $row['replies'];
            	$replycount ++;
            	$topiccreator = $row['topic_creator'];

            }
        }
        $sql3 = "UPDATE topics SET topic_reply_date=now(), replies='".$replycount."', topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = mysqli_query($dbconn,$sql3) or die(mysql_error());
		//for notification
		      $noti_increase = '';
			$sql6 = "UPDATE users SET forum_notification='".$noti_increase."' WHERE username='".$postcreator."'";
			$res6 = mysqli_query($dbconn,$sql6) or die(mysql_error());

		if(($res) && ($res2) && ($res3))
		{
			header("Location: view_topic.php?cid=".$cid."&tid=".$tid."");
		}
		else
		{
		echo "<p>There was a problem posting your reply. Try again later.</p>";
		}
	}
	else
	{
		exit();
	}
}
else
{
	exit();
}

?>