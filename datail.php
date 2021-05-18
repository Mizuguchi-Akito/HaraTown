<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>商品詳細画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <?php require 'menu.php'; ?>
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
        <p><img src="image/<?= $row['id'] ?>.jpeg" class="clothes_detail"></p>
        <form action="cart_insert.php" method="post">
            <div class="product_detail">
                <!-- <p>商品番号：<?= $row['id'] ?></p> -->
                <p class="product_name"><?= $row['name'] ?></p>
                <span class="price">￥<?= $row['price'] ?></span><span class="tax">(税込み)</span>
                <div class="detail_line">
                    <p class="color">カラー：<?= $row['color'] ?></p>
                    <p class="size">在庫のサイズ：<?= $row['size'] ?></p>
                    <!-- <div class="quantity_ipselect"> -->
                    <div class="cp_ipselect">
                        <select class="cp_sl06" required>
                            <option value="" hidden disabled selected></option>
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                            ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <span class="cp_sl06_highlight"></span>
                        <span class="cp_sl06_selectbar"></span>
                        <label class="cp_sl06_selectlabel">Choose</label>
                    </div>

                    

                </div>
            </div>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="name" value="<?= $row['name'] ?>">
            <input type="hidden" name="price" value="<?= $row['price'] ?>">
            <p class="cart_in"><input type="submit" class="button" value="カートに追加"></p>
            </div>
            <p class="favorite"><a href="./favorite_insert.php?id=<?= $row['id'] ?>" class="btn btn-svg">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>お気に入りに追加する</span>
            </a></p>
        </form>
        <!-- <p><a href="favorite_insert.php?id=<?= $row['id'] ?>">お気に入りに追加</a></p> -->
    <?php
    }
    ?>
</body>

</html>