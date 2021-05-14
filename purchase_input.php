<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php require 'menu.php'; ?>
	
	<?php
		if(!empty($_SESSION["product"])){
			printf("氏名 : %s様<br> お届け先 : %s<br>",
		
		$_SESSION["customer"]["name"]
	,	$_SESSION["customer"]["address"]);
	
	require_once("cart.php");
	
	if(!empty($_SESSION["product"])){?>
		<a href="purchase_output.php">購入を確定する</a>
		
		<?php
		};
	}else{
		echo "カートに追加されていません。";
	}
	?>
</body>

</html>