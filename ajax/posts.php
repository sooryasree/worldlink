<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
$cmt = $_GET["commnt"];
//$imgfile=$_GET["img"];
mysql_query("insert into posts(user_id,comment,img_file,status) values('$id','$cmt','a.jpg','1')");
?>