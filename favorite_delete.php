<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>お気に入り画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require 'menu.php'; ?>
    <?php
    if (isset($_SESSION['customer'])) {
        require 'db_connect.php';
        $sql = "delete from favorite where customer_id = :customer_id and product_id = :product_id";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
        $stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    ?>
        お気に入りから商品を削除しました。
        <hr>
    <?php require 'favorite.php';
    } else {
    ?>
        お気に入りから商品を削除するには、ログインしてください。
    <?php
    }
    ?>
</body>

</html>