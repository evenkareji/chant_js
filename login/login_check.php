
<?php

try
{
 require_once('../function.php');


$post=sanitize($_POST);

$user_name=$post['user'];
$user_pass1=$post['password1'];

$user_pass1=md5($user_pass1);

$dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
$user='root';
$password=1234;
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT user,user_pass FROM members WHERE user=? AND user_pass=?';
$stmt=$dbh->prepare($sql);
$data[]=$user_name;
$data[]=$user_pass1;
$stmt->execute($data);

$dbh=null;

$rec=$stmt->fetch(PDO::FETCH_ASSOC);


if($rec==false)
{
	print 'ユーザー名かパスワードが間違っています。<br />';
	print '<a href="login.html"> 戻る</a>';
}
else

{  print 'g';
        session_start();
    $_SESSION['login']=1;
    $_SESSION['user_name']=$user_name;
 print $_SESSION['user_name'];


	header('Location:../chat/chat.php');
	exit();
}

}
catch(Exception $e)

{
    print 'こん';
   echo $e->getMessage();
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>