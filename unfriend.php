
<?php

session_start();
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
$id = $_GET["usid"];
$id1 = $_SESSION["id"];
$rid = $_GET["reqid"];

$frid=$_GET["frid"];
if (mysql_query("delete from friend_request where frnd_id=$frid and user_id=$id1 or user_id=$frid and frnd_id=$id1")) {
    echo "<script>window.location.href='find_friends.php';alert('Success')</script>";
}
?>
   