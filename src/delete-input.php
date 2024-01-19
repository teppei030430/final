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
        <table>
    <tr><th>商品番号</th><th>商品名</th><th>メーカー</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach($pdo->query('select * from water') as $row){
        echo '<tr>';
        echo '<td>',$row['id'],'</td>';
        echo '<td>',$row['name'],'</td>';
        echo '<td>',$row['maker'],'</td>';
        echo '<td>';
        echo '<a = href="delete-output.php?id=',$row['id'],'">削除</a>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>
