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
        //↓１行目のrequireのdb-connect.phpと12行目がセット↓
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('insert into water(id,name,maker) values(?,?,?)');
        if(!preg_match('/^\d+$/',$_POST['id'])){
            echo '番号を整数で入力してください。';
        }else if(empty($_POST['name'])){
            echo '商品名を入力してください。';
        }else if(empty($_POST['maker'])){
            echo 'メーカー名を入力してください。';
        }else if($sql->execute([$_POST['id'],$_POST['name'],$_POST['maker']])){
            echo '追加に成功しました。';
        }else{
            echo '追加に失敗しました。';
        }
    ?>
        <br><hr><br>
        <table>
            <tr><th>商品番号</th><th>商品名</th><th>メーカー</th></tr>
    <?php
        foreach($pdo->query('select * from water') as $row){
            echo '<tr>';
            echo '<td>',$row['id'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['maker'],'</td>';
            echo '</tr>';
            echo "\n";
        }
    ?>
    </table>
        <form action="menu.php" method="post">
            <button type="submit">メニュー画面へ戻る</button>
    </form>
</body>
</html>