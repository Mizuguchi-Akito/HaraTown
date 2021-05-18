<?php session_start(); ?>

<?php
    unset($_SESSION['customer']);

    try {
        $pdo = new PDO(
            'mysql:dbname=HaraTown;host=localhost;charset=utf8mb4',
            'phpuser2',
            '1234');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        echo '<span class="error">エラーがありました。</span><br>';
        echo $e->getMessage();
        exit();
    }

    $sql = "select * from customer where login = :login and password = :password";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':login', $_POST['login'],PDO::PARAM_STR);
    $stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $_SESSION['customer'] = [
            'id' => $row['id'], 
            'login' =>$row['login'],
            'password' => $row['password'],
            'name' => $row['name'],
            'address' => $row['address'],
            'credit' => $row['credit'],
            'credit_name' => $row['credit_name'],
        ];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <?php
        if (isset($_SESSION['customer'])) {
            echo '<h3>ログインしました。</h3>';
            echo '<p>おかえりなさいませ。</p>';
            ?>
                <a href="./Main_Top.php">TOPへ戻る</a>
            <?php
        } else {
            echo 'ログイン名またはパスワードが違います。','<br>';
            ?>
                <a href="./Main_Top.php">TOPへ戻る</a><br>
                <a href="./customer_input.php">会員登録へ</a><br>
                <a href="./"></a>
            <?php
        }
    ?>

</body>
</html>