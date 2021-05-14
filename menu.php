<?php
if (!(isset($_SESSION['customer']))) {
?>
<p class="menu"><a href="login_input.php">ログイン</a><br></p>
<p class="menu"><a href="./Main_Top.php">TOPへ戻る</a></p>
<?php
}
?>

<?php
if (isset($_SESSION['customer'])) {
?>
    <p class="menu"><a href="./logout_input.php">ログアウト</a><br></p>
    <p class="menu"><a href="./cart.php">カート</a><br></p>
    <p class="menu"><a href="./Main_Top.php">TOPへ戻る</a><br></p>
    <p class="menu"><a href="./favorite.php">お気に入り</a></p>
<?php
}
?>