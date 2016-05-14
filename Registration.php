<?php session_start();
if($_SESSION['authorised']) header('Location: home.php');
 ?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="actions/jquery.js"></script>
<script type="text/javascript" src="actions/Script.js"></script><script type="text/javascript"></script>

<body><?php require("header.php") ?>
<div id="main_register">
    <div id="registration_table">
    	Welcome to Registration form!
    	<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
            <table>
                <tbody>
                    <tr>
                        <td><input type='text' name='login'  placeholder=" | Login" id="login" required maxlength="50" onBlur="checkLat(this)"/></td>
                    </tr>
                    <tr>
                        <td><input type='text' name='name' placeholder=" | Fullname" id='name' required maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td><input type='email' name='email' placeholder=" | e-mail" id='email' required maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td><input type='password' name='password' placeholder=" | Password" id='password' required maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td><input type='password' name='con_password' placeholder=" | Confirm Password" id='con_password' required maxlength="50" /></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="submit" value="REGISTER" id="submit" />
        </form>
    </div>
</div>
</body>