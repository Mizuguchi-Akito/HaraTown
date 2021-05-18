<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/login.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<?php require 'menu.php'; ?>
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

	
	<div class="member">
	<form action="customer_output.php" method="POST" class="main2">
	<h3 class="customer_active">会員登録に必要な事項を記入してください。</h3><br>
	<input type="text" class="login_text" name="name">
	<span class="login_span">名前</span>
	<br>
	<input type="text" name="address" class="login_text">
	<span class="login_span">住所</span><br>
	<input type="text" name="login" class="login_text">
	<span class="login_span">ログインID</span><br>
	<input type="password" name="password" class="login_text">
	<span class="login_span">パスワード</span><br>
	<input type="text" name="credit_name" class="login_text">
	<span class="login_span">クレジットカード名義</span><br>
	<input type="text" name="credit" class="login_text">
	<span class="login_span">クレジットカード番号</span><br>
	<input type="text" name="credit_date" class="login_text">
	<span class="login_span">クレジットカード日付</span><br>
	<input type="password" name="credit_pass" class="login_text">
	<span class="login_span">クレジットカードパスワード</span><br>
	<input type="submit" value="登録へ" class="signin" >
	</form>
	</div>
</body>

</html>