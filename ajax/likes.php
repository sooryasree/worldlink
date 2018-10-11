<?php

mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
$pid = $_GET["pstid"];
$uid = $_GET["urid"];
$da = date('d-m-Y');
$res = mysql_query("insert into post_like values('',$pid,$uid,'Liked','$da')");
if ($res) {
    $result = mysql_query("select count(lik_id) from post_like where postid=$pid");
    $row = mysql_fetch_array($result);
    echo $row[0];
}
?>