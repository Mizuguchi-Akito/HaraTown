<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>HaraTown</title>
</head>
<body>
<main>
        <article>
            <section>
                <table>
                    <?php require 'menu.php'; ?>
                    <?php require 'db_connect.php'; ?>
                    <th colspan="2"></th>

                    <h1 class="red">HaraTown</h1>

                    <?php
                        //プリペアードステートメントを作る
                        $sql = 'SELECT * FROM product';
                        $stm = $pdo->prepare($sql);
                        $stm->execute();
                        // $result = fechAll($link, $sql);
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            echo "<br>{$row['name']}" , "<br>";
                            ?>
                                <p class="p"><img src="image/<?= $row['id'] ?>.jpeg"  class="clothes"></p>
                                <a href="./datail.php?id=<?= $row['id']?>">詳細</a><br>
                                <?php
                                }
                            ?>
                </table>
            </section>
        </article>
    </main><br>
    <footer id='footer'>
        <hr>
       <p>Copyright c 2021 HaraTown All Rights Reserved.</p> 
    </footer>
</body>
</html>