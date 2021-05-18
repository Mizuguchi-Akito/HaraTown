<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="login">
    <h2 class="active">Login</h2>
    <form action="login_output.php" method="post" class="login_class">
        <input type="text" class="login_text" name="login">
     <span class="login_span">LoginID</span><br>
        <input type="password" class="login_text" name="password">
    <span class="login_span">password</span>
    <br>

    
        
        
    <button class="signin">
      Login
    </button>
    </form>
    </div>

</html>