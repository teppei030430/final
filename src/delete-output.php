<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from water where id=?');
    if($sql->execute([$_GET['id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
	<table>
		<tr><th>商品番号</th><th>商品名</th><th>メーカー</th></tr>
<?php
    foreach ($pdo->query('select * from water') as $row) {
        echo '<tr>';
        echo '<td>',$row['id'], '</td>';
        echo '<td>',$row['name'], '</td>';
        echo '<td>',$row['maker'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
    <form action="delete-input.php" method="post">
        <button type="submit">削除画面へ戻る</button>
    </form>
    </body>
</html>

