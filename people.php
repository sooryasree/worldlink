<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html>


    <head>
        <title>Social NetWorking Site</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="../../cdn-cgi/apps/head/1sZCq7BECvDgKDoo_5GdSy-HJEo.js"></script><link rel="shortcut icon" href="img/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style/icon.css">
        <link rel="stylesheet" href="style/loader.css">
        <link rel="stylesheet" href="style/idangerous.swiper.css">
        <link rel="stylesheet" href="style/jquery-ui.css">
        <link rel="stylesheet" href="style/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            function add_friend()
            {
                var uid = document.getElementById('user_id').value;
                var fid = document.getElementById('frnd_id').value;
                alert(uid);
                alert(fid);
                $.get("ajax/friend_request.php", {user_id: uid, frnd_id: fid}, function (data)
                {
                    alert(data);
                    document.getElementById('add_friend').value = data;
                });
            }
        </script>
        <script type="text/javascript" src="jquery-ui.js"></script>
        <link rel="stylesheet" href="jquery-ui.css">
        <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
            integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
        crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function ()
            {
                $("#name").autocomplete({
                    source: 'fetch.php'
                });
            });
        </script>
              <script>
        
        function add_message()
        {
            var txtmsg=document.getElementById('txtmsg').value;
            var usrid=document.getElementById('to_id').value;
            $.get('add_message.php',{txtmg:txtmsg,usid:usrid},function(data)
            {
                window.location.href = 'view_all_messages.php';
            });
        }   
        </script>
    </head>
    <body>
        
        <?php
         $count = 0;

        $sql2 = "SELECT count(req_id) FROM friend_request WHERE frnd_id=$id and status = 'Request Send'";
        $result = mysql_query($sql2);
        $ro = mysql_fetch_array($result);
//        $count = mysql_num_rows($result);
        $count = $ro[0];

        $count1 = 0;
        $res = mysql_query("select count(cmt_id) from comments where uid={$_SESSION['id']} and status=1");
        $r = mysql_fetch_array($res);
        $count1 = $r[0];
        
//        if (isset($_GET["uid"])) {
//            $uid = $_SESSION["id"];
//            $fid = $_GET["uid"];
//            $result = mysql_query("select * from friend_request where user_id=$uid and frnd_id=$fid");
//            $row = mysql_fetch_array($result);
//            if (mysql_num_rows($result) == 0) {
//                $res = mysql_query("insert into friend_request values('',$uid,$fid,'Request Send')");
//                if ($res) {
//                    echo "<script>alert('Request Sent');</script>";
//                }
//            } else {
//                if ($row["status"] == 'Friends') {
//                    echo "<script>alert('You are a friend of this user.');</script>";
//                } else {
//                    echo "<script>alert('You already send a friend request');</script>";
//                }
//            }
//        }
?>
        <!-- THE LOADER -->

        <div class="be-loader">
            <div class="spinner">
                <h1><label style="font-size: 30px; font-family: Comic Sans MS; color: white; height: 50px; min-height: 50px"><b style="color:pink">W</b>Orld <b style="color:pink">L</b>ink</label></h1>
                <p class="circle">
                    <span class="ouro">
                        <span class="left"><span class="anim"></span></span>
                        <span class="right"><span class="anim"></span></span>
                    </span>
                </p>
            </div>
        </div>
        <!-- THE HEADER -->
        <header>
            <div class="container-fluid custom-container">
                <div class="row no_row row-header">
                    <div class="brand-be">
                        <h1><label style="font-size: 30px; font-family: Comic Sans MS; color: white; height: 50px; min-height: 50px"><b style="color:pink">W</b>Orld <b style="color:pink">L</b>ink</label></h1>
                    </div>
                    <div class="login-header-block">
                        <div class="login_block">																	


                            <div class="be-drop-down login-user-down">
                                <?php
                                $q1 = mysql_query("select * from register where id=$id");
                                $row1 = mysql_fetch_array($q1);
                                $q = "select * from register inner join add_profile on add_profile.reg_id=register.id where add_profile.reg_id=$id";
                                $res = mysql_query($q);
                                $row = mysql_fetch_array($res);
