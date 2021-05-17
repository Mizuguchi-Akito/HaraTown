<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入履歴画面</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php require 'menu.php'; ?>
	<h2>購入履歴</h2>
	<?php
	if (!isset($_SESSION['product'])) {
		echo '個人情報を確認するにはログインしてください。';
	} else {  //正常処理 
	?>
		<p>商品名：<?= $_SESSION['product']['name'] ?></p>
		<p>ブランド：<?= $_SESSION['product']['brand'] ?></p>
		<p>サイズ：<?= $_SESSION['product']['size'] ?></p>
		<p>カラー：<?= $_SESSION['product']['color'] ?></p>
		<p>値段：<?= $_SESSION['product']['price'] ?></p>
	<?php
	}
	?>
</body>

</html>