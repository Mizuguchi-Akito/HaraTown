<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>買い物かご画面</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style3.css">
	<link rel="stylesheet" href="css/search.css">
	
</head>

<body>

	<?php
	$id = $_REQUEST['id'];
	if (!isset($_SESSION['product'])) {
		$_SESSION['product'] = [];
	}
	$count = 0;
	if (isset($_SESSION['product'][$id])) {
		$count = $_SESSION['product'][$id]['count'];
    }
	$size = '';
	if (isset($_SESSION['product'][$id])) {
		$size = $_SESSION['product'][$id]['size'];
    }
	
	$_SESSION['product'][$id] = [
		'name' => $_REQUEST['name'],
		'price' => $_REQUEST['price'],
		'size' => $_REQUEST['size'],
        'count' => $count + $_REQUEST['count']
	];
	?>
	<h3>カートに商品を追加しました。</h3>
	<hr>
	<?php
	require 'cart.php';
	?>

</body>

</html>