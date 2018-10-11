<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html>
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

</head>
<body data-spy="scroll" data-target="blog-detail-2.htmlscrollspy">

    <!-- THE LOADER -->

    <div class="be-loader">
        <div class="spinner">
            <img src="img/logo-loader.png"  alt="">
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

                            <span class="be-dropdown-content"><span style="font-size: 15px;"><b style="color: #204d74"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></b></span></span>
                            <div class="drop-down-list a-list">

                                <a href="logout.php">Logout</a>
                            </div>
                        </div>	


                    </div>	


                </div>	
            </div>


        </div>
    </div>
</header>	


<!-- MAIN CONTENT -->

<div id="content-block">
    <div class="container be-detail-container">
        <div class="row">
            <div class="col-xs-12 col-md-3 left-feild">
                <div class="be-vidget back-block">
                    <a class="btn full color-1 size-1 hover-1" href="#"><i class="fa fa-chevron-left"></i>Add profile</a>
                </div>
                <div class="be-vidget hidden-xs hidden-sm" id="scrollspy">
                    <h3 class="letf-menu-article">
                        Choose Category
                    </h3>
                    <div class="creative_filds_block">
                        <ul class="ul nav">
                            <li class="edit-ln"><a href="#basic-information">Basic Information</a></li>


                            <li class="edit-ln"><a href="#about-me">About Me</a></li>

                        </ul>
                    </div>

                </div>

            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-md-9 _editor-content_">
                    <div class="sec"  data-sec="basic-information">
                        <div class="be-large-post">
                            <div class="info-block style-2">
                                <div class="be-large-post-align "><h3 class="info-block-label">Basic Information</h3></div>
                            </div>


                            <div class="be-large-post-align">
                                <div class="row">
                                    <div class="input-col col-xs-12">
                                        <div class="form-group fg_icon focus-2">
                                            <div class="form-label">Upload Image</div>
                                            <input class="form-input" type="file" value="" name="img" readonly="">
                                        </div>							
                                    </div>
                                    <div class="input-col col-xs-12 col-sm-6">
                                        <div class="form-group fg_icon focus-2">
                                            <div class="form-label">First Name</div>
                                            <input class="form-input" type="text" value="<?php echo $row1["fname"] ?>" name="fname" readonly="">
                                        </div>							
                                    </div>
                                    <div class="input-col col-xs-12 col-sm-6">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Last Name</div>									
                                            <input class="form-input" type="text" value="<?php echo $row1["lname"] ?>" name="lname" readonly="">
                                        </div>								
                                    </div>
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Contact Number</div>									
                                            <input class="form-input" type="text" value="" name="phone" placeholder="Enter your valid Number">
                                        </div>								
                                    </div>

                                    <!--                                    <div class="input-col col-xs-12 col-sm-6">
                                                                            <div class="form-group focus-2">
                                                                                <div class="form-label">Date Of Birth</div>									
                                                                                <input class="form-input" type="date" value="" name="dob">
                                                                            </div>								
                                                                        </div>-->
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Sex &nbsp;&nbsp;	 &nbsp;&nbsp; &nbsp;&nbsp;								
                                                <input class="" type="radio" name="gender"value="male">Male &nbsp;&nbsp; &nbsp;&nbsp;
                                                <input class="" type="radio" name="gender" value="female">Female
                                            </div>	</div>							
                                    </div>
                                    <div class="input-col col-xs-12 col-sm-6">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Mai Id</div>									
                                            <input class="form-input" type="email" value="<?php echo $row1["email"] ?>" name="mail" readonly="">
                                        </div>								
                                    </div>
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Add Work Place</div>									
                                            <input class="form-input" type="text"  name="wrk_place" placeholder="Enter Work place">
                                        </div>								
                                    </div>
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Add University</div>									
                                            <input class="form-input" type="text" name="university"  placeholder="Enter University">
                                        </div>								
                                    </div>
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Add High School</div>									
                                            <input class="form-input" type="text"  name="school"  placeholder="Enter High School">
                                        </div>								
                                    </div>
                                    <div class="input-col col-xs-12 col-sm-6">

                                        <div class="form-group focus-2">
                                            <div class="form-label">Country</div>									
                                            <input class="form-input" type="text" value="<?php echo $row1["country"] ?>" name="country" readonly="">
                                        </div>	
                                    </div>
                                    <div class="input-col col-xs-12 col-sm-6">
                                        <div class="form-group focus-2">
                                            <div class="form-label">City</div>									
                                            <input class="form-input" type="text" value="" name="city" placeholder="Enter Your City">
                                        </div>								
                                    </div>


                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Add Personal Skills</div>
                                            <textarea class="form-input" required="" placeholder="Something about you" name="skills"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sec" data-sec="on-the-web">

                    </div>

                    <div class="sec"  data-sec="about-me" >
                        <div class="be-large-post">
                            <div class="info-block style-2">
                                <div class="be-large-post-align"><h3 class="info-block-label">About Me</h3></div>
                            </div>
                            <div class="be-large-post-align">
                                <div class="row">
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Section Title</div>									
                                            <input class="form-input" type="text" placeholder="About Me" name="about">
                                        </div>								
                                    </div>
                                    <div class="input-col col-xs-12">
                                        <div class="form-group focus-2">
                                            <div class="form-label">Description</div>
                                            <textarea class="form-input" required="" placeholder="Something about you" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 for-signin">
                                        <input type="submit" class="be-popup-sign-button" name="f1" value="Save & Continue">
                                    </div>
                                </div>
                            </div>						
                        </div>
                    </div>



                </div>	
            </form>
            <?php
            if (isset($_POST["f1"])) {
                $img = $_FILES["img"]["name"];
                $tmp = $_FILES["img"]["tmp_name"];
                $path = "img/" . $img;
                move_uploaded_file($tmp, $path);
                $fn = $_POST["fname"];
                $ln = $_POST["lname"];
                $ph = $_POST["phone"];

                $sex = $_POST["gender"];
                $mail = $_POST["mail"];


                $wrk = $_POST["wrk_place"];
                $un = $_POST["university"];
                $sc = $_POST["school"];
                $cu = $_POST["country"];


                $ct = $_POST["city"];
                $skills = $_POST["skills"];
                $ab = $_POST["about"];
                $des = $_POST["description"];
                $q = "insert into add_profile(reg_id,image,fname,lname,contact_no,sex,email,wrk_place,university,high_school,country,city,skills,about,description)values($id,'$img','$fn','$ln','$ph','$sex','$mail','$wrk','$un','$sc','$cu','$ct','$skills','$ab','$des')";
                if (mysql_query($q)) {
                    $q2 =mysql_query("insert into profile_pics(pics_id,reg_id,pics,status)values('',$id,'$img','0')");
                    echo "<script>window.location.href='user_home.php';alert('Successfully Added!!')</script>";
                } else {
                    echo "<script>alert('failed')</script>";
                }
            }
            ?>
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
<!-- SCRIPT	-->
<script src="script/jquery-2.1.4.min.js"></script>		
<script src="script/bootstrap.min.js"></script>	
<script src="script/idangerous.swiper.min.js"></script>
<script src="script/isotope.pkgd.min.js"></script>	
<script src="script/jquery.viewportchecker.min.js"></script>	
<script src="script/global.js"></script>	
</body>

<!-- Mirrored from demo.nrgthemes.com/projects/nrgnetwork/author-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 14:50:21 GMT -->
</html>