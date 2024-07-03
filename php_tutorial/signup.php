<?php
include_once 'header.php'
?>

<div class="form">
	<h1>SL Geek School</h1>
<form action="includes/signup.inc.php" method="post">
	
      <input type="text" id="name" name="name" placeholder="Name">
   
      <input type="text" id="username" name="uid" placeholder="Username">

      <input type="text" id="email" name="email" placeholder="Email">
   
      <input type="password" id="password" name="pwd" placeholder="Password">

      <input type="password" id="password" name="pwdrepeat" placeholder="Repeat Password">
   
 
  <br>
  <button name="submit" type="submit">Register</button>
  <br>

  <?php

  if(isset($_GET["error"]))
      if($_GET["error"] == "emptyinput"){
        echo ' <div class= "error"> Fill in the all fields</div>';
      }else if($_GET["error"] == "invalidUid"){
        echo ' <div class= "error"> Invalid user id.</div>';
      }else if($_GET["error"] == "invalidEmail"){
        echo ' <div class= "error"> Invalid email</div>';
      }else if($_GET["error"] == "PasswordNotMatch"){
        echo ' <div class= "error"> Password Not match</div>';
      }else if($_GET["error"] == "uidAlreadyExist"){
        echo ' <div class= "error"> User name or password already exist</div>';
      }else if($_GET["error"] == "stmtfailed"){
        echo ' <div class= "error"> Something went wrong</div>';
      
      }else if($_GET["error"] == "wrongLogin1"){
        echo ' <div class= "error"> User name is not exist. please create account.</div>';
      }
  ?>
       
  <p>Already have an account ? Login <a href="login.php">Login</a></p>
 

</form>
</div>


 <?php
include_once 'footer.php'
?>


