<?php
// MYSQLの接続情報
$dsn='mysql:dbname=seed_sns20170918;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');


?>
