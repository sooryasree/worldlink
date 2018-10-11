<div class="be-drop-down" >
                                <h4>Contacts</h4>
                            </div>
<?php 
  session_start();
  ob_start();
  mysql_connect("localhost", "root", "");
  mysql_select_db('social_net_working_site');
  $userid = $_SESSION["id"];
  $q="select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$userid and friend_request.user_id!=$userid and friend_request.status='Friends'";  
  $nam = mysql_query($q);
  
  if ($nam)
  {
  $row = mysql_fetch_assoc($nam);
  do{
  $fname=$row['fname'];
  $lname=$row['lname'];
  $tn=$row['email'];
       ?>

    <tr style=" border-spacing:0 5px;"> 
                <td style="width: 250px;text-align: center;height: 40px;">
                     
                    <div id="<?php echo $row['email'] ?>" onclick="chat(this.id,'<?php echo $fname.' '.$lname ?>')" class="chat"> 
                    <p style="color: black;"><img class="login-user" src="img/<?php echo $row["image"] ?>" height="40px" width="40px" style="border-radius: 50%"><?php echo $row['fname']." ".$row['lname']; ?></p>
                </div>
                </td>
              </tr>
   <?php
}
while ($row = mysql_fetch_assoc($nam));
}
else {
  echo '<b>'."No one online".'</b>';
}

?>
