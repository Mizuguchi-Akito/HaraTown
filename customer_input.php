<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php require 'menu.php'; ?>

	<form action="customer_output.php" method="POST">
	名前	<input type="text" name="name"><br>
	アドレス<input type="text" name="address"><br>
	ログインID<input type="text" name="login"><br>
	パスワード<input type="password" name="password"><br>
	<input type="submit" value="登録" >
	</form>
</body>

</html>