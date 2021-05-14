<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require 'menu.php'; ?>
	
	<?php
	    require 'db_connect.php';
		$purchase_id = 1;
		foreach ($pdo->query('select max(id) from purchase') as $row) {
			$purchase_id = $row['max(id)'] + 1;
		}
		$sql = "insert into purchase values(:id, :customer_id)";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(':id',$purchase_id, PDO::PARAM_INT);
		$stm->bindValue(':customer_id',$_SESSION['customer']['id'], PDO::PARAM_INT);
		if ($stm->execute()) {
			foreach ($_SESSION['product'] as $product_id => $product) {
				$sql = "insert into purchase_detail values(:purchase_id,:product_id,:count)";
				$stm = $pdo->prepare($sql);
				$stm->bindValue(':purchase_id', $purchase_id, PDO::PARAM_INT);
				$stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
				$stm->bindValue(':count', $product['count'], PDO::PARAM_INT);
				$stm->execute();
			}
			unset($_SESSION['product']);
			echo '購入手続きが完了しました。ありがとうございます。';
		} else {
			echo '購入手続き中にエラーが発生しました・もう一度やり直してください。';
		}
	?>
</body>
</html>