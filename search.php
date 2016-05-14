<?php
include ('db_connect.php');
$search = $_POST['search'];
$countF=0;
$searchresult="asd";
$searchresults="3";
$query=mysql_query("SELECT * FROM `news` WHERE `title` LIKE ('%$search%')");
/*if($r=mysql_fetch_array($query))echo $r['Title'];
if($r=mysql_fetch_array($query))echo $r['Title'];
if($r=mysql_fetch_array($query))echo $r['Title'];*/
while($r=mysql_fetch_array($query))echo $r['title']."▬ ";
echo "↓ ";
$query=mysql_query("SELECT * FROM `news` WHERE `title` LIKE ('%$search%')");
while($r=mysql_fetch_array($query))echo $r['id']."▬ ";
die();
?>