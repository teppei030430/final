<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="th0">商品番号</div>
    <div class="th1">商品名</div>
    <div class="th1">メーカー</div>
<?php
    $pdo=new PDO($connect,USER,PASS);

    foreach($pdo->query('select * from water') as $row){
        echo '<form action="update-output.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<div class="td0">',$row['id'],'</div>';
        echo '<div class="td1">';
        echo '<input type="text" name="name" value="',$row['name'],'">';
        echo '</div>';
        echo '<div class="td1">';
        echo '<input type="text" name="maker" value="',$row['maker'],'">';
        echo '</div>';
        echo '<div class="td2"><input type="submit" value="更新"></div>';
        echo '</form>';
        echo "\n";
    }
?>
</body>
</html>