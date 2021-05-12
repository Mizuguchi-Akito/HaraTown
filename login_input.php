<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>

<body>
    <form action="login_output.php" method="post">
        ログインID<input type="text" name="name"><br>
        パスワード<input type="password" name="password"><br>
        <input type="submit" value="ログイン">
    </form>
</body>

</html>