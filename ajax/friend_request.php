<?php 
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$uid=$_GET["user_id"];
$fid=$_GET["frnd_id"];
$result=  mysql_query("select * from friend_request where user_id=$uid and frnd_id=$fid");
if(mysql_num_rows($result)==0)
{
  $res=mysql_query("insert into friend_request values('',$uid,$fid,'Request Send')");
  if($res)
  {
      echo "Request Sent";
  }
}
 

?>