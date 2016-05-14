<?php
 session_start();
 ?>
<?php
	function checkLogin($login){
		$query = mysql_query("SELECT * FROM `users`");
		while($row = mysql_fetch_array($query)){
			if($login==$row['login']) return true;
		}return false;
	}
	function checkPassword($login,$password){
		$query = mysql_query("SELECT `password` FROM `users` WHERE `login`='$login'");
		while($row = mysql_fetch_array($query)){
			if($password==$row['password'])return true;
		}return false;
	}
	function getID($login){
		$query=mysql_query("SELECT * FROM `users` WHERE `login`='$login'");
		while($row  = mysql_fetch_array($query)){
			return $row['id'];
		}
	}
	function getName($id){
		$query = mysql_query("SELECT `name` FROM `users` WHERE `id`='$id'");
		while($row = mysql_fetch_array($query)){
			return $row['name'];
		}
	}
	function getUser($id){
		return mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$id'"));
	}
	$connect = mysql_connect("localhost","root","") or die ("Couldn't connect to localhost");
	mysql_select_db("whattowatch") or die("Couldn't connect to database");
	if(!isset($_SESSION['authorised'])){
		$login=strtolower($_POST['login']);
		$password = $_POST['password'];
		if(!checkLogin($login)) die("Wrong login");
		if(!checkPassword($login,$password)) die("wrong password");
		else{
			$_SESSION['user']=getUser(getID($login));
			$_SESSION['id']=getID($login);
			$_SESSION['login']=$login;
			$_SESSION['name']=getName(getID($login));
			$_SESSION['authorised']=true;
			header("Location: news.php");
		}
	}
	else{
		session_destroy();
		header("Location: news.php");
	}
?>