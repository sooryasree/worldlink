
<?php

session_start();
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
$id = $_GET["usid"];
$id1 = $_SESSION["id"];
$txmsg = $_GET["txtmg"];
if (mysql_query("insert into messages values(id,'$id1','$id','$txmsg','now()','1')")) {
    
}
?>
   