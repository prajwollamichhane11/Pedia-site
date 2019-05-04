<?php //session_start(); ?>
<! header Pediasite >
    <link rel="stylesheet" href="../css/style1.css" />
    <div class="head">
        <center>
        <img src="../images/head1.png" alt="" height="130px" style="padding-top: 10px;" />
        </center>
    </div> <br>
    <div class="menu" id="nav">
    <div>
        <div id="container">
        <ul>
            <a href="home.php"><li style="margin-left: 10px;"> &nbsp;&nbsp; Home&nbsp;  </li></a>
            <a href="pediatricians.php"><li style="margin-left: 10px;"> &nbsp;&nbsp;Pediatricians&nbsp; <span><img src="../images/downarrow.png" style="height: 10px; width: 10px;" /></span>&nbsp;</a>
                <ul>
                   <a href="doctorlog.php"><li style="padding-left:26px; padding-right:11px;">Pediatricians Login <span><style="height:10px; width:10px;" /></span></a>

                   <a href = "doctorreg.php"><li style="padding-left:26px; padding-right:25px;">Pediatricians Registration</li></a>
                </ul> </li></a>
            <a href="hos_id.php"><li style="margin-left: 10px;">&nbsp;&nbsp;  Hospital&nbsp;  <span><img src="../images/downarrow.png" style="height: 10px; width: 10px;" /></span>&nbsp;</a>
            <ul>
                   <a href="hospitalreg.php"><li style="padding-left:26px; padding-right:11px;">Hospital Registration<span><style="height:10px; width:10px;" /></span></a>
            </ul>
            </li>
            </a>

            <a href="pregnancy.php"><li style="margin-left: 10px;">&nbsp;&nbsp;  Pregnancy&nbsp;  </li></a>
            <a href="parenting.php"><li style="margin-left: 10px;">&nbsp;&nbsp; Parenting&nbsp; </li></a>
            <a href="nutrition.php"><li style="margin-left: 10px;">&nbsp;&nbsp; Nutrition&nbsp; </li></a>
            <a href="vaccination.php"><li style="margin-left: 10px;">&nbsp;&nbsp; Vaccination &nbsp; </li></a>
            <a href="entertainment.php"><li style="margin-left: 10px;">&nbsp;&nbsp; Entertainment &nbsp; </li> </a>
            <a href="forum.php"><li style="margin-left: 10px;">&nbsp;&nbsp;  Forum &nbsp;


            <li style="background-color: transparent; padding-top: 0px;">
                <?php
                $reply= $replycheck="";
                //for notification icon
                    include_once("connect.php");
                        if(isset($_SESSION['uid']))
                        {
                            $creator = $_SESSION['uid'];

                            $sql4 = "SELECT * FROM users WHERE id='".$creator."'";
                            $res4 = mysqli_query($dbconn,$sql4) or die(mysql_error());
                            while ($row = mysqli_fetch_assoc($res4))
                            {
                                $postcreator = $row['username'];
                            }
                            $sql = "SELECT * FROM topics WHERE topic_creator='".$postcreator."'";
                            $res = mysqli_query($dbconn,$sql) or die(mysql_error());
                            while($row2 = mysqli_fetch_assoc($res))
                            {
                                $reply = $row2['replies'];
                                $replycheck = $row2['reply_check'];
                            }
                            if ($reply != $replycheck)
                            {
                                include_once 'notification.php';
                            }
                        }
                 ?>
                 <ul style="margin-top: 36px; width: 240px; margin-left: -110px; background-color: transparent;">
                    <li style="height: 15px; width: 25px; transform: rotate(45deg); margin-bottom: -25px; margin-top: -5px;"></li>
                 <li align="center" style="text-transform: none;border-top-left-radius:20px; border-bottom-right-radius: 20px;">You have a reply to your forum.<br> Please view your forum topic.</li>
                 </ul>
            </li>

            </li>
            </a>

            <?php
            if(!isset($_SESSION['uid'])){

                echo '<a href="register.php"><li style="margin-left: 80px;">&nbsp;&nbsp; SIGN UP / Register&nbsp;&nbsp;</li></a><br>';
                 }
            else if(isset($_SESSION['uid'])){

              echo '<a href="logout.php"><li style="margin-left: 80px;">&nbsp;&nbsp; LOGOUT &nbsp;&nbsp; </li></a><br>';


            }
           ?>
        </ul>
    </div>
   </div>
   </div>


<!-- add javascript -->
<script type="text/javascript">
    var nav = document.getElementById('nav');
    window.onscroll = function()
    {
        if(window.pageYOffset > 100)
        {
            nav.style.position = "fixed";
            nav.style.top = 0;
        }
        else
        {
            nav.style.position = "relative";
            nav.style.top = 100;
        }
    }
</script>
