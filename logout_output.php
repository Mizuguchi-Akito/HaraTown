<?php session_start(); ?>
<?php
unset($_SESSION['customer']);
?>
<link rel="stylesheet" href="css/style3.css">
<link rel="stylesheet" href="css/style.css">
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログアウト</title>
</head>

<body>
<?php require 'menu.php'; ?>
	<?php
		echo '<h3>ログアウトしました。</h3>';
		echo '<p>またのお越しをお待ちしております。</p>'
		?>
		<a href="./Main_Top.php">TOPへ戻る</a>
		<?php
	?>
</body>

</html>