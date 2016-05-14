<?php
session_start();
if(isset($_SESSION['authorised']))	header('Location: home.php');
else header('Location: news.php');
?>