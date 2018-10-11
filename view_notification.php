<?php

mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id=$_SESSION["id"];

$sql = "UPDATE comments SET status=0 WHERE status=1 and uid=$id ";
$result = mysql_query($sql);

$sql = "select * from comments where uid=$id ORDER BY cmt_id DESC limit 5";
$result = mysql_query($sql);


$response = '';
while ($row = mysql_fetch_array($result)) {
    $response = $response .  "<li class='notification-item'>" .
           "<a href='' class='notification-subject'>" .''. $row["comment"] . "</a>" .
          
            "</li>";
            
            
           
           }
if (!empty($response)) {
    print $response;
}
?>