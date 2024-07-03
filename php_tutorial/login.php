<?php
include_once 'header.php';
?>

<div class="form">
	<h1>SL Geek School</h1>
<form action="includes/login.inc.php" method="post">
	
      <input type="text" id="uid" name="uid" placeholder="Email">
   
      <input type="password" id="pwd" name="password" placeholder="Password">
   
 
  <br>
  <button name="submit" type="submit">Login</button>
  <br>
  <?php

if(isset($_GET["error"]))
    if($_GET["error"] == "none"){
      echo ' <div class= "error"> Acount created</div>';
   
    }else if($_GET["error"] == "stmtfailed"){
      echo ' <div class= "error"> Something went wrong</div>';
    }else if($_GET["error"] == "wrongLogin"){
        echo ' <div class= "error"> Please enter all feilds</div>';
    }else if($_GET["error"] == "wrongLogin2"){
        echo ' <div class= "error"> Wrong password</div>';
      }
?>
 <p>New Here ? Register <a href="signup.php">SignUp</a></p>

</form>
</div>


 <?php
include_once 'footer.php';
?>


