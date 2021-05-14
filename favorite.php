<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>お気に入り画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require 'menu.php'; ?>
    <?php
    if (isset($_SESSION['customer'])) {
    ?>
        <table>
            <th>商品番号</th>
            <th>商品名</th>
            <th>価格</th>
            <th>ブランド名</th>
            <?php
            require 'db_connect.php';
            $sql = "select * from favorite, product where customer_id = :customer_id and product_id = id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $id = $row['id'];
            ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><a href="detail.php?id=<?= $id ?>"><?= $row['name'] ?></a></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['brand'] ?></td>
                    <td><a href="favorite_delete.php?id=<?= $id ?>">削除</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
    ?>
        お気に入りを表示するには、ログインしてください。
    <?php
    }
    ?>
</body>

</html>