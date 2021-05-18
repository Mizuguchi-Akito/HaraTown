<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>商品検索</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/search.css">
	<link rel="stylesheet" href="css/style3.css">
</head>

<body>

	<?php require 'menu.php'; ?>
	<div class="seachbar">
		<form id="searchform" role="search" action="search.php" method="post">
			<input class="s" name="keyword" type="text" placeholder="Search" />
			<input class="searchsubmit" type="submit" value="検索" />
		</form>
	</div>


	<table class="search_table">
		<th class="product_table">商品名</th>
		<th class="product_table">価格</th>
		<th class="product_table">ブランド</th>
		<?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//検索の判断
		if (isset($_POST['keyword'])) {
			//SQL文を作る（プレースホルダを使った式）
			$sql = "select * from product where name like :keyword";
			//プリペアードステートメントを作る
			$stm = $pdo->prepare($sql);
			//プリペアードステートメントに値をバインドする
			$stm->bindValue(':keyword', '%' . $_POST['keyword'] . '%', PDO::PARAM_STR);
			//SQL文を実行する
			$stm->execute();
			//結果の取得（連想配列で受け取る）
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		} else {
			//SQL文を作る
			$sql = "select * from product";
			//プリペアードステートメントを作る
			$stm = $pdo->prepare($sql);
			//SQL文を実行する
			$stm->execute();
			//結果の取得（連想配列で受け取る）
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		}
		foreach ($result as $row) {
			$id = $row['id'];
		?>
			<tr>
				<td class="product_db"><a href="datail.php?id=<?= $id ?>"><?= $row['name'] ?></a>
				</td>
				<td class="product_db"><?= $row['price'] ?></td>
				<td class="product_db"><?= $row['brand'] ?></td>
			</tr>
		<?php
		}
		?>
	</table>
</body>

</html>