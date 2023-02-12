<?php
session_start();
require_once('../function.php');

$post=sanitize($_POST);

$u=$post['myn'];
$p=$post['myc'];
$b=$post['myb'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php print $u;?>さんは次のようにコメントを書き込みました</p>
<p>【コメント】<br><?php print $p;?></p>
<a href='chat.php'>一覧表示に戻ります</a>
<?php
 $dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
        $user='root';
        $password=1234;
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $ima=date('YmdHis');
        $ps=$dbh->prepare("INSERT INTO comment(id,com,nam,modified) VALUES(:v_b,:v_c,:v_n,:v_d)");
        $ps->bindParam(':v_b',$b);
        $ps->bindParam(':v_c',$p);
        $ps->bindParam(':v_n',$u);
        $ps->bindParam(':v_d',$ima);
        $ps->execute();


?>
</body>
</html>
