<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <title>購入履歴画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>

    <?php require 'menu.php';

    if (!empty($_SESSION["customer"])) {
        $pdo;
        require_once("db_connect.php");
        $sql = "SELECT purchase_id , name , price ,count ,product_id
		FROM purchase AS P
		INNER JOIN purchase_detail AS D
		ON P.id = D.purchase_id
		AND customer_id = :customer_id
		JOIN product AS PR
		ON PR.id = D.product_id;
		";

        $stm = $pdo->prepare($sql);
        $stm->bindValue(
            ":customer_id",
            $_SESSION["customer"]["id"],
            PDO::PARAM_INT
        );

        if ($stm->execute()) {
            $array = [];

            foreach ($stm as $row) {
                $array[$row["purchase_id"]][] = [
                    "name" => $row["name"],
                    "price" => $row["price"],
                    "count" => $row["count"],
                    "product_id" => $row["product_id"],
                    "subtotal" => $row["price"] * $row["count"]
                ];
            }
            // var_dump($array);

            foreach ($array as $key => $val) {
                $total = 0;
    ?>
                <table>
                    <caption>注文番号<?= $key ?></caption>
                    <tr>
                        <th>名前</th>
                        <th>値段</th>
                        <th>個数</th>
                        <th>小計</th>
                    </tr>
                    <?php
                    foreach ($val as $keys => $vals) {
                    ?>
                        <tr>
                            <td><a href="datail.php?id=<?= $vals["product_id"] ?>"><?= $vals['name'] ?></a></td>
                            <td><?= $vals["price"] ?></td>
                            <td><?= $vals["count"] ?></td>
                            <td><?= $vals["subtotal"] ?></td>
                        </tr>
                    <?php

                        $total += $vals["subtotal"];
                    }
                    ?>
                    <tr>
                        <td>合計<?= $total ?>円</td>
                    </tr>
                </table>
    <?php }
        } else {
            echo "購入履歴がありません";
        }
    }

    ?>

=======
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
>>>>>>> 703b54a919b5ae1b659744c42ef257f1a6187e7b
</body>

</html>