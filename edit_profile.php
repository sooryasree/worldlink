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
<body data-spy="scroll" data-target="blog-detail-2.htmlscrollspy">
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
                            <span class="be-dropdown-content"><span style="font-size: 15px;"><b style="color: #204d74"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></b></span></span>                                             <div class="drop-down-list a-list">
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
                <div class="col-xs-12 col-md-3 left-feild">
                    <div class="be-vidget back-block">
                        <a class="btn full color-1 size-1 hover-1" href="myprofile.php?uid=<?php echo $row["reg_id"] ?>"><i class="fa fa-chevron-left"></i>back to profile</a>
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
<?php
$q2 = mysql_query("select * from add_profile  where reg_id=$id");
$row2 = mysql_fetch_array($q2);
?>
                    <div class="col-xs-12 col-md-9 _editor-content_">
                        <div class="sec"  data-sec="basic-information">
                            <div class="be-large-post">
                                <div class="info-block style-2">
                                    <div class="be-large-post-align "><h3 class="info-block-label">Basic Information</h3></div>
                                </div>

                                <div class="be-large-post-align">
                                    <div class="be-change-ava">
                                        <a class="be-ava-user style-2" href="blog-detail-2.html">
                                            <img class="login-user" src="img/<?php echo $row["image"] ?>" height="40px" width="40px" alt=""> 
                                            <input type="hidden" name="img" value="<?php echo $row["image"] ?>"/>
                                        </a>

                                        <a><input class="form-input" type="file" value="" name="img" readonly=""></a>
                                    </div>
                                </div>
                                <div class="be-large-post-align">
                                    <div class="row">
                                        <div class="input-col col-xs-12 col-sm-6">
                                            <div class="form-group fg_icon focus-2">
                                                <div class="form-label"><b>First Name</b></div>
                                                <input class="form-input" type="text" value="<?php echo $row2["fname"] ?>" name="fname">
                                            </div>							
                                        </div>
                                        <div class="input-col col-xs-12 col-sm-6">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Last Name</b></div>									
                                                <input class="form-input" type="text" value="<?php echo $row2["lname"] ?>" name="lname">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Contact Number</b></div>									
                                                <input class="form-input" type="text" value="<?php echo $row2["contact_no"] ?>" name="phone" placeholder="Enter your valid Number">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label">Sex &nbsp;&nbsp; &nbsp;&nbsp;								
                                                    <span style="color: gray">Male</span>
                                                    <input type="radio" name="gender" value="Male" <?php
                    if ($row2['sex'] == "Male") {
                        echo "checked";
                    }
?>/>



                                                    <span style="color: gray">Female</span>
                                                    <input type="radio" name="gender" value="Female" <?php
                                                    if ($row2['sex'] == "Female") {
                                                        echo "checked";
                                                    }
