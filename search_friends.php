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
    </head>
    <body>
        <?php
        if (isset($_GET["fid"])) {
            $uid = $_SESSION["id"];
            $fid = $_GET["fid"];
            $result = mysql_query("select * from friend_request where user_id=$uid and frnd_id=$fid");
            $row = mysql_fetch_array($result);
            if (mysql_num_rows($result) == 0) {
                $res = mysql_query("insert into friend_request values('',$uid,$fid,'Request Send')");
                if ($res) {
                    echo "<script>alert('Request Sent');</script>";
                }
            } else {
                if ($row["status"] == 'Friends') {
                    echo "<script>alert('You are a friend of this user.');</script>";
                } else {
                    echo "<script>alert('You already send a friend request');</script>";
                }
            }
        }


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
                                            <div class="noto-entry style-2">
                                                <div class="noto-content clearfix">
                                                    <div class="noto-img">	
                                                        <a href="blog-detail-2.html">
                                                            <img src="img/c1.png" alt="" class="be-ava-comment">
                                                        </a>
                                                    </div>
                                                    <div class="noto-text">
                                                        <div class="noto-text-top">
                                                            <span class="noto-name"><a href="blog-detail-2.html">Ravi Sah</a></span>
                                                            <span class="noto-date"><i class="fa fa-clock-o"></i> May 27, 2015</span>
                                                        </div>
                                                        <div class="noto-message">Sed velit mauris, pulvinar sit amet accumsan vitae, egestas, pulvinar sit amet accumsan vitae, egestas</div>
                                                    </div>
                                                </div>
                                            </div>
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

           <div class="container-fluid cd-main-content custom-container" >
                <div class="row" >
                    <div class="col-md-2 left-feild" >
                        <form action="" class="input-search" method="post">
                            <input type="text" id="name" name="uname" required="" placeholder="Search">
                            <i class="fa fa-search"></i>
                            <input type="submit" value="search" name="search">
                            <?php 
                            if(isset($_POST["search"]))
                            {
                                $search_item=$_POST["uname"];
                                header("location:search_friends.php?item=$search_item");
                            }
                            ?>
                        </form>				
                    </div>			
                </div>
            </div>	
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-md-3 left-feild">
                        <div class="be-vidget" style="position: fixed;">
                            <div class="be-drop-down">
                                <h3 class="letf-menu-article">
                                    <img class="login-user" src="img/<?php echo $row["image"] ?>" height="50px" width="50px">
                                    <?php echo $row1["fname"] ?>
                                </h3>
                            </div>
                            <div class="creative_filds_block" >
                                <div class="ul">
                                    <a  data-filter="#" class="filter">Events</a>
                                    <a data-filter="#" class="filter">Groups</a>
                                    <a data-filter="#" class="filter">Pages</a>
                                    <a data-filter="#" class="filter">Photos</a>
                                    <a data-filter="#" class="filter">Friends List</a>

                                </div>
                            </div>
                        </div>


                    </div>
                    <form method="post">
                        <div class="col-md-9">
                            <div id="container-mix" class="be-user-wrapper row">
                                <input type="hidden" id="user_id" value="<?php echo $id ?>">
                                <?php
                                 if(isset($_GET["item"]))
                            {
                            $item = $_GET["item"];
                                $q2 = mysql_query("select add_profile.*,friend_request.status as friend_status from add_profile left join  friend_request  on friend_request.req_id=add_profile.reg_id where friend_request.user_id=$id
union
select add_profile.*,friend_request.status as friend_status  from add_profile left join  friend_request  on friend_request.user_id=add_profile.reg_id where friend_request.req_id=$id
union
select add_profile.*,'ADD FRIEND'  as friend_status from add_profile where reg_id not in(select req_id from friend_request where user_id='$id') and reg_id not in (select user_id from friend_request where req_id='$id') and add_profile.fname='$item' and reg_id!=$id");
//                                $q2 = "select * from register inner join add_profile on add_profile.reg_id=register.id  where add_profile.reg_id!=$id ORDER BY register.id ASC";
//                                $qry = mysql_query("select * from friend_request where user_id=$id");
////                                $rows = mysql_fetch_array($qry);

                                while ($row2 = mysql_fetch_array($q2)) {
                                    ?>
                                    <input type="hidden" id="frnd_id" value="<?php echo $row2['id'] ?>">
                                    <div  class="mix category-4 custom-column-5">
                                        <div class="be-user-block style-2">
                                            <a class="be-ava-user style-2" href="blog-detail-2.html">
                                                <img src="img/<?php echo $row2["image"] ?>" alt="" style="border-radius: 50%"> 
                                            </a>
                                            <a href="people.php?uid=<?php echo $row2['reg_id'] ?>" class="be-use-name"><?php echo $row2['fname'] . '  ' . $row2['lname']; ?></a>
                                            <p class="be-user-info"><?php echo $row2['country']; ?></p>
                                            <div class="be-text-tags">
                                                <a href="#">Works At,</a>
                                                <a href="#"><?php echo $row2['wrk_place']; ?></a>,
                                            </div>
                                            <?php
                                            $frid = $row2['reg_id'];
                                            $qry = mysql_query("select * from friend_request where user_id=$id and frnd_id=$frid");
                                            $rows = mysql_fetch_array($qry);
                                            if ($row2["reg_id"] == $rows["frnd_id"] || $rows["user_id"] == $id) {
                                                ?>
                                                <button type="submit" id="add_friend" type="submit" name="add_friend" style="height: 30px;min-width: 100px;background-color: #0097b9;" ><a href="find_friends.php?fid=<?php echo $row2["id"] ?>" style="color: white;text-decoration: none"><?php
                                                if ($rows["status"] == 'Friends') {
                                                    echo "Friends";
                                                } else {
                                                    echo "Friend Request Send";
                                                }
                                                ?></a></button>
                                                        <?php
                                                    } else {
                                                        ?>
                                                <button type="submit" id="add_friend" type="submit" name="add_friend" style="height: 30px;min-width: 100px;background-color: #0097b9;" ><a href="find_friends.php?fid=<?php echo $row2["id"] ?>" style="color: white;text-decoration: none">Add Friend</a></button>                          

        <?php
    }
    ?>
                        <!--                                    <?        <a href=""><input  onclick="window.location.href=''" value="Add Friend"></a>-->
                                        </div>
                                    </div>
    <?php
}
                            }
?>


                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- THE FOOTER -->
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