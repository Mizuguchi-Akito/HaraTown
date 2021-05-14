<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<?php require 'menu.php'; ?>

	<form action="customer_output.php" method="POST" class="main2">
	名前	<input type="text" name="name" class="sub"><br>
	住所<input type="text" name="address" class="sub"><br>
	ログインID<input type="text" name="login" class="sub"><br>
	パスワード<input type="password" name="password" class="sub"><br>
    クレジットカード名義<input type="text" name="credit_name" class="sub"><br>
    クレジットカード番号<input type="text" name="credit" class="sub"><br>
    クレジットカード日付<input type="text" name="credit_date" class="sub"><br>
    クレジットカードパスワード<input type="password" name="credit_pass" class="sub"><br>
	<input type="submit" value="登録" >
	</form>
</body>

</html>