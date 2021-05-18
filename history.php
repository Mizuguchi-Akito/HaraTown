<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入履歴画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>

	<?php require 'menu.php'; 

	if(!empty($_SESSION["customer"])){
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
		$stm->bindValue(":customer_id", 
		$_SESSION["customer"]["id"] ,
		PDO::PARAM_INT);

		if($stm->execute()){
			$array = [];
			
			foreach($stm as $row){
				$array[$row["purchase_id"]][]= [
					"name"=>$row["name"],
					"price"=>$row["price"],
					"count"=>$row["count"],
					"product_id"=>$row["product_id"],
					"subtotal"=>$row["price"]*$row["count"]
				];
			}
			// var_dump($array);

			foreach($array as $key=>$val){ $total = 0;
			?>
				<table>
					<caption>注文番号<?= $key?></caption>
				<tr>
				<th>名前</th>
				<th>値段</th>
				<th>個数</th>
				<th>小計</th>
				</tr>
				<?php
				foreach($val as$keys=>$vals){
				?>
					<tr>
					<td><a href="datail.php?id=<?= $vals["product_id"] ?>"><?= $vals['name'] ?></a></td>
					<td><?= $vals["price"]?></td>
					<td><?= $vals["count"]?></td>
					<td><?= $vals["subtotal"]?></td>
					</tr>
				<?php

				$total += $vals["subtotal"];
				}
				?>
				<tr><td>合計<?= $total?>円</td></tr>
				</table>
			<?php }

		}else{
			echo "購入履歴がありません";
		}
	}

	?>
	
</body>

</html>