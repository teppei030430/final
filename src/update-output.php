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
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('update water set name=?,maker=? where id=?');

    if(empty($_POST['name'])){
        echo '商品名を入力してください。';
    } else if(empty($_POST['maker'])){
        echo 'メーカー名を入力してください';
    }else if($sql->execute([htmlspecialchars($_POST['name']),($_POST['maker']),($_POST['id'])])){
        echo '更新に成功しました。';
    } else {
        echo '更新に失敗しました。';
    }
?>
        <hr>
        <table>
        <tr><th>商品番号</th><th>商品名</th><th>メーカー名</th></tr>

<?php
foreach ($pdo->query('select * from water') as $row){
    echo '<tr>';
    echo '<td>',$row['id'],'</td>';
    echo '<td>',$row['name'],'</td>';
    echo '<td>',$row['maker'],'</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
        <button onclick="location.href='update-input.php'">更新画面に戻る</button>
        
</body>
</html>