<?php 
session_start();
if(isset($_POST['submit'])){
	
	 include('../config/DbFunction.php');
	 $obj=new DbFunction();
	 $_SESSION['login']=$_POST['id'];
	 $obj->login($_POST['id'],$_POST['password']);
}
	

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School Management Login </title>
    <style>

    </style>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
    <title>Student Admission System</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<h1 align="center"><img src="../icon/school.jpg" width="150px" height="150px"></h1> </h1>
<h2 align="center">Welcome Back</h2>
<h3 align="center">Sign in to your account below:</h3>
<form class="container" method="post" >
    <table style="width: 50%;" colspan="2" align="center">
        <tr>
            <td colspan="2" align="center"><b>Fill the  Information</b></td>
        </tr>
        <tr>
            <td>Enter Username </td>
            <td><input type="text"name="id" id="id" required placeholder="Roll No"></td>
        </tr>
        <tr >
            <td >Enter Password: </td>
            <td><input type="password" name="password"  id="password" required placeholder="Password"></td>
        </tr>

        <tr >
            <td colspan="2" align="center"><button class="container" type="submit" value="login" name="submit">Login</button></td>
        </tr>
    </table>
</form>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
 <script type="text/javascript">

            jQuery(function(){
                jQuery("#id").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid id"
                });
                jQuery("#password").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid password"
                });
                
            });
            
        </script>
</body>

</html>
