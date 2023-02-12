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


print '【'.$message.'】'.'の内容を修正します';




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
    <h1>修正する内容を入力してください</h1>
    <form action="chat_edit_check.php" method="post">
<input type="hidden" name="code" value="<?php print $_id;?>">
<textarea id="" cols="70" rows="10"  name="message" ><?php print $message;?></textarea><br>
<br><input type="submit" value="修正">
    </form>
</body>
</html>
