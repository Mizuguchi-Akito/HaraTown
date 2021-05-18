<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>商品詳細画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>
<!-- サイズ機能 -->

<body>
    <?php require 'menu.php'; ?>
    <h1 class="red">HaraTown</h1>
    <h1 class="item">ITEM</h1>

    <?php
    //MySQLデータベースに接続する
    require 'db_connect.php';
    //SQL文を作る（プレースホルダを使った式）
    $sql = "select * from product where id = :id";
    //プリペアードステートメントを作る
    $stm = $pdo->prepare($sql);
    //プリペアードステートメントに値をバインドする
    $stm->bindValue(':id', $_REQUEST['id'], PDO::PARAM_STR);
    //SQL文を実行する
    $stm->execute();
    //結果の取得（連想配列で受け取る）
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
    ?>
        <p>
        <h1 class="big">「<?= $row['name'] ?>」</h1>
        </p>
        <p><img src="image/<?= $row['id'] ?>.jpeg"></p>
        <form action="cart_insert.php" method="post">
            <p>商品名：<?= $row['name'] ?></p>
            <p>価格：<?= $row['price'] ?></p>
            <p>カラー：<?= $row['color'] ?></p>
            <p>サイズ：フリーサイズ
            <p>個数：<select name="count">
                    <?php
                    for ($j = 1; $j <= 10; $j++) {
                    ?>
                        <option value="<?= $j ?>"><?= $j ?></option>
                    <?php
                    }
                    ?>
                </select></p>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="name" value="<?= $row['name'] ?>">
            <input type="hidden" name="price" value="<?= $row['price'] ?>">
            <p><input type="submit" value="カートに追加"></p>
        </form>
        <p><a href="favorite_insert.php?id=<?= $row['id'] ?>">お気に入りに追加</a></p>
    <?php
    }
    ?>
</body>

</html>