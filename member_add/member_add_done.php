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

            $user_name=$_POST['user'];
            $user_pass1=$_POST['password1'];


        $dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
        $user='root';
        $password=1234;
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        // データベースに追加
        $sql='INSERT INTO members(user,user_pass) VALUES(?,?)';
        $stmt=$dbh->prepare($sql);
        $data[]=$user_name;
        $data[]=$user_pass1;
        $stmt->execute($data);

        $dbh=null;

        print $user_name;
        print 'さんを追加しました。<br>';




    }

    catch(Exception$e)
    {
print 'h';
        print 'ただいま障害によりご迷惑をおかけしています';
echo $e->getMessage();        exit();

    }
    ?>

    <a href="../login/login.html">ログイン画面へ</a>

</body>
</html>