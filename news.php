<?php
 session_start();
 include("db_connect.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WhatToWatch</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="actions/jquery.js"></script><script type="text/javascript"  src="actions/Script.js"></script><script type="text/javascript" src='actions/ajax.js'></script>


<body>
<input type="hidden" id="userID" value="<?php=$_SESSION['user']['id']?>">
<?php require("header.php") ?>
<?php include ('actions/addNews.php') ?>
<div id="LSC_hoverzone"><div class="LSC" id="LSCbody">
<table id="LSCtable">
<tbody id="LSCtbody">
	<tr><td id="head_button_LSC"><img width="100%"src="pictures/hover-headButton.png" id="headButton"></td></tr>
    <tr><td id="movies_button_LSC"><img width="100%" src="pictures/hover-moviesButton.png"></td></tr>
    <tr><td id="cartoons_button_LSC"><img width="100%" src="pictures/hover-cartoonsButton.png"></td></tr>
    <tr><td id="serials_button_LSC"><img width="100%" src="pictures/hover-serialsButton.png"></td></tr>
    <tr><td id="anime_button_LSC"><img width="100%" src="pictures/hover-animeButton.png"></td></tr>
</tbody>
</table>
</div></div>
<div id="News_body">
	<div id="news_border">
        <div id="News_main">
            <div id="type_of_news">
                <ul id="type_of_news_list">
                    <li><img id="moviesButton" src="pictures/moviesButton.png" height="50px"></li>
                    <li><img id="cartoonsButton" src="pictures/cartoonsButton.png" height="50px"></li>
                    <li><img id="serialsButton" src="pictures/serialsButton.png" height="50px"></li>
                    <li><img id="animeButton" src="pictures/animeButton.png" height="50px"></li>            
                </ul>
             </div>
            
        </div>
    </div>
    <div id="news"><?php include 'actions/news_row_update.php'?></div>
</div>
<?php 
	if(isset($_SESSION['authorised'])) include 'addPost.php';
?>



</body>
</html>