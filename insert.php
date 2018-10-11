<?php
 session_start();
 ob_start();
 mysql_connect("localhost", "root", "");
  mysql_select_db('social_net_working_site');
  $userid = $_SESSION["id"];
  $nam = mysql_query("SELECT * FROM register where id='$userid'");
  $row = mysql_fetch_assoc($nam);

 $username=$row['email'];
 $ms=$_POST['msgs'];
 $rs=$_POST['hid'];


$sql="insert into chat(Sender,Receiver,Message,Times) values('$username','$rs','$ms',now())";
mysql_query( $sql);
$vl=$_POST['hid'];


 $msg = mysql_query("SELECT Sender,Message FROM chat where (Sender='$username' and Receiver='$vl') or (Sender='$vl' and Receiver='$username') order by Times desc");
 if(mysql_num_rows($msg))
 {
 $rows = mysql_fetch_assoc($msg);

   do
   {


    $tcr = mysql_query("SELECT * FROM register where email='$vl'");
    $na = mysql_fetch_assoc($tcr);

    $std = mysql_query("SELECT * FROM register where email='$username'");
    $nam = mysql_fetch_assoc($std);

    if($vl==$rows['Sender'])
    {
      echo $na['fname'];
      echo " :  ";
      echo $rows['Message'];
      echo "\n";
    }
    else
    {
        echo "me";
        echo "          :  ";
        echo $rows['Message'];
        echo "\n";
     }


    }
   while ($rows = mysql_fetch_assoc($msg));
}
?>
