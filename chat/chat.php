<?php

require_once('../config.php');

$chat = new Chant($dbh);
$chat->processPost();

?>
 <!DOCTYPE html>
        <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="style.css">
            <title>掲示板</title>
        </head>
        <body>

            <?php

            print $_SESSION['user_name'].' ログイン中'.'<br><br><br>';

          try{

              $ps=$dbh->query('SELECT *FROM posts ORDER BY id DESC');
              while($r=$ps->fetch()){
                  if(strpos($r['image'],'.jpeg')!==false){

                      $tg=$r['image'];
                      $tb=$r['id'];
                      $ii=null;
                      $ps_ii=$dbh->query("SELECT DISTINCT*FROM good WHERE id=$tb");

                      $count_iine=0;
                      while($r_ii=$ps_ii->fetch()){
                          $ii=$ii." ". $r_ii['nam'];
                          $count_iine++;
                      }

                      $_SESSION['message']=$r['message'];

                    print "<div class='box'>{$r['id']}投稿者:【投稿者:名無しさん】{$r['modified']}
                        <p class='iine'><a href=iine.php?tran_b=$tb>いいね！</a><br>
                        ($count_iine):$ii" . "</p><br>" . nl2br($r['message']) . "<br><a href='./chat_img/$tg' TARGET='_blank''>
                    <img src='./chat_img/$tg'></a><br>
                    <p class='com'><a href='com.php?sn=$tb'>
                    コメントをする時はここをクリック</a></p>";
                $ps_com=$dbh->query("SELECT *FROM comment WHERE id=$tb");
                $coun=1;
                while($r_com=$ps_com->fetch()){
                    print "<p class='com'>投稿コメント{$coun}<br>
                【{$r_com['nam']}さんのメッセージ】さんのメッセージ{$r_com['modified']}<br>"
                    . nl2br($r_com['com']) . "</p>";
                    $coun++;
                      }

                      print "</p></div>";
                      // 新しく文字を打ち込めるにする必要性はないsqlのデータをいじるだけでいい



                  }
                  else{
                      // $r=$ps->fetch();が余分にあったからひとつ前の投稿にバグが生じた
             $tb=$r['id'];
                      $ii=null;
                      $ps_ii=$dbh->query("SELECT DISTINCT*FROM good WHERE id=$tb");

                      $count_iine=0;
                      while($r_ii=$ps_ii->fetch()){
                          $ii=$ii." ". $r_ii['nam'];
                          $count_iine++;
                      }
                        $_SESSION['message']=$r['message'];

                    print "<div class='boxx'>{$r['id']}投稿者:【投稿者:名無しさん】{$r['modified']}
                        <p class='iine'><a href=iine.php?tran_b=$tb>いいね！</a><br>
                        ($count_iine):$ii" . "</p><br>" . nl2br($r['message']) . "
                    <p class='com'><a href='com.php?sn=$tb'>
                    コメントをする時はここをクリック</a></p>";
                $ps_com=$dbh->query("SELECT *FROM comment WHERE id=$tb");
                $coun=1;
                while($r_com=$ps_com->fetch()){
                    print "<p class='com'>投稿コメント{$coun}<br>
                【{$r_com['nam']}さんのメッセージ】さんのメッセージ{$r_com['modified']}<br>"
                    . nl2br($r_com['com']) . "</p>";
                    $coun++;
                      }


                    //   修正
            print '<form action="?action=edit" method="post" class="delete-form">';
         print' <span class="edit">edit</span>';
         print'<br>';
         print "<textarea class='edtext hidden' name='nmessage'  cols='30' rows='10'></textarea>";
               print"<input type='hidden' name='id' value='$tb'>";
         print'<br>';
               print "<input type='submit'>";
       print'</form>';

print '<br>';
                    // 削除

   print' <span
          data-id="$tb"
           class="delete">
           x
           </span>';

print "</p></div>";


                  }

              }

              print "</div><div id='hidari'><br><br><br>
 <form action='?action=add' enctype='multipart/form-data' method='post'>
                    メッセージを入力してください<input type='text' name='message'><br>
                        <br>
                    画像を送信してください<input type=
                'file' name='image'><br>
                     <br>
                    <input type='submit' value='投稿'>
                    <br>
                    <br>
                    <br>
              <p> <a href='../login/logout.php'>ログアウト</a></p></div>";
              $dbh=null;
          }
          catch(Exception $e){
               print 'こん';
             echo $e->getMessage();
              print 'ただいま障害により大変ご迷惑をお掛けしております。';
              exit();
          }
                  ?>

                  <script src="../js/main.js"></script>
        </body>
        </html>
