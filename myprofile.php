<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NGRNetwork</title>
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
        <script>

            function add_message()
            {
                var txtmsg = document.getElementById('txtmsg').value;
                var usrid = document.getElementById('to_id').value;
                $.get('add_message.php', {txtmg: txtmsg, usid: usrid}, function (data)
                {
                    window.location.href = 'view_all_messages.php';
                });
            }
        </script>
        <script>
            function unfriend()
            {
                var frid = document.getElementById('frnd_id').value;
                var uid = document.getElementById('usrid').value;
                $.get('unfriend.php', {usid: uid, frid: frid}, function (data)
                {
                    window.location.href = 'find_friends.php';
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

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
    <body class="page-login">
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
        <form method="submit">

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
            <?php
            $id = $_GET["uid"];
            $q1 = mysql_query("select * from register where id=$id");
            $row = mysql_fetch_array($q1);
            $q = "select * from register inner join add_profile on add_profile.reg_id=register.id where add_profile.reg_id=$id";
            $res = mysql_query($q);
            $row1 = mysql_fetch_array($res);
            if ($_GET['uid'] == $_SESSION['id']) {
                ?>
                <div id="content-block">
                    <div class="container be-detail-container">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 left-feild" >
                                <div class="be-user-block style-3" >
                                    <div class="be-user-detail">
                                        <a class="be-ava-user style-2" href="#">
                                            <img src="img/<?php echo $row1["image"] ?>" height="115px" width="115px" alt="">
                                        </a>
                                        <a class="be-ava-left btn color-1 size-2 hover-1" href="edit_profile.php"><i class="fa fa-pencil"></i>Edit</a>
                                        <div class="be-ava-right btn btn-message color-4 size-2 hover-7">
                                            <i class="fa fa-envelope-o"></i>Follow

                                        </div>
                                        <p class="be-use-name"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></p>
                                        <div class="be-user-info">
                                            <?php echo $row["country"] ?>
                                        </div>
                                        <div class="be-desc-block">
                                            <div class="be-desc-author">
                                                <div class="be-desc-label"></div>
                                                <div class="clearfix"></div>
                                                <div class="be-desc-text">

                                                    <?php echo $row1["wrk_place"] ?> <br><br>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="be-user-social">							
                                            <a class="social-btn color-1" ><i class="fa fa-facebook"></i></a>
                                            <a class="social-btn color-2" ><i class="fa fa-twitter"></i></a>
                                            <a class="social-btn color-3" ><i class="fa fa-google-plus"></i></a>
                                            <a class="social-btn color-4" ><i class="fa fa-pinterest-p"></i></a>
                                            <a class="social-btn color-5" ><i class="fa fa-instagram"></i></a>
                                            <a class="social-btn color-6" ><i class="fa fa-linkedin"></i></a>
                                        </div>
                                        <a class="be-user-site" href=" <?php echo $row1["email"] ?>"><i class="fa fa-link"></i> <?php echo $row1["email"] ?></a>
                                    </div>
                                    <div class="be-user-statistic">
                                        <?php
                                        $qry = mysql_query("select count(req_id),req_id from friend_request where status='Friends' and frnd_id=$id");
                                        $row = mysql_fetch_array($qry);
                                        ?>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-following-b"></i>Friends<span class="stat-counter"><?php echo $row[0] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i> Gender<span class="stat-counter"> <?php echo $row1["sex"] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i> Dob<span class="stat-counter"> <?php echo $row1["day"] . "-" . $row1["month"] . "-" . $row1["year"] ?></span></div>

                                        <div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i> University<span class="stat-counter"> <?php echo $row1["university"] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-like-b"></i>High School<span class="stat-counter"> <?php echo $row1["high_school"] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-followers-b"></i>Contact Number<span class="stat-counter"> <?php echo $row1["contact_no"] ?></span></div>
                                    </div>
                                </div>
                                <div class="be-desc-block">
                                    <div class="be-desc-author">
                                        <div class="be-desc-label">About Me</div>
                                        <div class="clearfix"></div>
                                        <div class="be-desc-text">
                                            <?php echo $row1["about"] ?> <br><br>
                                            <?php echo $row1["description"] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <div class="tab-wrapper style-1">
                                    <div class="tab-nav-wrapper">
                                        <div  class="nav-tab  clearfix">
                                            <div class="nav-tab-item active">
                                                <span>Friends</span>
                                            </div>
                                            <div class="nav-tab-item ">
                                                <span>Photos</span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="tabs-content clearfix">

                                        <div class="tab-info active"> 
                                            <div class="row">
                                                <?php
                                                $q2 = "select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$id and friend_request.user_id!=$id and friend_request.status='Friends'";
                                                $res2 = mysql_query($q2);
                                                while ($row2 = mysql_fetch_array($res2)) {
                                                    ?>
                                                    <div class="col-ml-12 col-xs-6 col-sm-4">
                                                        <a href="myprofile.php?uid=<?php echo $row2["user_id"] ?>" class="be-img-block">
                                                            <img src="img/<?php echo $row2["image"] ?>" height="200px" width="100%" >
                                                        </a><br>
                                                        <center> <?php echo $row2['country']; ?></center>
                                                        <a href="myprofile.php?uid=<?php echo $row2["user_id"] ?>" class="be-post-title"><center><?php echo $row2['fname'] . '  ' . $row2['lname']; ?></center>  </a><br>
                                                       
                                                        <!--                                                 <a class="btn color-1 size-2 hover-1">Friends</a>-->
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="tab-info">
                                            <div class="row">
                                                <?php
                                                $res4 = mysql_query("select * from posts inner join register inner join add_profile on posts.user_id=register.id and add_profile.reg_id=posts.user_id where posts.user_id=$id");
                                                while ($row4 = mysql_fetch_array($res4)) {
                                                    if ($row4["img_file"] != "") {
                                                        ?>
                                                        <div class="col-ml-12 col-xs-6 col-sm-4">
                                                            <a href="#" class="be-img-block">
                                                                <img src="upload/<?php echo $row4["img_file"] ?>" height="200px" width="250px" alt="omg">
                                                            </a><br>

                                                        </div>	
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 				
                        </div>				
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div id="content-block">
                    <div class="container be-detail-container">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 left-feild" >
                                <div class="be-user-block style-3" >
                                    <div class="be-user-detail">
                                        <a class="be-ava-user style-2" href="#">
                                            <img src="img/<?php echo $row1["image"] ?>" height="115px" width="115px" alt="">
                                        </a>
                                        <?php
                                        $usid = $_GET["uid"];
                                        $qrys = mysql_query("select req_id from friend_request where status='Friends' and frnd_id=$usid and user_id={$_SESSION['id']}");
                                        $rows = mysql_fetch_array($qrys);
                                        ?>
                                        <input type="hidden" value="<?php echo $rows[0]; ?>" id="usrid"/>
                                        <input type="hidden" value="<?php echo $usid; ?>" id="frnd_id"/>

                                        <button type="submit" name="msg" value="Send Message" class="be-ava-left btn color-1 size-2 hover-1" onclick="unfriend()">Unfriend</button><br><br>
                                        <div class="be-ava-right btn btn-message color-4 size-2 hover-7">
                                            <i class="fa fa-envelope-o"></i>message
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
                                        <p class="be-use-name"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></p>
                                        <div class="be-user-info">
                                            <?php echo $row["country"] ?>
                                        </div>
                                        <div class="be-desc-block">
                                            <div class="be-desc-author">
                                                <div class="be-desc-label"></div>
                                                <div class="clearfix"></div>
                                                <div class="be-desc-text">

                                                    <?php echo $row1["wrk_place"] ?> <br><br>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="be-user-social">							
                                            <a class="social-btn color-1" ><i class="fa fa-facebook"></i></a>
                                            <a class="social-btn color-2" ><i class="fa fa-twitter"></i></a>
                                            <a class="social-btn color-3" ><i class="fa fa-google-plus"></i></a>
                                            <a class="social-btn color-4" ><i class="fa fa-pinterest-p"></i></a>
                                            <a class="social-btn color-5" ><i class="fa fa-instagram"></i></a>
                                            <a class="social-btn color-6" ><i class="fa fa-linkedin"></i></a>
                                        </div>
                                        <a class="be-user-site" href=" <?php echo $row1["email"] ?>"><i class="fa fa-link"></i> <?php echo $row1["email"] ?></a>
                                    </div>
                                    <div class="be-user-statistic">
                                        <?php
                                        $qry = mysql_query("select count(req_id) from friend_request where status='Friends' and frnd_id=$id");
                                        $row = mysql_fetch_array($qry);
                                        ?>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-following-b"></i>Friends<span class="stat-counter"><?php echo $row[0] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i> Gender<span class="stat-counter"> <?php echo $row1["sex"] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i> Dob<span class="stat-counter"> <?php echo $row1["day"] . "-" . $row1["month"] . "-" . $row1["year"] ?></span></div>

                                        <div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i> University<span class="stat-counter"> <?php echo $row1["university"] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-like-b"></i>High School<span class="stat-counter"> <?php echo $row1["high_school"] ?></span></div>
                                        <div class="stat-row clearfix"><i class="stat-icon icon-followers-b"></i>Contact Number<span class="stat-counter"> <?php echo $row1["contact_no"] ?></span></div>
                                    </div>
                                </div>
                                <div class="be-desc-block">
                                    <div class="be-desc-author">
                                        <div class="be-desc-label">About Me</div>
                                        <div class="clearfix"></div>
                                        <div class="be-desc-text">
                                            <?php echo $row1["about"] ?> <br><br>
                                            <?php echo $row1["description"] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <div class="tab-wrapper style-1">
                                    <div class="tab-nav-wrapper">
                                        <div  class="nav-tab  clearfix">
                                            <div class="nav-tab-item active">
                                                <span>Friends</span>
                                            </div>
                                            <div class="nav-tab-item ">
                                                <span>Photos</span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="tabs-content clearfix">

                                        <div class="tab-info active"> 
                                            <div class="row">
                                                <?php
                                                $q2 = "select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$id and friend_request.user_id!=$id and friend_request.status='Friends'";
                                                $res2 = mysql_query($q2);
                                                while ($row2 = mysql_fetch_array($res2)) {
                                                    ?>
                                                    <div class="col-ml-12 col-xs-6 col-sm-4">
                                                        <a href="myprofile.php?uid=<?php echo $row2["user_id"] ?>" class="be-img-block">
                                                            <img src="img/<?php echo $row2["image"] ?>" height="200px" width="100%" >
                                                        </a><br>
                                                        <center> <?php echo $row2['country']; ?></center>
                                                        <a href="myprofile.php?uid=<?php echo $row2["user_id"] ?>" class="be-post-title"><center><?php echo $row2['fname'] . '  ' . $row2['lname']; ?></center>  </a><br>
                                                        <!--                                                 <a class="btn color-1 size-2 hover-1">Friends</a>-->
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="tab-info">
                                            <div class="row">
                                                <?php
                                                $res4 = mysql_query("select * from posts inner join register inner join add_profile on posts.user_id=register.id and add_profile.reg_id=posts.user_id where posts.user_id=$id");
                                                while ($row4 = mysql_fetch_array($res4)) {
                                                    if ($row4["img_file"] != "") {
                                                        ?>
                                                        <div class="col-ml-12 col-xs-6 col-sm-4">
                                                            <a href="#" class="be-img-block">
                                                                <img src="upload/<?php echo $row4["img_file"] ?>" height="200px" width="250px" alt="omg">
                                                            </a><br>

                                                        </div>	
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 				
                        </div>				
                    </div>
                </div>
                <?php
            }
            ?>
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

        <!-- SCRIPT	-->
        <script src="script/jquery-2.1.4.min.js"></script>
        <script src="script/bootstrap.min.js"></script>		
        <script src="script/idangerous.swiper.min.js"></script>
        <script src="script/isotope.pkgd.min.js"></script>	
        <script src="script/jquery.viewportchecker.min.js"></script>	
        <script src="script/global.js"></script>
    </form>
</body>

<!-- Mirrored from demo.nrgthemes.com/projects/nrgnetwork/author-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 14:47:57 GMT -->
</html>