<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php require 'header.php'; ?>
   <?php require 'menu.php'; ?>
   <?php require 'db-connect.php'; ?>
<hr>
<?php
echo '<table>';
echo '<tr><th>商品番号</th><th>商品名</th><th>メーカー名</th></tr>';
$pdo=new PDO($connect, USER, PASS); 
if(isset($_POST['keyword'])) {
    $sql=$pdo->prepare('select * from water where name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
} else {
    $sql=$pdo->query('select * from water');
}

foreach ($sql as $row) {
    $id=$row['id'];
    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td>';
    echo '<a href="detail.php?id=', $id,'">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', $row['maker'], '</td>';
    echo '</tr>';
}
echo '</table>';

?>
<?php require 'footer.php'; ?>
</body>
</html>