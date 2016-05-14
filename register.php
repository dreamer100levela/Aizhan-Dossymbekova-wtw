<?php
session_start();
if(isset($_SESSION['authorised']))header('location: home.php'); 
include("db_connect.php");
	$login=strtolower($_POST['login']);
	$logins=mysql_query("SELECT `login` FROM `users`");
	while ($row=mysql_fetch_array($logins)){
		if($login==$row['login']) die("This login is already used  try another one <a href=\"registration.php\">go back</a>");
	}
	$name=$_POST['name'];
	$email=$_POST['email'];
	if($_POST['password']==$_POST['con_password']){
		$password=$_POST['password'];
		$query=mysql_query("INSERT INTO `users` VALUES ('','$login','$password','$email','$name','user')") or die(mysql_error());
		$r=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login`='$login'"));
		$_SESSION['authorised']=true;
		$_SESSION['user']=$r;
		$_SESSION['id']=$r['id'];
		$_SESSION['name']=$name;
		$_SESSION['login']=$login;
		header('location: home.php');
	}
	else { die( "Your confirm password is incorrect!
				<a href=\"Registration.php\"> go back</a>");}
	
?>