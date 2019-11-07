<?php
session_start();
include('fragments/footer.php');
include('functions/gallery.php');
include('functions/myalbum.php');
include('functions/download.php');
if(!isset($_SESSION['id']))
	header("location: index.php");

$_SESSION['pdp'] = download_img($_SESSION['id']);
$logged = $_SESSION['username'];
$loggedid = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>cameera</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style/camera.css"/>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	</head>
	<style type="text/css">
	body{
background: rgb(134,133,154);
background: linear-gradient(90deg, rgba(134,133,154,1) 8%, rgba(62,59,59,1) 31%, rgba(250,250,250,1) 100%);
		}


.stickers1{
			display: inline-block;
			margin-top: 30px;
			margin-left: 10px;
			width:100%;
			min-height: 100px;
			overflow: auto;
			white-space: nowrap;
		}
			</style>
	<body>
		
		<h1 align="center" style="color:white">Allali's Camagru </h1>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			 <!-- Brand/logo -->
  <a class="navbar-brand" href="profile.php">
    <img src="img/sysimg/<?php echo $_SESSION['pdp']['pdp'];?>" alt="logo" style="width:60px;border-radius: 40px;border: solid 2px white;">
  </a>
  
			<a class="navbar-brand"  href="about.html">CAMAGRU</a> 
			<!-- Toggler/collapsibe Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" style="font-size: 30px" href="forms/logout.php">Disconnect - </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="font-size: 30px; margin-left:10px" href="profile.php">Profile - </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="font-size: 30px" href="gallery.php">gallery -</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="font-size: 30px" href="member.php">members -</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="font-size: 30px" href="about.html">ABOUT! -</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col col-sm-8 burd">
					
					<div align="center">
						<h1 style="font-size:3em;color:gray" id="err1">WEB'CAM</h1>
					<video class="my-img" id="videoa" playsinline autoplay width="600" height="400"></video><br>
					<a class="both-capture-photo" onClick="showit();noSnap2()" id="capture"> capture pic</a>
					
					<h1 style="font-size:3em;">You are beautiful xD [joke] </h1>
					<canvas id="my_canvas"  class="my-img"  width="600" height="400" hidden></canvas>
					<img class="my-img" id ="cat13" src="https://vettedpetcare.com/vetted-blog/wp-content/uploads/2018/08/my-cat-is-suddenly-hidding-all-the-time-square.jpeg" width="600" height="400">
					<form method="post"  action="forms/shareMontage.php">
						<input id="imgConverted" type="text" name="img" value="" hidden>
						<button class="both-capture-photo"id = "btnDisplay"  value="submit" name="submit" type="submit" hidden>Snap It</button>
					</form>
					<label onClick="showit()" for="imageLoader"><img src="https://cdn3.iconfinder.com/data/icons/buttons/512/Icon_16-512.png?fbclid=IwAR04G-tx9uO4GmR5tajbufqhY5o9sf87KTzRq-RWQIpiXbOap8wCEYTvIfY" alt=""></label>
					<input type="file"  onChange="noSnap2();showCanvas()" id="imageLoader" name="imageLoader" accept="image/png, image/jpeg"/> Upload Your Image
					<h1>Choose a sticker below : </h1>
					<div class="stickers1">
						<?php
						for($i = 0; $i <=23; $i++)
						{
						$name = "sticker$i.png";
						if (file_exists('img/stickers/'.$name))
						echo("<img  id ='sti$i' class='thumbnail' src='img/stickers/sticker$i.png'></img>
						<input id='sticker$i' style='width: 40px; height: 50px;' type='radio' name='img' value='./img/stickers/$name' onchange='myFunction($i);'  disabled>");
						}?>
						
					</div>
				</div>
			</div>
			<div  class="col col-sm-4 burdl" align="center">
				<h1>Montages</h1>
				<div class="scrolit">
					<?php
						$list = galleryall();
					for($i = 0; $i < count($list); $i++)
					{
					$img = $list[$i]['img'];
					$imgid = $list[$i]['id'];
					if(!empty($img))
					{
			 if($_SESSION['id'] == $list[$i]['userid'])
					echo("<a href='./forms/deletepic.php?imgid=$imgid&&userid=$loggedid'><img id='borderimg' class='my-img' src='img/$img' height='300' width='300'><p></p></a>");
				else
					echo("<img id='borderimg' class='my-img' src='img/$img' height='300' width='300'><p></p>");
				 }} ?>


					<p></p>
				</div>
			</div>
		</div>
	</div>
	 <?php $_SESSION['error'] = null ?>
</body>
<script type="text/javascript">
<?php include'js/camerajs.php' ?>
</script>
</html>