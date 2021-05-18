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

	<h3>購入確認</h3>

	<?php
		if(!empty($_SESSION["product"])){
			printf("氏名 : %s　様<br> お届け先 : %s<br> 使用するクレジットのお名前 : %s<br> クレジット下四桁 : %s<br>" ,
			$_SESSION["customer"]["name"],
			$_SESSION["customer"]["address"],
			$_SESSION['customer']['credit_name'],
			substr($_SESSION["customer"]["credit"],12 , 4)
		);
	
	require_once("cart.php");
	
	if(!empty($_SESSION["product"])){?>
		<a href="purchase_output.php" class="product_db">購入を確定する</a>
		
		<?php
		};
	}else{
		echo "<h3>カートに追加されていません。</h3>";
		echo "<p>商品を購入するにはカートに商品を追加してください。</p>";
	}
	?>
</body>

</html>