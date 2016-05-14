<?php
session_start();
include 'db_connect.php';
if(isset($_SESSION['authorised'])){
		echo "<div id='addNews'>
				<div id='buttonPost'>
					<img id='addNewsButton' src='pictures/addNews.png' >
					<img id='addNewsText' src='pictures/addNewsText.png'>
				</div>
			</div>
			
			";
}
?>