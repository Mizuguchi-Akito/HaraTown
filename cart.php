<?php session_start(); ?>
<link rel="stylesheet" href="css/style3.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/search.css">
<?php require 'menu.php'; ?>
<?php
if (!empty($_SESSION['product'])) {
?>
	<table class="search_table">
		<th class="product_table">商品番号</th>
		<th class="product_table">商品名</th>
		<th class="product_table">価格</th>
		<th class="product_table">個数</th>
		<th class="product_table">小計</th>
		<?php
		$total = 0;
		foreach ($_SESSION['product'] as $id => $product) {
		?>
			<tr>
				<td class="product_db"><?= $id ?></td>
				<td class="product_db"><a href="datail.php?id=<?= $id ?>"><?= $product['name'] ?></a></td>
				<td class="product_db"><?= $product['price'] ?></td>
				<td class="product_db"><?= $product['count'] ?></td>
				<?php
				$subtotal = $product['price'] * $product['count'];
				$total += $subtotal;
				?>
				<td class="product_db"><?= $subtotal ?></td>
				<td class="product_db"><a href="cart_delete.php?id=<?= $id ?>">カートから削除</a></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td class="product_table">合計</td>
			<td></td>
			<td></td>
			<td></td>
			<td class="product_table"><?= $total ?></td>
			<td></td>
		</tr>
	</table>
<?php
} else {
?>
	<h3>カートに商品が追加されていないようです。</h3>
<?php
}
?>