<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入履歴画面</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php
	require 'menu.php';
	require 'db_connect.php';

	if (isset($_SESSION['customer'])) {
		$sql = "select * from purchase where customer_id = :id";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(':id', $_SESSION['customer']['id'], PDO::PARAM_INT);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
			$sql2 = "
				select product.id as product_id, name, price, count from purchase_detail, product where purchase_id = :purchase_id and product_id = product.id ";
			$stm2 = $pdo->prepare($sql2);
			$stm2->bindValue(':purchase_id', $row['id'], PDO::PARAM_INT);
			$stm2->execute();
			$result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
			$size = '';
	?>


			<table>
				<tr>
					<th>商品名</th>
					<th>価格</th>
					<th>サイズ</th>
					<th>個数</th>
					<th>小計</th>
				</tr>

				<?php
				$total = 0;
				foreach ($result2 as $row2) {
					$subTotal = $row2['price'] * $row2['count'];
					$total += $subTotal;
				?>

					<tr>
						<td><a href="detail.php?id=<?= $row2['product_id'] ?>"><?= $row2['name'] ?></a></td>
						<td><?= $row2['price'] ?></td>
						<td><?= $row2['size'] ?></td>
						<td><?= $row2['count'] ?></td>
						<td><?= $subTotal ?></td>
					</tr>

				<?php
				}
				?>

				<td>合計</td>
				<td></td>
				<td></td>
				<td></td>
				<td><?= $total; ?></td>

			</table>
			<hr>

	<?php
		}
	} else {
		echo "購入履歴を表示するには、ログインしてください。";
	}
	?>
</body>

</html>