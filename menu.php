<?php session_start(); ?>
<?php
if (!(isset($_SESSION['customer']))) {
?>
<input type="checkbox" id="cp_navimenuid">

<label class="menu" for="cp_navimenuid">
<div class="menubar">
	<span class="bar"></span>
	<span class="bar"></span>
	<span class="bar"></span>
</div>

<ul class="1">
	<li class="1"><a id="login_input.php" href="login_input.php">ログイン</a></li>
	<li class="1"><a id="Main_Top.php" href="Main_Top.php">TOP</a></li>
	<li class="1"><a id="customer_input.php" href="customer_input.php">会員登録</a></li>
    <li class="1"><a id="search.php" href="search.php">商品検索</a></li>
    <li class="1"><a id="cart.php" href="cart.php">カート</a></li>
</ul>
</label>
<!-- <a href="login_input.php">ログイン</a><br>
<a href="./Main_Top.php">TOPへ戻る</a><br>
<a href="./customer_input.php">会員登録</a><br>
<a href="./search.php">商品検索</a><br>
<a href="./cart.php">カート</a> -->
<?php
}
?>

<?php
if (isset($_SESSION['customer'])) {
?>
<input type="checkbox" id="cp_navimenuid">

<label class="menu" for="cp_navimenuid">
<div class="menubar">
	<span class="bar"></span>
	<span class="bar"></span>
	<span class="bar"></span>
</div>

<ul class="1">
	<li class="1"><a id="logout_input.php" href="logout_input.php">ログアウト</a></li>
    <li class="1"><a id="Main_Top.php" href="Main_Top.php">TOP</a></li>
    <li class="1"><a href="1" href="1">履歴</a></li>
    <li class="1"><a id="favorite.php" href="favorite.php">お気に入り</a></li>
    <li class="1"><a id="search.php" href="search.php">商品検索</a></li>
    <li class="1"><a id="cart.php" href="cart.php">カート</a></li>
    <li class="1"><a id="purchase_input.php"href="purchase_input.php">カートの物を購入する</a></li>
</ul>
</label>
    <!-- <a href="./logout_input.php">ログアウト</a><br>
    <a href="./cart.php">カート</a><br>
    <a href="./Main_Top.php">TOPへ戻る</a><br>
    <a href="./favorite_show.php">お気に入り</a><br>
    <a href="./purchase_input.php">購入する</a> -->
<?php
}
?>