?>/>
                                                </div>	</div>							
                                        </div><br><br>
                                        <!--
                                                                                <div class="input-col col-xs-12 col-sm-6">
                                                                                    <div class="form-group focus-2">
                                                                                        <div class="form-label">Date Of Birth</div>									
                                                                                        <input class="form-input" type="date" value="<?php echo $row["month"] ?>" name="dob">
                                                                                    </div>								
                                                                                </div>-->
                                        <div class="col-md-12 be-date-block">
                                            <span class="large-popup-text">
                                                <b>Date of birth</b>
                                            </span>
                                            <div class="be-custom-select-block mounth">
                                                <select class="be-custom-select" name="month" required="">
                                                    <option value="<?php echo $row['month'] ?>"><?php echo $row['month'] ?></option>
                                                    <option value="January">January</option>	
                                                    <option value="February">February</option>	
                                                    <option value="March">March</option>	
                                                    <option value="April">April</option>	
                                                    <option value="May">May</option>	
                                                    <option value="June">June</option>	
                                                    <option value="July">July</option>	
                                                    <option value="August">August</option>	
                                                    <option value="September">September</option>	
                                                    <option value="October">October</option>	
                                                    <option value="November">November</option>	
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                            <div class="be-custom-select-block">
                                                <select class="be-custom-select" name="day" required="">
                                                    <option value="<?php echo $row['day'] ?>"><?php echo $row['day'] ?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="be-custom-select-block">
                                                <select class="be-custom-select" name="year" required="">
                                                    <option value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
                                                    <option value="1978">1978</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="input-col col-xs-12 col-sm-6">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Mai Id</b></div>									
                                                <input class="form-input" type="email" value="<?php echo $row1["email"] ?>" name="mail">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Add Work Place</b></div>									
                                                <input class="form-input" type="text" value="<?php echo $row2["wrk_place"] ?>" name="wrk_place">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Add University</b></div>									
                                                <input class="form-input" type="text" placeholder="" value="<?php echo $row2["university"] ?>" name="university">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Add High School</b></div>									
                                                <input class="form-input" type="text" placeholder="" value="<?php echo $row2["high_school"] ?>" name="school">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12 col-sm-6">

                                            <div class="be-custom-select-block">
                                                <span class="large-popup-text">
                                                    <b>Country</b>
                                                </span>
                                                <select class="be-custom-select"name="country">
                                                    <option value="<?php echo $row['country'] ?>"><?php echo $row['country'] ?></option>


                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>


                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>

                                                    <option value="Denmark">Denmark</option>

                                                    <option value="Dominica">Dominica</option>


                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>


                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>

                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>

                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>

                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>

                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>

                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>

                                                    <option value="Lesotho">Lesotho</option>


                                                    <option value="Mexico">Mexico</option>

                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>

                                                    <option value="Oman">Oman</option>


                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>

                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-col col-xs-12 col-sm-6">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>City</b></div>									
                                                <input class="form-input" type="text"value="<?php echo $row2["city"] ?>" name="city">
                                            </div>								
                                        </div>


                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Add Personal Skills</b></div>
                                                <input class="form-input" required="" value="<?php echo $row2["skills"] ?>" name="skil">
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
                                                <div class="form-label"><b>Section Title</b></div>									
                                                <input class="form-input" type="text" value="<?php echo $row2["about"] ?>"  name="about">
                                            </div>								
                                        </div>
                                        <div class="input-col col-xs-12">
                                            <div class="form-group focus-2">
                                                <div class="form-label"><b>Description</b></div>
                                                <input class="form-input" required="" value="<?php echo $row2["description"] ?>" name="des">
                                            </div>
                                        </div>
                                        <div class="col-md-6 for-signin">
                                            <input type="submit" class="be-popup-sign-button" name="f1" value="Update">
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
    $mn = $_POST["month"];
    $day = $_POST["day"];
    $yr = $_POST["year"];
    $sex = $_POST["gender"];
    $mail = $_POST["mail"];


    $wrk = $_POST["wrk_place"];
    $un = $_POST["university"];
    $sc = $_POST["school"];
    $cu = $_POST["country"];


    $ct = $_POST["city"];
    $skills = $_POST["skil"];
    $ab = $_POST["about"];
    $des = $_POST["des"];
    if ($_FILES["img"]["name"] == "") {
        $imgfile = $_POST["img"];
        $q = "update add_profile set image='$imgfile',fname='$fn',lname='$ln',contact_no='$ph',sex='$sex',email='$mail',wrk_place='$wrk',university='$un',high_school='$sc',country='$cu',city='$ct',skills='$skills',about='$ab',description='$des' where reg_id='$id'";
        $q1 = mysql_query("update register set fname='$fn',lname='$ln',month='$mn',day='$day',year='$yr',country='$cu',email='$mail' where id='$id'");
        if (mysql_query($q)) {
            echo "<script>window.location.href='myprofile.php?uid=$id';alert('your profile updated!!')</script>";
        } else {
            echo "<script>alert('failed')</script>";
        }
    } else {
        $q = "update add_profile set image='$img',fname='$fn',lname='$ln',contact_no='$ph',sex='$sex',email='$mail',wrk_place='$wrk',university='$un',high_school='$sc',country='$cu',city='$ct',skills='$skills',about='$ab',description='$des' where reg_id='$id'";
        $q1 = mysql_query("update register set fname='$fn',lname='$ln',month='$mn',day='$day',year='$yr',country='$cu',email='$mail' where id='$id'");
        if (mysql_query($q)) {
            $q2 = mysql_query("insert into profile_pics(pics_id,reg_id,pics,status)values('',$id,'$img','0')");

            echo "<script>window.location.href='myprofile.php?uid=$id';alert('your profile updated!!')</script>";
        } else {
            echo "<script>alert('failed')</script>";
        }
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