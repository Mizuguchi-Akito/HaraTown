<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/favorite.css">
<body>
    <?php require 'menu.php'; ?>
    <?php
    if (isset($_SESSION['customer'])) {
    ?>
        <table>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>ブランド名</th>
            <th>カラー</th>
            <th>サイズ</th>
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
                    <td><p class="p"><img src="image/<?= $row['id'] ?>.jpeg" class="clothes_sub"></p></td>
                    <td><a href="datail.php?id=<?= $id ?>"><?= $row['name'] ?></a></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['brand'] ?></td>
                    <td><?= $row['color'] ?></td>
                    <td><?= $row['size'] ?></td>
                    <td><a href="favorite_delete.php?id=<?= $id ?>"><button>この商品を削除</button></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
    ?>
        <h3>ログインしていないようです。</h3>
        <p>お気に入りを表示するには、ログインしてください。</p> 
    <?php
    }
    ?>
</body>

</html>