//                               
                                ?>

                                <img class="login-user" src="img/<?php echo $row["image"] ?>" height="40px" width="40px">
                                <span class="be-dropdown-content"><span style="font-size: 15px;"><b style="color: #204d74"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></b></span></span>                                                 <div class="drop-down-list a-list">
                                    <a href="myprofile.php?uid=<?php echo $row["reg_id"] ?>">My Porfile</a>
                                    <a href="change_password.php">Change Password</a>
                                    <a href="logout.php">Logout</a>
                                </div>
                            </div>	


                        </div>	
                    </div>
                    <div class="header-menu-block">
                        <button class="cmn-toggle-switch cmn-toggle-switch__htx"><span></span></button>
                        <ul class="header-menu" id="one">
                            <li><a href="user_home.php">Home</a></li>
                            <li><a href="find_friends.php">Find Friends</a></li>
                            <li><a href="friend_request.php"><i class="glyphicon glyphicon-user" id="notification-count"><?php
                                        if ($count > 0) {
                                            echo $count;
                                        }
                                        ?></i></a></li>
                            <div class="login-header-block">
                                <div class="login_block">
                                    <li><a class="messages-popup" href="blog-detail-2.html">
                                            <i class="glyphicon glyphicon-globe"></i>
<!--                                            <img src="img/facebook-messenger.ico" width="16px" height="17px">4</i>-->
                                        </a></li>
                                    <div class="noto-popup messages-block">

                                        <div class="m-close"><i class="glyphicons glyphicons-message-empty"></i></div>
                                        <div class="noto-label">Your Messages <span class="noto-label-links"><a href="view_all_messages.php">compose</a><a href="view_all_messages.php">View all messages</a></span></div>
                                        <div class="noto-body">

                                        </div>							
                                    </div>	
                                </div></div>

                        </ul>
                    </div>

                </div>
            </div>
        </header>	


        <!-- MAIN CONTENT -->
        <div id="content-block">
            <div class="container custom-container be-detail-container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3">
                        <?php
                        $item = $_GET["uid"];
