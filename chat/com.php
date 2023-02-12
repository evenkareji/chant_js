<?php
session_start();
$u=$_GET['sn'];
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
<p><?php print $u;?>番目のコメントをどうぞ</p>
<form action="gz_set_com.php" method="post">
    名前<br>
    <input type="text" name="myn" value="<?php print  $_SESSION['user_name'];?>"><br>
    コメント<br>
    <textarea name="myc" cols="70" rows="10"></textarea><br>
    <input type="hidden" name="myb" value="<?php print $u;?>">
    <input type="submit" value="送信">
</form>
<p><a href=chat.php>一覧表示に戻る</a></p>
</body>
</html>