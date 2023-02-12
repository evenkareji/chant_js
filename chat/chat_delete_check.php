<?php
$code=$_POST['code'];
$omessage=$_POST['message'];



$dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
$user='root';
$password=1234;
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql='DELETE FROM posts  WHERE id=?';
$stmt=$dbh->prepare($sql);

$data[]=$code;
$stmt->execute($data);
print '<br>';
print '削除しました';

?>
<br>
<a href="chat.php">一覧表示へ</a>