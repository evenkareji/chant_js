<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <?php

try{

            $message=$_POST['message'];
            $image=$_FILES['image'];

      $dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
        $user='root';
        $password=1234;
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $ima=date('YmdHis');
        $fn=$ima . $image['name'];
        move_uploaded_file($image['tmp_name'], './chat_img/'.$fn);
        // データベースに追加
        $sql='INSERT INTO posts(message,image) VALUES(?,?)';
        $stmt=$dbh->prepare($sql);
        $data[]=$message;
        $data[]=$fn;
        $stmt->execute($data);



        $dbh=null;





    print'<a href="chat.php">一覧表示へ</a>';



    }

    catch(Exception$e)
    {
print 'h';
        print 'ただいま障害によりご迷惑をおかけしています';
echo $e->getMessage();
 print '<a href="../chat/chat_submit.php">ログイン画面へ</a>';  exit();

    }
    ?>



</body>
</html>