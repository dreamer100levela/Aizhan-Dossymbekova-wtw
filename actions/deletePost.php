<?php
$connect = mysql_connect("localhost","root",'') or die("Error with connect to myAdmin!");
mysql_select_db("whattowatch") or die("Error with connect to DB!");
$newsID=$_POST['newsID'];
mysql_query("DELETE FROM `news` WHERE `id`='$newsID'") or die('0');
mysql_query("DELETE FROM `newsCategory` WHERE `newsID`='$newsID'") or die('0');
mysql_query("DELETE FROM `rateNews` WHERE `newsID`=$newsID") or die('0');
echo '1';
?>