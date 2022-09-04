<?php
// セッションの開始
session_start ();

$errMsg=setText('loginErrMessage');
$mail=setText('mail');

$_SESSION['loginErrMessage'] = "";
$_SESSION['mail'] = "";


function setText($name) {
		return isset ( $_SESSION[$name] ) ? $_SESSION[$name] : "";
}

?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8">
<title>GASE MALL</title>
<link rel="stylesheet" href="css/default.css">
</head>
<body>
GASE MALL<br />
<h1>
GASE MALL
</h1>
<hr class="hr_head" noshade="noshade" />
<p class="catchphrase">あなたの「欲しい」がすべてある</p>
<form action="./CheckID.php"  method="post">
    <ul>
        <li>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?= $mail ?>" required placeholder="info@example.com" />
        </li>
        <li>
            <label for="pass">Password</label>
            <input id="pass" type="text" name="pass" required >
        </li>
        <li>
        	<input class="submit" name="Submit1"  type="submit" value="Login" />
        </li>
		<li class="errMessage"><?= $errMsg ?></li>
    </ul>
</form>
<p>
	<div class="kahen_Box">
		<div class="kahen_img">
			<img src="img/vegetables.jpg" alt="top">
		</div>
	</div>
</p>
</body>
</html>
