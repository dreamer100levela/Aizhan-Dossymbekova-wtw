<?php
include ("db_connect.php");
$mark = (int)$_POST['mark'];
$userID = (int)$_POST['userID'];
$newsID = (int)$_POST['newsID'];
$error = false;
$id=0;
if($mark>0) {$type='like';$ntype='dislike';}
else {$type='dislike';$ntype='like';}
	
$query=mysql_query("
	SELECT * FROM `rateNews` WHERE `newsID`= $newsID AND `userID`=$userID
");
$r = mysql_fetch_array($query);
if(isset($r)){
	$rate=(int)$r['rate'];
	$id=(int)$r['id'];
}else $rate=0;
if(($mark>0 && $rate>0) || ($mark<0 && $rate<0)){
	$error=true;
}else if($rate==0){
	mysql_query("
		INSERT into `rateNews` VALUES ('','$newsID','$userID','$mark')
	") or die(mysql_error());
	mysql_query("
		UPDATE `news` SET `$type`=`$type`+1 WHERE `id`='$newsID'
	") or die(mysql_error());
}else if(($rate>0 && $mark<0)||($rate<0 && $mark>0)){
	mysql_query("
		DELETE FROM `rateNews` WHERE `id`='$id'  
	");	
	mysql_query("
		UPDATE `news` SET `$ntype`=`$ntype`-1 WHERE `id`='$newsID'
	");
	$mark=0;
}
$r=mysql_fetch_array(mysql_query("SELECT * FROM `news` WHERE `id`='$newsID'"));
$rating = $r['like']-$r['dislike'];
if(!$error){
	echo json_encode(array('result'=>1,'rating'=>$rating,'mark'=>$mark));die();
}
else{
	echo json_encode(array("result"=>0));die();
}

?>