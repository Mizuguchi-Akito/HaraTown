<?php session_start(); ?>
<?php
if (!(isset($_SESSION['customer']))) {
?>
<a href="login_input.php">ログイン</a><br>
<a href="./Main_Top.php">TOPへ戻る</a><br>
<a href="./customer_input.php">会員登録</a><br>
<a href="./search.php">商品検索</a><br>
<a href="./cart.php">カート</a>
<?php
}
?>

<?php
if (isset($_SESSION['customer'])) {
?>
    <a href="./logout_input.php">ログアウト</a><br>
    <a href="./cart.php">カート</a><br>
    <a href="./Main_Top.php">TOPへ戻る</a><br>
    <a href="./favorite_show.php">お気に入り</a><br>
    <a href="./purchase_input.php">購入する</a>
<?php
}
?>
<hr>