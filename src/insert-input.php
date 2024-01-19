<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>商品を追加</p>
<form action="insert-output.php" method="post">
    商品番号<input type="text" name="id"><br>
    商品名<input type="text" name="name"><br>
    メーカー<input type="text" name="maker"><br>
    <button type="submit">追加</button>
</form>
</body>
</html>