//                        $res4=  mysql_query("select * from add_profile join friend_request on add_profile.reg_id=friend_request.user_id  join posts on posts.user_id=friend_request.frnd_id where posts.user_id={$_GET['uid']} and friend_request.frnd_id=$item");
////                 
//                        while ($row4 = mysql_fetch_array($res4)) {

                        $res4 = mysql_query("select * from posts inner join register inner join add_profile on posts.user_id=register.id and add_profile.reg_id=posts.user_id where posts.user_id=$item");
                        while ($row4 = mysql_fetch_array($res4)) {
                            if ($row4["img_file"] != "") {
                                ?>

                                <div class="be-large-post">

                                    <div class="blog-content popup-gallery be-large-post-align"><br><br>
                                        <h6 class="be-post-title to">
                                            <img src="img/<?php echo $row4["image"] ?> " height="40px" width="40px" style="border-radius: 50%"><?php echo $row4["fname"] . ' ' . $row4["lname"] ?>
                                        </h6>


                                        <div class="clear"></div>
                                        <div class="post-text">
                                            <?php // echo $row4["comment"] ?>


                                            <div class="image-block">
                                                <a class="popup-a" href="#">
                                                    <img src="upload/<?php echo $row4["img_file"] ?>" alt="">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="info-block">
                                        <div class="be-large-post-align">

                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>


                    </div>
                    <div class = "col-md-3 col-md-pull-9 left-feild" style = "position: fixed">
                        <?php
                        if (isset($_GET["uid"])) {
                            $item = $_GET["uid"];
                            $q2 = "select * from add_profile where reg_id=$item";
                            $res2 = mysql_query($q2);
                            $row2 = mysql_fetch_array($res2);
                        }
                        ?>
                        <div class="be-user-block">
                            <div class="be-user-detail">
                                <a class="be-ava-user" href="#">
                                    <img src="img/<?php echo $row2["image"] ?>" height="200px" width="200px"> 
                                </a>
                                <p class="be-use-name"><?php echo $row2["fname"] ?></p>
                                <span class="be-user-info">
                                    <?php echo $row2["country"] ?>
                                </span>
                            </div>
                            <div class="be-user-activity-block">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php
                                        if (isset($_GET["sid"])) {
                                            $uid = $_SESSION["id"];
                                            $fid = $_GET["sid"];
                                            $result = mysql_query("select * from friend_request where user_id=$uid and frnd_id=$fid");
                                            $row = mysql_fetch_array($result);
                                            if (mysql_num_rows($result) == 0) {
                                                $res = mysql_query("insert into friend_request values('',$fid,$uid,'Request Send')");
                                                if ($res) {
                                                    echo "<script>window.location.href='people.php?uid=$fid';alert('Request Sent');</script>";
                                                }
                                            } else {
                                                if ($row["status"] == 'Friends') {
                                                    echo "<script>window.location.href='people.php?uid=$fid';alert('You are a friend of this user.');</script>";
                                                } else {
                                                    echo "<script>window.location.href='people.php?uid=$fid';alert('You already send a friend request');</script>";
                                                }
                                            }
                                        }
                                        $uid = $_SESSION["id"];
                                            $fid = $_GET["uid"];
                                            $q = mysql_query("select * from friend_request where user_id=$fid and frnd_id=$uid");
                                            $row5 = mysql_fetch_array($q);
                                        ?>
<button type="submit" id="add_friend" type="submit" name="add_friend" style="height: 30px;min-width: 100px;background-color: #0097b9;" ><a href="people.php?sid=<?php echo $row2['reg_id']; ?>" style="color: white;text-decoration: none"><?php
                                                if ($row5["status"] == 'Friends') {
                                                    echo "Friends";
                                                } elseif($row5["status"]=='Request Send') {
                                                    echo "Request Send";
                                                }
 else {
     echo "Add Friend";
 }
//                                                ?></a></button>
                                        
                                    </div>
                                    <!--                                        <div class="col-lg-6">
                                                                                <a href="view_all_messages.php?uid=<?php //echo $row["reg_id"]   ?>" class="be-user-activity-button be-follow-type"><i class="fa fa-envelope-o"></i>Message</a>
                                                                            </div>-->
                                    <?php
                                    $id = $_GET["uid"];
                                    
                                    $q = "select * from register inner join add_profile on add_profile.reg_id=register.id where add_profile.reg_id=$id";
                                    $res = mysql_query($q);
                                    $row1 = mysql_fetch_array($res);
                                   
                                        ?>
                                        <div class="be-ava-right btn btn-message color-4 size-2 hover-7" style="top:214px;">
                                            <i class="fa fa-envelope-o" ></i>message
                                            <div class="message-popup">
                                                <div class="message-popup-inner container">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                                            <i class="fa fa-times close-button"></i>
                                                            <h5 class="large-popup-title">Send Message To <?php echo $row1["fname"] . ' ' . $row1["lname"] ?></h5>
                                                            <div class="form-group">
                                                                <textarea class="form-input" id="txtmsg" required="" placeholder="Your text" name="txtmsg"></textarea>
                                                            </div>
                                                            <input type="hidden" value="<?php echo $_GET["uid"]; ?>" id="to_id"/>
                                                            <button type="submit" name="msg" value="Send Message" class="btn btn-right color-1 size-1 hover-1" onclick="add_message()">Send Message</button>
                                                            <!--                                                            <a class="btn btn-right color-1 size-1 hover-1"> <button type="submit" name="msg">send message</button></a>	-->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center><h5 class="be-title">
                                        <?php echo $row2["wrk_place"] ?>
                                </h5></center>

                        </div>



                    </div>
                </div>
            </div>
        </div>

        <footer>


            <div class="footer-bottom">
                <div class="container-fluid custom-container">
                    <div class="col-md-12 footer-end clearfix">
                        <center><div class="">
                                <span class="copy">College@  <span class="steelblue" style="font-size: 15px"><a href="http://www.adishankara.ac.in">ASI</a></span></span>
                                <span class="created">Design by <span class="steelblue" style="font-size: 15px"><a href="http://www.adishankara.ac.in">CS Department</a></span></span>
                            </div></center>

                    </div>			
                </div>
            </div>		
        </footer>
        <div class="be-fixed-filter"></div>



        <div class="theme-config">
            <div class="main-color">
                <div class="title">Main Color:</div>
                <div class="colours-wrapper">
                    <div class="entry color1 m-color active" data-colour="style/stylesheet.css"></div>   
                    <div class="entry color3 m-color"  data-colour="style/style-green.css"></div>
                    <div class="entry color6 m-color"  data-colour="style/style-orange.css"></div>
                    <div class="entry color8 m-color"  data-colour="style/style-red.css"></div>  
                    <div class="title">Second Color:</div>  
                    <div class="entry s-color  active color10"  data-colour="style/stylesheet.css"></div>
                    <div class="entry s-color color11"  data-colour="style/style-oranges.css"></div> 
                    <div class="entry s-color color12"  data-colour="style/style-greens.css"></div>
                    <div class="entry s-color color13"  data-colour="style/style-reds.css"></div>

                </div>
            </div>
            <div class="open"><img src="img/icon-134.png" alt=""></div>
        </div>

        <!-- SCRIPTS	 -->
        <script src="script/jquery-2.1.4.min.js"></script>
        <script src="script/jquery-ui.min.js"></script>
        <script src="script/bootstrap.min.js"></script>		
        <script src="script/idangerous.swiper.min.js"></script>
        <script src="script/jquery.mixitup.js"></script>
        <script src="script/filters.js"></script>
        <script src="script/jquery.viewportchecker.min.js"></script>
        <script src="script/global.js"></script>	
    </body>

    <!-- Mirrored from demo.nrgthemes.com/projects/nrgnetwork/people.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 14:47:37 GMT -->
</html>