<?php
$code=$_POST['code'];
$nmessage=$_POST['message'];

// var_dump($code);
// var_dump($nmessage);

$dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
$user='root';
$password=1234;
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql='UPDATE posts SET message=? WHERE id=?';
$stmt=$dbh->prepare($sql);
$data[]=$nmessage;
$data[]=$code;
$stmt->execute($data);
print '<br>';
print '修正しました';

?>
<br>
<a href="chat.php">一覧表示へ</a>