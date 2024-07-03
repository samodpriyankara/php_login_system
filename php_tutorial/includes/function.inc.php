<?php

function emptyInputsSignUp($name,$email,$username,$pwd,$pwdrepeat){
	$result;
	if(empty($name)|| empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat) ){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}


function invaldUid($username){
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){

		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invaldEmail($email){
	$result;
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd,$pwdrepeat){
	$result;
	if($pwd !== $pwdrepeat){

		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function uidExist($conn,$username,$email){
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if( !mysqli_stmt_prepare($stmt, $sql)){
header("Location:../signup.php?error=stmtfailed");
exit();
	}

	mysqli_stmt_bind_param($stmt,"ss",$username,$email);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		return false;;
	}

	mysqli_stmt_close($stmt);
}

	
function createUser($conn,$name,$email,$username,$pwd) {
$sql = "INSERT INTO users(usersName,usersEmail,usersUid,usersPassword) VALUES (?,?,?,?);";

$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
header("Location:../signup.php?error=stmtfailed");
exit();
	}

	$hashePwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashePwd);
	mysqli_stmt_execute($stmt);

	mysqli_stmt_close($stmt);
	header("Location:../login.php?error=none");
exit();
}


function emptyInputsLogin($username,$pwd){
	$result;
	if(empty($username) || empty($pwd) ){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

function loginUser($conn,$username,$pwd){
	$uidExist = uidExist($conn,$username,$email);
	if($uidExist === false ){
		header("Location:../signup.php?error=wrongLogin1");
		exit();
	}

	$pwdHashed = $uidExist["usersPassword"];
	$checkPwd = password_verify($pwd,$pwdHashed);

	if($checkPwd === false){
		header("Location:../login.php?error=wrongLogin2");
		exit();
	}
	else if($checkPwd === true){
		session_start();
		$_SESSION["userid"] = $uidExist["userId"];
		$_SESSION["useruid"] = $uidExist["usersUid"];
		$_SESSION["username"] = $uidExist["usersName"];
		header("Location:../index.php?");
		exit();
	}
}