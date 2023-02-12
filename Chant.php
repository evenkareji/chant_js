<?php


class Chant
{
    // 変数を外部から変更できない
    // constructで定義されたら役目は終わり
    private $dbh;
// その変数を下記に用いる
// 安心した状態で変数を使える
    public function __construct($dbh)
    {
        $this->dbh=$dbh;
    }

public function processPost()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = filter_input(INPUT_GET, 'action');

    switch ($action) {

        case 'add':
        $this->add();
        break;
        case 'edit':
          $this->edit();
        break;
        case 'delete':
          $this->delete();
        break;
        default:
        exit;
    }

    header('Location: ' . 'chat.php');
    exit;
    }

}

  public  function add()
    {       $message=$_POST['message'];
            $image=$_FILES['image'];

           $ima=date('YmdHis');
            $fn=$ima . $image['name'];
            move_uploaded_file($image['tmp_name'], './chat_img/'.$fn);

               $sql='INSERT INTO posts(message,image) VALUES(?,?)';
            $stmt=$this->dbh->prepare($sql);
            $data[]=$message;
            $data[]=$fn;
            $stmt->execute($data);
    }


  public  function delete()
    {
      $id = filter_input(INPUT_POST, 'id');
      if (empty($id)) {
        return;
      }
      var_dump($id);
      $stmt = $this->dbh->prepare("DELETE FROM posts WHERE id = :id");
      $stmt->bindValue('id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }

  public  function edit()
    {
        $nmessage = filter_input(INPUT_POST, 'nmessage');
        $code = filter_input(INPUT_POST, 'id');

        $sql='UPDATE posts SET message=? WHERE id=?';
        $stmt=$this->dbh->prepare($sql);
        $data[]=$nmessage;
        $data[]=$code;
        $stmt->execute($data);
    }

}