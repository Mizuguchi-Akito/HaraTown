<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>

	
	<?php
		if(!empty($_SESSION["product"])){
			printf("氏名 : %s様<br> お届け先 : %s<br>",
			$_SESSION["customer"]["name"],
			$_SESSION["customer"]["address"]);
	
	require_once("cart.php");
	
	if(!empty($_SESSION["product"])){?>
		<a href="purchase_output.php">購入を確定する</a>
		
		<?php
		};
	}else{
		echo "<h3>カートに追加されていません。</h3>";
		echo "<p>商品を購入するにはカートに商品を追加してください。</p>";
	}
	?>
</body>

</html>