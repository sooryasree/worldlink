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
        <link rel="stylesheet" href="style/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>

            function add_message()
            {
                var txtmsg = document.getElementById('txtmsg').value;
                var usrid = document.getElementById('usrid').value;
                $.get('add_message.php', {txtmg: txtmsg, usid: usrid}, function (data)
                {
                    window.location.href = 'view_all_messages.php';
                });
            }
        </script>
        <script type="text/javascript">
            function myFunction() {
                $.ajax({
                    url: "view_notification.php",
                    type: "POST",
                    processData: false,
                    success: function (data) {
                        $("#notification-count").remove();
                        $("#notification-latest").show();
                        $("#notification-latest").html(data);
                    },
                    error: function () {}
                });
            }

            $(document).ready(function () {
                $('body').click(function (e) {
                    if (e.target.id != 'images/notification-icon') {
                        $("#notification-latest").hide();
                    }
                });
            });
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
        ?>


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
                            <!--                            <div class="login-header-block">
                                                            <div class="login_block">																	
                                                                <a class="notofications-popup" href="blog-detail-2.html">
                                                                    <i class="glyphicon glyphicon-bell" id="notification-count"><b><label><?php
                            if ($count1 > 0) {
                                echo $count1;
                            }
                            ?></label></b></i>
                                                                    <div id="notification-latest"></div>
                                                                </a>
                            <img class="notofications-popup" src="messenger.png" height="20px" width="20px">    
                                                                <div class="noto-popup notofications-block" >
                                                                    <div class="m-close"></div>
                                                                    <div class="noto-label"  id="notification-latest" >Your Notification</div>
                                                                    "<div class='noto-body'>
                            
                                                                    </div>							
                                                                </div>
                                                            </div>	
                                                        </div>-->
                        </ul>
                    </div>

                </div>
            </div>
        </header>
        <!-- MAIN CONTENT -->
        <div id="content-block">
            <div class="container be-detail-container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 left-feild" style="position: relative">
                        <a href="myprofile.php?uid=<?php echo $row["reg_id"] ?>" class="btn color-4 size-1 hover-7"><i class="fa fa-chevron-left"></i> back to profile</a>

                        <form>
                            <div class="noto-header clearfix">
                                <div class="form-checkbox">
                                    <input id="ch1" class="select-all" type="checkbox"> <span class="check"><i class="fa fa-check"></i></span>
                                    <label for="ch1">select all</label>
                                </div>

                            </div>

                            <div class="noto-entry style-3">
                                <?php
                                $id = $_SESSION["id"];
                                $q2 = "select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$id";
                                $res2 = mysql_query($q2);
                                while ($row2 = mysql_fetch_array($res2)) {
                                    ?>
                                    <div class="noto-content clearfix">
                                        <div class="form-checkbox">
                                            <input type="checkbox" value=""> <span class="check"><i class="fa fa-check"></i></span>
                                        </div>							
                                        <div class="noto-img">	
                                            <a href="view_all_messages.php?msgid=<?php echo $row2["reg_id"]; ?>">
                                                <img src="img/<?php echo $row2["image"] ?>" alt="" class="be-ava-comment">
                                            </a>
                                        </div>
                                        <div class="noto-text">
                                            <div class="noto-text-top">
                                                <span class="noto-name"><a href="view_all_messages.php?msgid=<?php echo $row2["reg_id"]; ?>"><?php echo $row2["fname"] . ' ' . $row2["lname"] ?></a></span>
<!--                                                <span class="noto-date"><i class="fa fa-clock-o"></i> //<?php //echo $row2["add_date"] ?></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </form>										            					
                    </div>
<?php 
if(isset($_GET['msgid']))
{
?>
                    <div class="col-xs-12 col-sm-7">
                        <div class="be-large-post">
                            
                            <div class="info-block style-2">
                                <div class="be-large-post-align">
                                    <div class="info-block-right"><a class="settings" href="#"><i class="fa fa-cog"></i></a></div>
                                    <?php 
                                    $reslt=  mysql_query("select * from add_profile where reg_id={$_GET['msgid']}");
                                    $rws=  mysql_fetch_array($reslt);
                                    
                                    ?>
                                    <h3 class="info-block-label">Message with <?php echo $rws["fname"]." ".$rws["lname"] ?></h3>
                                </div>
                            </div>
                            <div class="be-large-post-align">
                                <?php
                                $mid = $_GET['msgid'];
//                            $q2 = "select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$id and friend_request.user_id!=$id and friend_request.status='Friends'";
                                $q2 = "select * from messages inner join add_profile on messages.uid=add_profile.reg_id where messages.to_id=$mid and messages.uid={$_SESSION['id']} or messages.to_id={$_SESSION['id']} and messages.uid=$mid";
                                $res2 = mysql_query($q2);
                                while ($row2 = mysql_fetch_array($res2)) {
                                    ?>
                                    <div class="be-comment">
                                        <div class="be-img-comment">	
                                            <a href="#">
                                                <img src="img/<?php echo $row2["image"] ?>" alt="" class="be-ava-comment">
                                            </a>
                                        </div>
                                        <div class="be-comment-content">

                                            <span class="be-comment-name">
                                                <a href="#"><?php echo $row2["fname"] . ' ' . $row2["lname"] ?></a>
                                            </span>
                                            <span class="be-comment-time">
                                                <i class="fa fa-clock-o"></i>
                                                May 27, 2015 at 3:14am
                                            </span>

                                            <p class="be-comment-text">
                                                <?php echo $row2["message"] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <form method="post">
                                    <?php
                                    $mid = $_GET['msgid'];
                                    $qrys = mysql_query("select req_id,frnd_id from friend_request where status='Friends' and frnd_id=$mid and user_id={$_SESSION['id']}");
                                    $rows = mysql_fetch_array($qrys);
                                    ?>
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $mid ?>" id="usrid"/>
                                        <input type="hidden" value="<?php echo $_SESSION['id'] ?>" id="user_id"/>
                                        <div class="form-label">Your Message</div>
                                        <textarea id="txtmsg" name="txtmsg" class="form-input" required="" placeholder="Reply"></textarea>
                                    </div>
                                    <button type="submit" name="msg" value="Send Message" class="btn btn-right color-1 size-1 hover-1" onclick="add_message()">Send</button>						
                                </form>
                            </div>
                                <?php 
                    
}
?>
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
        <div class="large-popup send-m">
            <div class="large-popup-fixed"></div>
            <div class="container large-popup-container">
                <div class="row">
                    <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa fa-times close-m close-button"></i>
                                <h5 class="large-popup-title">Send message</h5>
                            </div>
                            <form action="http://demo.nrgthemes.com/projects/nrgnetwork/" class="popup-input-search">
                                <div class="col-md-6">
                                    <input class="input-signtype" type="text" required="" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <input class="input-signtype" type="text" required="" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <div class="be-custom-select-block">
                                        <select class="be-custom-select">
                                            <option value="" disabled selected>
                                                Country
                                            </option>
                                            <option value="">USA</option>
                                            <option value="">Canada</option>
                                            <option value="">England</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input class="input-signtype" type="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="message-area" placeholder="Message"></textarea>
                                </div>
                                <div class="col-md-12 for-signin">
                                    <input type="submit" class="be-popup-sign-button" value="SEND">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-config">
            <div class="main-color">
                <div class="title">Main Color:</div>
                <div class="colours-wrapper">
                    <div class="entry color1 m-color active" data-colour="style/stylesheet.css"></div>   
                    <div class="entry color3 m-color"  data-colour="style/style-green.html"></div>
                    <div class="entry color6 m-color"  data-colour="style/style-orange.html"></div>
                    <div class="entry color8 m-color"  data-colour="style/style-red.html"></div>  
                    <div class="title">Second Color:</div>  
                    <div class="entry s-color  active color10"  data-colour="style/stylesheet.css"></div>
                    <div class="entry s-color color11"  data-colour="style/style-oranges.html"></div> 
                    <div class="entry s-color color12"  data-colour="style/style-greens.html"></div>
                    <div class="entry s-color color13"  data-colour="style/style-reds.html"></div>

                </div>
            </div>
            <div class="open"><img src="img/icon-134.png" alt=""></div>
        </div>
        <!-- SCRIPT	-->
        <script src="script/jquery-2.1.4.min.js"></script>
        <script src="script/bootstrap.min.js"></script>		
        <script src="script/idangerous.swiper.min.js"></script>
        <script src="script/isotope.pkgd.min.js"></script>	
        <script src="script/jquery.viewportchecker.min.js"></script>	
        <script src="script/jquery.countTo.js"></script>	
        <script src="script/global.js"></script>	
    </body>

    <!-- Mirrored from demo.nrgthemes.com/projects/nrgnetwork/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 14:50:21 GMT -->
</html>