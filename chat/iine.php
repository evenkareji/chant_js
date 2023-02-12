<?php
session_start();
$b=$_GET['tran_b'];
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
    <p><?php print $b?>番目の投稿にいいね!と言いました</p>
    名前を入力してください<br>
    <form action="iine_set.php" method="post">
        名前<br>
        <input type="text" name="message"
        value="<?php print $_SESSION['user_name'];?>"><br>
        <input type="hidden" name="myid"
        value="<?php print $b;?>">
        <input type="submit" value="送信">
    </form>
</body>
</html>