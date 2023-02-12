<?php
    session_start();

        $dsn='mysql:dbname=my_chat;host=localhost;charset=utf8';
        $user='root';
        $password=1234;
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


require_once(__DIR__ . '/function.php');
require_once(__DIR__ . '/Chant.php');