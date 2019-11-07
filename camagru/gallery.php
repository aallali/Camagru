<?php
session_start();
include'config/database.php';


include('fragments/header.php') ;
include('fragments/footer.php');
include('functions/gallery.php');
include('functions/myalbum.php');
 include('functions/memeber.php');

$NbrEl = numberOfImg(1);
$number_el_per_page = 5;
$number_of_pages = ceil($NbrEl  / $number_el_per_page);
if(!isset($_GET['page']))
$page = 1;
else
$page = $_GET['page'];
$pagefix = $page;
$start_limit = ($page - 1) * $number_el_per_page;
$list = gallery($start_limit);

?>
<!DOCTYPE html>
<html>

  <head>
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="style/index.css">
  </head>
  <style type="text/css">
    .centerwrapper
    {
      width: 90%;
      margin: 0;
   display:inline-block;    
    }
  </style>
  <body>
    <div  style='color:black;border:solid black 5px;width:90%; height:40px; background:white;margin: auto' >
    <center>
      <?php 
echo ("<strong><a style='color:black;font-size:30px;margin-right:20px'>PAGE : </a></strong>");
        for($page = 1; $page <= $number_of_pages; $page++)
          echo('<a style="color:black;font-size:30px;margin-right:20px" href="gallery.php?page='.$page.'">' .$page.'</a>');
      ?>
</center>
    </div>
      <div class="centerwrapper">
  <?php if(!isset($_SESSION['id'])) 
    for($i = 0; $i < count($list); $i++)
        {
          $img = $list[$i]['img'];
           if ($img != null){
          echo ("
            <div style='border-bottom:solid gray 1px;border-radius:10px;color:white;border:solid black 5px;width: 300px;  float:right;height:auto; background:black; margin:10px'>
            <img width='300' height='370' src='img/$img'>
            ");
    
          echo("</div>");}
      }
    else{?>

    <?php
include 'functions/like.php';
      for($i = 0; $i < count($list); $i++)
        {
          $img = $list[$i]['img'];
           if ($img != null){
          $id = $list[$i]['userid'];
          $imgid = $list[$i]['id'];
          $user = his_name($id);
        $newid = "nlikes".$i;
  
            $nlikes = num_likes($imgid,1);
          echo ("<form action='forms/send_comment.php' method='post'>
            <div style='border-radius:10px;overflow:hidden ;black:white;border:solid white 3px;width: 300px;  float:right;height:430px;   background-color: #7DC3F3; margin:10px'>
             <img style='border-bottom:solid black 1px' width='300' height='370' src='img/$img'><input style='background-color:transparent;border:none;width:20px;font-size:18px' id ='$newid' value=\"$nlikes\" disabled>
           </input> LIKES
           <span id = \"result\"></span>
            <button type='button' id=\"displayResult$i\"ata-arg1='$imgid' style='outline:0; background:transparent;margin-top:1px;float:right; border:none;color:blue;height:30px'>");
           if(he_liked2($_SESSION['id'], $imgid) == 0)
            {
              echo("<img id='dimg$i'  style='height50px;width:50px;margin-top:-8px'  src='img/sysimg/dislike.png'>");}
           else
            echo("<img id='dimg$i'  style='height50px;width:50px;margin-top:-8px'  src='img/sysimg/like.png'>");
          echo("
            </button><br>
            [".num_comments($imgid)."] comments<br>
            <input style='width:200px'  name='cmnt' type='text' placeholder='write a comment ...'></input>
            <input name='userid' type='text' value='".$_SESSION['id']."'hidden></input>
            <input name='imgid' type='text' value='".$imgid. " ' hidden></input>
            <input name='page' type='text' value='".$pagefix. " ' hidden></input>
            <button type='submit'>comment</button><p>");
          echo("
            <div style='border-bottom:solid gray 1px;overflow-y:scroll;
            flex-wrap: wrap;
            overflow-x: hidden;
            width:100%;
            max-height :300px;
            word-wrap:break-word'>");
         for($x = count(get_comments($imgid))-1 ; $x >= 0  ; $x--) 
          {
            echo("<div style='border-bottom:solid gray 1px'><a style='color:black'>[".his_name(get_comments($imgid)[$x]['userid'])."]</a><strong> :  ".get_comments($imgid)[$x]['comment']."</strong> </p></div>"); 
          }

          echo("</div></div></form>");}
      }?>

    </div>

<?php } ?>



  </body>
  <script type="text/javascript">

<?php  
for($i = 0; $i < count($list); $i++)
{
echo "const btnn$i = document.getElementById('displayResult$i');";
echo "const serverResponse$i = document.getElementById('displayResult$i');";
echo "const type$i = document.getElementById('dimg$i');";
} ?>

window.onload = function() {
<?php  
for($i = 0; $i < count($list); $i++)
{
  $s = count($list);
  $name = $_SESSION['id'];
echo("
var xhttp = new XMLHttpRequest();

btnn$i.addEventListener('click', function(test){
var txt = document.getElementById(\"displayResult$i\").innerHTML;
var txt1 = btnn$i.getAttribute(\"ata-arg1\");
var txt2 = type$i.getAttribute(\"src\");
var url = 'test.php?type=' + txt2+'&&userid='+ $name+'&&imgid='+txt1;
 //alert(url);
  // http.open('GET', url, true);
  //Send the proper header information along with the request
  //http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.onreadystatechange = function() {
  //Call a function when the state changes.
    if(xhttp.readyState == 4 && xhttp.status == 200) {
      // type$i.setAttribute(\"type\",xhttp.responseText);
      //alert(xhttp.responseText);
      type$i.setAttribute(\"src\",xhttp.responseText);
      location.reload()
    }
  }
  xhttp.open(\"GET\", url, true);
  xhttp.send();
});
  ");
} ?>
}
<?php  
for($i = 0; $i < count($list); $i++)
{
  $s = count($list);
echo("
    document.getElementById('displayResult$i').onclick = function fun() {
      // alert(\"allali\");
    }
  ");
} ?>

 <?php $_SESSION['error'] = null ?>
</script>
</html>