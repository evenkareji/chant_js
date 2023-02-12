<?php
session_start();
require_once('../function.php');

$post=sanitize($_POST);

$u=$post['message'];
$b=$post['myid'];

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
    <?php
     $dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
        $user='root';
        $password=1234;
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $ps=$dbh->prepare("INSERT INTO good  (id,nam) VALUES(:v_b,:v_n)");
        $ps->bindParam(':v_b',$b);
        $ps->bindParam(':v_n',$u);
        $ps->execute();
        print "<p>".$u."さんが「いいね!」と言いました<br>
        <a href=chat.php>一覧表示に戻る</a></p>";


    ?>
</body>
</html>
