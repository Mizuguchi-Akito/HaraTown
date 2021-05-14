<?php session_start(); ?>
<?php
unset($_SESSION['customer']);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログアウト</title>
</head>

<body>
	<?php
		echo 'ログアウトしました。';
		?>
		<a href="./Main_Top.php">TOPへ戻る</a>
		<?php
	?>
</body>

</html>