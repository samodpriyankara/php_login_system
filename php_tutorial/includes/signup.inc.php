<?php
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$pwdRepeat = $_POST['pwdrepeat'];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	$emptyInput = emptyInputsSignUp($name,$email,$username,$pwd,$pwdRepeat);
	$invalidUid = invaldUid($username);
	$invalidEmail = invaldEmail($email);
	$pwdMatch = pwdMatch($pwd,$pwdRepeat);
	$uidExist = uidExist($conn,$username,$email);


	if($emptyInput !== false){
		header('Location:../signup.php?error=emptyinput');
		exit();
	}

	if($invalidUid !== false){
		header('Location:../signup.php?error=invalidUid');
		exit();
	}

	if($invalidEmail !== false){
		header('Location:../signup.php?error=invalidEmail');
		exit();
	}

	if($pwdMatch !== false){
		header('Location:../signup.php?error=PasswordNotMatch');
		exit();
	}

	if($uidExist !== false){
		header('Location:../signup.php?error=uidAlreadyExist');
		exit();
	}


	createUser($conn,$name,$email,$username,$pwd);

}else{
	header('Location:../signup.php');
	exit();
}