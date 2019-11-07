<?php
session_start();
include('fragments/header.php') ;
include('fragments/footer.php');
include('functions/download.php');
include('functions/myalbum.php');
include 'functions/like.php';
include('functions/gallery.php');
 include('functions/memeber.php');
if (!isset($_SESSION['id']))
header("Location: index.php");

$_SESSION['pdp'] = download_img($_SESSION['id']);
$notif = $_SESSION['notif'];
$userid = $_SESSION['id'];
$list = myalbum($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="style/profile.css">
    <link rel="stylesheet" type="text/css" href="style/buttons.css">
</head>
<body>
    <h2 style="text-align:left; color:white">User Profile Card</h2>
    <div class="left">
        <div class="card">
            <img data-index="0" src="img/sysimg/<?php echo $_SESSION['pdp']['pdp']; ?>" alt="<?php echo $_SESSION['username'];?> " style="width:100%">
            <h1 style="color:#3B5998;">[<?php echo $_SESSION['username'];?>]</h1>
            <p class="title"><a style="color:black;font-size: 17px;text-align: left">E-mail: </a><?php echo $_SESSION['mail']; ?></p>
            <p style="color:green">Account Verified</p>
            <form action="forms/uploadimg.php" method="post" enctype="multipart/form-data">
                Change profile picture
                <input type='file' name='image' required>
                <!-- 				<input name="image" id='fileid' type='file' data-index="0" onChange="swapImage(this)"/>-->
                <p><button type="submit" name="upload" value="upload">Submit Changes</button></p>
            </form>
        </div>
        <div class="card1">
            <h1 style="border-bottom: solid black 2px;margin-bottom:6px"> CHANGE YOUR INFOS </h1>

            <form action="forms/change_details.php" method="post">
                <p><label style="float:left;margin-left: 10px;font-size: 18px"> New username : </label><input style="font-size: 18px;float:right;margin-right: 10px" type="text" name="username" required></p><br>
                <p><label style="float:left;margin-left: 10px;font-size: 18px"> New Email : </label><input style="font-size: 18px;float:right;margin-right: 10px" type="email" name="email" required></p><br>
                <p><label style="float:left;margin-left: 10px;font-size: 18px"> New Password : </label><input style="font-size: 18px;float:right;margin-right: 10px" type="text" name="password" required></p><br><br>
                <p><label style="float:left;margin-left: 10px;font-size: 18px"> get notifications : </label></p>
                <?php if($notif == 0)
				{
					echo("<div class=\"button_cont\" align=\"center\"><a class=\"example_a enable\" href=\"forms/disablenotif.php?notif=1&&id=$userid\" target='_self'>Enable</a></div>");
				}
				else
			{
				echo("<div class=\"button_cont\" align=\"center\"><a class=\"example_a disable\" href=\"forms/disablenotif.php?notif=0&&id=$userid\" target='_self' >Disable</a></div>");}
				 ?>
                <a href="" style="color:red;font-size:20px"> <?php echo $_SESSION['error'];
			 ?></a>
                <p><button type="submit" name="upload" value="upload">Submit Changes</button></p>
            </form>
        </div>

        <div class="card1 new-class">
            <h1 style="border-bottom: solid black 2px;margin-bottom:6px"> ADVANCED </h1>

            <form>
                <p><div class="button_cont" align="center"><a class="example_a disable" href="forms/delete_p.php?delete=account" target='_self'>Delete Account</a></div></p><br>
                <p><div class="button_cont" align="center"><a class="example_a disable" href="forms/delete_p.php?delete=cmnt" target='_self'>Delete all my comments</a></div></p><br>
               <p><div class="button_cont" align="center"><a class="example_a disable" href="forms/delete_p.php?delete=likes" target='_self'>Remove all my likes</a></div></p><br>
                <p><div class="button_cont" align="center"><a class="example_a disable" href="forms/delete_p.php?delete=album" target='_self'>Delete my album</a></div></p><br>
                <p><div class="button_cont" align="center"><a class="example_a golden" href="https://storage.gra1.cloud.ovh.net/v1/AUTH_296c7803aa594af69d39b970927c8fb9/media/avatars/RX/RXlr6q0QU7E7bw5e.jpeg" target='_self'>Premium Membership</a></div></p><br>
            </form>
        </div>
    </div>
    <!-- end left div -->
    <div>
        <center>
            <form action="forms/sharepic.php" method="post" enctype="multipart/form-data">
                <button name="submit" class="buttonS" type="submit" value="submit">Share</button>
                <input type='file' name='sharepic' required>
            </form>
        </center>
    </div>
    <div class="opla" align="center" style="height:80%;overflow: auto">
        <?php
        $list = myalbum($_SESSION['id']);
			for($i = 0; $i < count($list); $i++)
				{
					$img = $list[$i]['img'];
                    $imgid = $list[$i]['id'];
                    $numl = num_likes($imgid,1);
					if($list[$i]['img']!="")
					echo ("<div style='color:white;border:solid black 2px;width: 300px; float:right; height:430px; background:#3B5998; margin:10px'><img style='border-bottom:solid white 1px' width='300' height='370' src='img/$img'>Likes:[$numl] - Comments:[".num_comments($imgid)."]</div>");
			}
			?>
    </div>
    <?php $_SESSION['error'] = null ?>
</body>
</html>