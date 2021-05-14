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
		if(empty($_SESSION["customer"]) || empty($_SESSION["product"])){
			echo "ログインしていないか、カートに商品がありません";
		}else{
			$customerId = $_SESSION["customer"]["id"];
			$pdo;
			require_once("db_connect.php");

			$maxId = 1;
			foreach($pdo->query("SELECT max(id) FROM purchase;") as $row ){
				$maxId = $row["max(id)"] + 1;
			}

			$purSql = "INSERT INTO purchase(id , customer_id ) VALUES(:id , :customer_id );";

			$purStm = $pdo->prepare($purSql);
			$purStm->bindValue(":id" , $maxId, PDO::PARAM_INT);
			$purStm->bindValue(":customer_id" , $customerId, PDO::PARAM_INT);

			if($purStm->execute()){
				// echo "実行しました";
				$dataStm;
				$dataSql = "
				INSERT INTO purchase_detail(purchase_id , product_id ,count ) 
				VALUES(:purchase_id , :product_id ,:count);";

				foreach($_SESSION["product"] as $key => $value){
					$dataStm = $pdo->prepare($dataSql);
					// echo "aaaaa";
					$dataStm->bindValue(":purchase_id" , $maxId , PDO::PARAM_INT);
					$dataStm->bindValue(":product_id" , $key , PDO::PARAM_INT);
					$dataStm->bindValue(":count" , $value["count"], PDO::PARAM_INT);

					$dataStm->execute();
				}
				unset($_SESSION["product"]);
				echo "購入しました";
			}else{
				echo "購入に失敗しました";
			}
		}
	?>
</body>

</html>