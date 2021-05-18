<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <title>お気に入り画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php
	if (isset($_SESSION['customer'])) {
		//MySQLデータベースに接続する
		require 'db_connect.php';

        //SQL文を作る（プレースホルダを使った式）
        $sql = "select count(customer_id) from favorite where customer_id = :customer_id and product_id = :product_id group by product_id ";
        $stm = $pdo->prepare($sql);
        // echo 'ok';
		//プリペアードステートメントに値をバインドする
		$stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
		$stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_STR);
        //SQL文を実行する
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);

        foreach($result as $item){
           if($item >= 1){
               $ok = false;
            }else{
                $ok = true;
            }
        }
        if($ok !== false){
		$sql = "insert into favorite values(:customer_id,:product_id)";
		//プリペアードステートメントを作る
		$stm = $pdo->prepare($sql);
		//プリペアードステートメントに値をバインドする
		$stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
		$stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_STR);
		//SQL文を実行する
        $stm->execute();

        echo "お気に入りの商品を追加しました。";
    }else{
        echo "すでに登録されています";
    }
	?>
		<hr>
	<?php require 'favorite.php';
	} else {
	?>
        <h3>お気に入りに商品を追加するには、ログインしてください。</h3>
        <p><a href="./login_input.php">ログインへ</a></p>
	<?php
	}
	?>
</body>

</html>