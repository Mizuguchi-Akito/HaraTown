<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>買い物かご画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    <?php
    unset($_SESSION['product'][$_REQUEST['id']]);
    ?>
    カートから商品を削除しました。
    <hr>
    <?php
    require 'cart.php';
    ?>
</body>

</html>