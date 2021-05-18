<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>会員登録画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>
<h3>会員登録に必要な事項を記入してください。</h3>

<body>
    <?php
    if (!empty($_POST)) {
        /* 入力情報の不備を検知 */
        if ($_POST['name'] === "") {
            $error['name'] = "blank";
        }
        if ($_POST['address'] === "") {
            $error['address'] = "blank";
        }
        if ($_POST['login'] === "") {
            $error['login'] = "blank";
        }
        if ($_POST['password'] === "") {
            $error['password'] = "blank";
        }
        if ($_POST['credit_name'] === "") {
            $error['credit_name'] = "blank";
        }
        if ($_POST['credit'] === "") {
            $error['credit'] = "blank";
        }
        if ($_POST['credit_date'] === "") {
            $error['credit_date'] = "blank";
        }
        if ($_POST['credit_pass'] === "") {
            $error['credit_pass'] = "blank";
        }

        /* メールアドレスの重複を検知 */
        if (!isset($error)) {
            $member = $db->prepare('SELECT COUNT(*) as cnt FROM customer WHERE address=?');
            $member->execute(array(
                $_POST['email']
            ));
            $record = $member->fetch();
            if ($record['cnt'] > 0) {
                $error['email'] = 'duplicate';
            }
        }

        /* エラーがなければ次のページへ */
        if (!isset($error)) {
            $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
            header('Location: check.php');   // check.phpへ移動
            exit();
        }
    }
    ?>

    <?php require 'menu.php'; ?>

    <form action="customer_output.php" method="POST" class="main2">
        名前 <input type="text" name="name" class="sub"><br>
        住所<input type="text" name="address" class="sub"><br>
        ログインID<input type="text" name="login" class="sub"><br>
        パスワード<input type="password" name="password" class="sub"><br>
        クレジットカード名義<input type="text" name="credit_name" class="sub"><br>
        クレジットカード番号<input type="text" name="credit" class="sub"><br>
        クレジットカード日付<input type="text" name="credit_date" class="sub"><br>
        クレジットカードパスワード<input type="password" name="credit_pass" class="sub"><br>
        <input type="submit" value="登録へ">
    </form>
</body>

</html>