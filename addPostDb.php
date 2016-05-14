<?php
session_start();
include("actions/db_connect.php");
if(!($_SESSION['authorised'])) die("YOU ARE NOT AUTHORISED!!! HOW HAVE DONE THIS!! YOU MATHA HACKA!! <a href='news.php'>go back!</a>");
$title = $_POST['title'];
$text = $_POST['text'];
$movies = $_POST['movies'];
$cartoons = $_POST['cartoons'];
$anime = $_POST['anime'];
$serials = $_POST['serials'];
$error=false;
$imageName="";
$msg="";
echo "smthng";
if ((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg")) && ($_FILES["image"]["size"] < 20000000)) {
	if ($_FILES["image"]["error"] > 0) {
			$error=true;
			$msg="Unexpected error";
		}
	else {
		$i=1;
		while($imageName==""){
			if(!file_exists("news/img/".$i))$imageName=$i;
			else $i++;
		}
		move_uploaded_file($_FILES["image"]["tmp_name"], "news/img/".$imageName);
	}
}
else  {
	$error=true;
	$msg="Incorrect file";
}


$mainCategory="";
$m=0;
$c=0;
$a=0;
$s=0;
if($movies=="1"){
	if($_POST['m']=="0") $mainCategory='movies';
	$m=((int)$_POST['m'])+1;
}
if($cartoons=="1"){
	if($_POST['c']=='0') $mainCategory='cartoons';
	$c=((int)$_POST['c'])+1;
}
if($anime=="1"){
	if($_POST['a']=='0') $mainCategory='anime';
	$a=((int)$_POST['a'])+1;
}
if($serials=="1"){
	if($_POST['s']=='0') $mainCategory='serials';
	$s=((int)$_POST['s'])+1;
}
$userID = $_SESSION['user']['id'];
mysql_query("INSERT INTO `news` (`title`, `Category`, `text`, `photo`,`author`, `like`, `dislike`) 
	                   VALUES ('$title', '$mainCategory', '$text', '$imageName', $userID , 0, 0) ");

$news=mysql_fetch_array(mysql_query("SELECT * FROM `news` ORDER BY `id` DESC"));
$newsID=$news['id'];
mysql_query("INSERT INTO `newsCategory` VALUES ('',$m,$c,$a,$s,$newsID)");

header('location: news.php');
	

?>