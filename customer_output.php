<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style3.css">
</head>

<body>

	<?php require 'menu.php'; ?>
	
	<?php
		echo $_POST['password'];
		if(!empty($_POST["name"]) && 
		!empty($_POST["address"]) && 
		!empty($_POST["login"]) && 
        !empty($_POST["password"]) && 
        !empty($_POST["credit"]) && 
        !empty($_POST["credit_date"]) && 
        !empty($_POST["credit_pass"]) && 
		!empty($_POST["credit_name"])){
			
			
			$name = htmlspecialchars($_POST["name"]);
			$address = htmlspecialchars($_POST["address"]);
			$login = htmlspecialchars($_POST["login"]);
            $password_second = htmlspecialchars($_POST["password"]);
            $credit = htmlspecialchars($_POST["credit"]);
            $credit_date = htmlspecialchars($_POST["credit_date"]);
            $credit_pass = htmlspecialchars($_POST["credit_pass"]);
            $credit_name = htmlspecialchars($_POST["credit_name"]);

			$pdo;
			require_once("db_connect.php");

			try{
				$sql = "INSERT INTO customer(id, name , address , login , password , credit , credit_date , credit_pass , credit_name)
				VALUE (NULL, :name , :address , :login , :password , :credit , :credit_date , :credit_pass , :credit_name)";

				$stm = $pdo->prepare($sql);
				$stm->bindValue(":name" , $name , PDO::PARAM_STR);
				$stm->bindValue(":address" , $address , PDO::PARAM_STR);
				$stm->bindValue(":login" , $login , PDO::PARAM_STR);
                $stm->bindValue(":password" , $password_second , PDO::PARAM_STR);
                $stm->bindValue(":credit", $credit , PDO::PARAM_STR);
                $stm->bindValue(":credit_date", $credit_date , PDO::PARAM_STR);
                $stm->bindValue(":credit_pass", $credit_pass , PDO::PARAM_STR);
                $stm->bindValue(":credit_name", $credit_name , PDO::PARAM_STR);

				if($stm->execute()){
					echo "成功しました";
				}else{
					echo "失敗しました";
				}
			} catch(Exception $e){
				echo $e->getMessage();

				exit();
			}
		}else{
			echo "情報が足りません";
		}
	?>
</body>

</html>