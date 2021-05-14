<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php require 'menu.php'; ?>
	
	<?php
		if(isset($_POST["name"]) && 
		isset($_POST["address"]) && 
		isset($_POST["login"]) && 
		isset($_POST["password"])){
			$name = htmlspecialchars($_POST["name"]);
			$address = htmlspecialchars($_POST["address"]);
			$login = htmlspecialchars($_POST["login"]);
			$password = htmlspecialchars($_POST["password"]);
			echo $password;

			$pdo;
			require_once("db_connect.php");

			try{
				$sql = "INSERT INTO customer(name , address , login , password)
				 VALUE (:name , :address , :login , :password)";

				$stm = $pdo->prepare($sql);
				$stm->bindValue(":name" , $name , PDO::PARAM_STR);
				$stm->bindValue(":address" , $address , PDO::PARAM_STR);
				$stm->bindValue(":login" , $login , PDO::PARAM_STR);
				$stm->bindValue(":password" , $password , PDO::PARAM_STR);

				if($stm->execute()){
					echo "成功しました";
				}else{
					echo "失敗しました";
				}
			} catch(Exception $e){
				echo $e->getMessage();

				exit();
			}
		}
	?>
</body>

</html>