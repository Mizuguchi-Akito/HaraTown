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
	住所<input type="text" name="address"><br>
	ログインID<input type="text" name="login"><br>
	パスワード<input type="password" name="password"><br>
    クレジットカード名義<input type="text" name="credit_name"><br>
    クレジットカード番号<input type="text" name="credit"><br>
    クレジットカード日付<input type="text" name="credit_date"><br>
    クレジットカードパスワード<input type="password" name="credit_pass"><br>
    
	<input type="submit" value="登録" >
	</form>
</body>

</html>