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

            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-md-2 left-feild">
                        <!--					<form action="http://demo.nrgthemes.com/projects/nrgnetwork/" class="input-search">
                                                                        <input type="text" required placeholder="Enter keyword">
                                                                                <i class="fa fa-search"></i>
                                                                                <input type="submit" value="">
                                                                </form>				-->
                    </div>

                </div>
            </div>

            <div class="container-fluid custom-container">
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
                                header("location:search.php?item=$search_item");
                            }
                            ?>
                        </form>				
                    </div>			
                </div>
            </div>	
                <div class="row">

                    <div class="col-md-2 left-feild">
                        <div class="be-vidget" style="position: fixed;">
                            <div class="be-drop-down">
                                <h3 class="letf-menu-article">
                                    <a href="myprofile.php?uid=<?php echo $row["reg_id"] ?>"><img class="login-user" src="img/<?php echo $row["image"] ?>" height="50px" width="50px">
                                        <?php echo $row1["fname"] ?></a>
                                </h3>
                            </div><br><br>
                            <div class="be-drop-down">
                                <h3 class="letf-menu-article">
                                    <a href="gallery.php?uid=<?php echo $row["reg_id"] ?>" style="color:#0097b9" >
                                        Photos</a>
                                </h3>
                            </div>
                             <div class="be-drop-down">
                                <h3 class="letf-menu-article">
                                    <a href="friend_lis.php?uid=<?php echo $row["reg_id"] ?>" style="color:#0097b9" >
                                        Friends List</a>
                                </h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-9">

                        <div id="container-mix"  class="row _post-container_">
                            <?php
                            if (isset($_GET["item"])) {
                                $item = $_GET["item"];
                                $q2 = "select * from add_profile where fname='$item'";
                                $res2 = mysql_query($q2);
                                while ($row2 = mysql_fetch_array($res2)) {
                                    ?>
                                    <div class="category-1 mix custom-column-5">
                                        <div class="be-post">
                                            <a href="people.php?uid=<?php echo $row2['reg_id'] ?>" class="be-img-block">
                                                <img src="img/<?php echo $row2["image"] ?>" height="100px" width="100px" alt="omg">
                                            </a>
                                            <a href="people.php?uid=<?php echo $row2['reg_id'] ?>" class="be-post-title"><h4><?php echo $row2["fname"] ?></h4></a>
                                            <span>
                                                <a href="#" class="be-post-tag"><h5><?php echo $row2["wrk_place"] ?></h5></a>

                                            </span>
                                            <div class="author-post">
                                                <img src="img/a1.png" alt="" class="ava-author">
                                                <span>by <a href="#">WOrld Link</a></span>
                                            </div>

                                        </div>
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