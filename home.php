<?php session_start();
if($_SESSION['authorised'])header("Location: news.php");
 ?>	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="actions/jquery.js"></script>
<script type="text/javascript" src="actions/Script.js"></script>


<body>
<?php require("header.php") ?>
<div id="home_body">
	<table width="100%" height="100%">
    <tbody>
    	<tr>
        	<td width="5%" height="100%" id="LSHome">	
          </td>
            <td width="75%" height="100%" style="background-color:#C6C">
            </td>
            <td width="20%" height="100%" style="background-color:#0CF">
            </td>
        </tr>
    </tbody>
    </table>
</div>


</body>
</html>
