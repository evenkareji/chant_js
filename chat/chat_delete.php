<?php
$_id=$_GET['code'];
print $_id.'番目の';

try{




$dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
$user='root';
$password=1234;
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT message FROM posts WHERE id=?';
$stmt=$dbh->prepare($sql);
$data[]=$_id;
$stmt->execute($data);
$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$message=$rec['message'];


print '【'.$message.'】'.'の内容を削除する';




}
catch(Exception $e)
{
echo $e->Message();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>本当に削除しますか</h1>
    <form action="chat_delete_check.php" method="post">
<input type="hidden" name="code" value="<?php print $_id;?>">
<input type="hidden" name="message" value="<?php print $message;?>">
<br><input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="削除する">
    </form>
</body>
</html>