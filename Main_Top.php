<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>HaraTown</title>
</head>

<body>
    <main class="main">
        <article>
            <section>
                <table>
                    <?php require 'menu.php'; ?>
                    <?php require 'db_connect.php'; ?>
                    <th colspan="2"></th>

                    <h1 class="red">HaraTown</h1>

                    <h1 class="item">ITEM</h1>

                    <div class="box">
                        <?php
                        //プリペアードステートメントを作る
                        $sql = 'SELECT * FROM product';
                        $stm = $pdo->prepare($sql);
                        $stm->execute();
                        // $result = fechAll($link, $sql);
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            echo "<div class='box'><br>{$row['name']}", "<br>";
                        ?><div class="image1">
                            </div>
                            <p class="p"><img src="image/<?= $row['id'] ?>.jpeg" class="clothes"></p>
                            <p class="item_"><?= $row['name'] ?></p>
                            <p><?= $row['brand'] ?></p>
                            <p><?= $row['price'] ?></p>
                            <a href="./detail.php?id=<?= $row['id'] ?>">詳細</a>
                    </div>
                <?php
                        }
                ?>
                </table>
            </section>
        </article>
    </main><br>
    <!-- <footer id='footer'>
        <hr>
       <p>Copyright c 2021 HaraTown All Rights Reserved.</p> 
    </footer> -->
</body>

</html>