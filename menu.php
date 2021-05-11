<?php
if (!(isset($_SESSION['customer']))) {
?>
<a href="login_input.php">ログイン</a><br>
<a href="./Main_Top.php">TOPへ戻る</a>
<?php
}
?>

<?php
if (isset($_SESSION['customer'])) {
?>
    <a href="logout_input.php">ログアウト</a><br>
    <a href="./cart.php">カート</a><br>
    <a href="./bookList.php">TOPへ戻る</a><br>
    <a href="./return_show.php">未返却一覧</a><br>
    <a href="./favorite.php">お気に入り</a>
<?php
}
?>
<hr>