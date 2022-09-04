<?php
	//セッションの開始
	session_start();

	// DB設定ファイル
	if(!defined("CONST_INC"))		include("./inc/db_connect.php");

	$mail = htmlspecialchars($_POST['email']);
	$pass = htmlspecialchars($_POST['pass']);

	$sql = "select c_code from customers where c_email = ? and c_pass = ?";
	$prepare = $dbh->prepare ( $sql );
	$prepare->execute ( array($mail,$pass));
	$result = $prepare->fetch ( PDO::FETCH_ASSOC );

	if ( isset($result["c_code"]) ) {
		$_SESSION['c_code'] = $result["c_code"];
		unset($_SESSION['loginErrMessage']);
		unset($_SESSION['mail']);
		header("Location:index.php");
		exit();	
	}else{
		$_SESSION['loginErrMessage'] = "メール、またはパスワードに誤りがあります。　再確認してください";
		$_SESSION['mail'] = $mail;
		header("Location: Login.php");
		exit;
	}
?>
