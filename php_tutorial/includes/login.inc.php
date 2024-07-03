<?php
if(isset($_POST['submit'])){
	$username = $_POST['uid'];
	$pwd = $_POST['password'];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';


	if(emptyInputsLogin($username,$pwd) !== false){
		header("Location:../login.php?error=wrongLogin");
		exit();
	}

	loginUser($conn,$username,$pwd);

}else{
	header('Location:../login.php');
	exit();
} 