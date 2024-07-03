<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style>
        * {
          margin: 0;
        }
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        li a:hover:not(.active) {
          background-color: #111;
        }

        .active {
          background-color: #04AA6D;
        }

        .error{
          color : red;
        }
        .logout {
          background-color: red;
          border : 1px solid red;
          padding : 12px;
          font-size : 22px;
          margin-bottom: 10px;
        }

        /* CSS for Login form  */

        input[type=text],input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
        }

        .form{
          width: 70%;
          margin-left: auto;
          margin-right: auto;
          text-align: center;
        }

</style>
</head>
<body>
	<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>

  <li style="float:right">
    <?php
  if(isset($_SESSION["username"])){
		echo '<a class = "active" href="£">'.$_SESSION["username"].'</a>';
    echo '<a class = "logout" href="includes/logout.inc.php">Logout</a>';
	}else{
		echo '<a class = "active" href="login.php">Login</a>';
	}
	 ?>
   </li>
</ul>