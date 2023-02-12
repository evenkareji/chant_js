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
        require_once('../function.php');

        // if(!isset($_POST['password1']) && !isset($_POST['password'])){

            $post=sanitize($_POST);
            $user_name=$post['user'];
            $user_pass1=$post['password1'];
            $user_pass2=$post['password2'];
        // }




if($user_name=='')
{
	print 'スタッフ名が入力されていません。<br />';
}
else
{
	print 'スタッフ名：';
	print $user_name;
	print '<br />';
}

if($user_pass1=='')
{
	print 'パスワードが入力されていません。<br />';
}

if($user_pass1!=$user_pass2)
{
	print 'パスワードが一致しません。<br />';
}

if($user_name=='' || $user_pass1=='' || $user_pass1!=$user_pass2)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	$user_pass1=md5($user_pass1);
    // 暗号化されてさらにdoneの送られる
	print '<form method="post" action="member_add_done.php">';
	print '<input type="hidden" name="user" value="'.$user_name.'">';
    // hiddenは入力されたformが見えないようにされる
	print '<input type="hidden" name="password1" value="'.$user_pass1.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="OK">';
	print '</form>';







    }
}
    catch(Exception$e)
    {
        $e.getMessge();
        print 'ただいま障害によりご迷惑をおかけしています';
        exit();
    }
    ?>
</body>
</html>