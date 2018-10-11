<?php
mysql_connect("localhost", "root","");
mysql_select_db('social_net_working_site');
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script/script.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body >
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
            <div class="container-fluid custom-container header1">
                <div class="row no_row row-header">
                    <div class="brand-be1">
                        <h1><label style="font-size: 30px; font-family: Comic Sans MS; color: white;margin-top:-9px"><b style="color:pink">W</b>Orld <b style="color:pink">L</b>ink</label></h1>
                    </div>
                    <div class="login-header-block">
                        <div class="login_block">
                            <a class="btn-login btn color-1 size-2 hover-2" href="login.php" ><i class="fa fa-user"></i>
                                Log in</a>
                        </div>	
                    </div>
                </div>
            </div>
        </header>
        <div class="head-bg">
            <div class="head-bg-img"></div>
            <div class="head-bg-content">
                <h1>Your Best Social Network Site</h1>
                <p>Donec in rhoncus tortor. Sed tristique auctor ligula vel viverra</p>
                <a class="btn color-1 size-1 hover-1" ><i class="fa fa-facebook"></i>sign up via WOrld Link</a>
                <a class="be-register btn color-3 size-1 hover-6"><i class="fa fa-lock"></i>sign up now</a>
            </div>	
        </div>
        <!-- MAIN CONTENT -->
        <!-- THE FOOTER -->
        <div class="large-popup login">
            <div class="large-popup-fixed"></div>
            <div class="container large-popup-container">
                <div class="row">
                    <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3  large-popup-content">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa fa-times close-button"></i>
                                <h5 class="large-popup-title">Log in</h5>
                            </div>
                            <form method="post" class="popup-input-search">
                                <div class="col-md-6">
                                    <input class="input-signtype" type="email" name="mail1" required="" placeholder="Your email">
                                </div>
                                <div class="col-md-6">
                                    <input class="input-signtype" type="password" name="pass1" required="" placeholder="Password">
                                </div>
                                <div class="col-xs-6">
                                    <div class="be-checkbox">
                                        <label class="check-box">
                                            <input class="checkbox-input" type="checkbox" value=""> <span class="check-box-sign"></span>
                                        </label>
                                        <span class="large-popup-text">
                                            Stay signed in
                                        </span>
                                    </div>
                                    <a href="blog-detail-2.html" class="link-large-popup">Forgot password?</a>
                                </div>
                                <div class="col-xs-6 for-signin">
                                    <input type="submit" class="be-popup-sign-button" name="f2"value="SIGN IN">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        session_start();
        if (isset($_POST["f2"])) {
            $em = $_POST["mail1"];
            $ps = $_POST["pass1"];
            $q = "select * from register where email='$em' and pass='$ps'";
            $qr = mysql_query("select * from add_profile where email='$em'");
            $res = mysql_query($q);
            if (mysql_num_rows($res) > 0) {
                $row = mysql_fetch_array($res);
                $id = $row["id"];
                $_SESSION["id"] = $id;
                if (mysql_num_rows($qr) > 0) {
                    header('location:user_home.php');
                } else {
                    header('location:add_profile.php');
                }
            } else {
                echo "<script>alert('invalid mail id and password')</script>";
            }
        }
        ?>
        <div class="large-popup register">
            <div class="large-popup-fixed"></div>
            <div class="container large-popup-container">
                <div class="row">
                    <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa fa-times close-button"></i>
                                <h5 class="large-popup-title">Register</h5>
                            </div>
                            <form method="post">
                                <div class="col-md-6">
                                    <input class="input-signtype" type="text" required="" name="fname" placeholder="First Name" >
                                </div>
                                <div class="col-md-6">
                                    <input class="input-signtype" type="text" required="" name="lname" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <div class="be-custom-select-block">
                                        <select class="be-custom-select"name="country" required="">
                                            <option value="" disabled selected>
                                                Country
                                            </option>
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
                                <div class="col-md-6">
                                    <input class="input-signtype" type="email" required="" name="mail" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input class="input-signtype" type="password" required="" name="pass" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <input class="input-signtype" type="password" required="" name="cpass" placeholder="Repeat Password">
                                </div>
                                <div class="col-md-12 be-date-block">
                                    <span class="large-popup-text">
                                        Date of birth
                                    </span>
                                    <div class="be-custom-select-block mounth">
                                        <select class="be-custom-select" name="month" required="">
                                            <option value="" disabled selected>
                                                Month
                                            </option>
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
                                            <option value="" disabled selected>
                                                Day
                                            </option>
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
                                            <option value="" disabled selected>
                                                Year
                                            </option>
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
                                <div class="col-md-6">
                                    <div class="be-checkbox">
                                        <label class="check-box">
                                            <input class="checkbox-input" type="checkbox" required="" value="" name="terms" required=""> <span class="check-box-sign"></span>
                                        </label>
                                        <span class="large-popup-text">
                                            I have read and agree to the <a class="be-popup-terms" href="#" >Terms of Use</a> and <a class="be-popup-terms" href="blog-detail-2.html">Privacy Policy</a>.
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 for-signin">
                                    <input type="submit" class="be-popup-sign-button" name="f1" value="SIGN UP">
                                </div>
                                <?php
                                if (isset($_POST["f1"])) {
                                    $fn = $_POST["fname"];
                                    $ln = $_POST["lname"];
                                    $cu = $_POST["country"];
                                    $email = $_POST["mail"];
                                    $ps = $_POST["pass"];
                                    $cps = $_POST["cpass"];
                                    $mn = $_POST["month"];
                                    $day = $_POST["day"];
                                    $yr = $_POST["year"];
                                    $query = "select * from register where email='$email'";
                                    $res = mysql_query($query);
                                    if (mysql_num_rows($res) > 0) {
                                        echo "<script>alert('Mail Id already exist!!')</script>";
                                    } else {
                                        $query1 = "select * from register";
                                        $res1 = mysql_query($query1);
                                        while ($row = mysql_fetch_array($res1)) {
                                            if ($row["email"] == $email && $row["pass"] == $ps) {
                                                echo "<script>alert('Mail Id and Password already exist!!')</script>";
                                            }
                                        }
                                        if($ps==$cps)
                                        {
                                        $q = "insert into register(fname,lname,country,email,pass,cpass,month,day,year)values('$fn','$ln','$cu','$email','$ps','$cps','$mn','$day','$yr')";
                                        if (mysql_query($q)) {
                                            echo "<script>window.location.href='home.php';alert('Successfully Registerd!!')</script>";
                                        } else {


                                            echo "<script>alert('failed')</script>";
                                        }
                                        }
 else {
     echo "<script>alert('Password missmatch...!!')</script>";
 }
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer_slider">
                <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="4" data-sm-slides="8" data-md-slides="14" data-lg-slides="19" data-add-slides="19">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide active" data-val="0">
                            <img class="img-responsive img-full" src="img/f1.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="1">
                            <img class="img-responsive img-full" src="img/f2.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="2">
                            <img class="img-responsive img-full" src="img/f3.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="3">
                            <img class="img-responsive img-full" src="img/f4.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="4">
                            <img class="img-responsive img-full" src="img/f5.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="5">
                            <img class="img-responsive img-full" src="img/f6.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="6">
                            <img class="img-responsive img-full" src="img/f7.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="7">
                            <a href="gallery.html">
                                <img class="img-responsive img-full" src="img/f8.jpg" alt="">
                            </a></div>
                        <div class="swiper-slide" data-val="8">
                            <img class="img-responsive img-full" src="img/f9.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="9">
                            <img class="img-responsive img-full" src="img/f10.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="10">
                            <img class="img-responsive img-full" src="img/f11.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="11">
                            <img class="img-responsive img-full" src="img/f12.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="12">
                            <img class="img-responsive img-full" src="img/f13.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="13">
                            <img class="img-responsive img-full" src="img/f14.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="14">
                            <a href="gallery.html">
                                <img class="img-responsive img-full" src="img/f15.jpg" alt="">
                            </a></div>
                        <div class="swiper-slide" data-val="15">
                            <img class="img-responsive img-full" src="img/f16.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="16">
                            <img class="img-responsive img-full" src="img/f17.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="17">
                            <img class="img-responsive img-full" src="img/f18.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="18">
                            <a href="gallery.html">
                                <img class="img-responsive img-full" src="img/f19.jpg" alt="">
                            </a></div>
                        <div class="swiper-slide" data-val="19">
                            <img class="img-responsive img-full" src="img/f1.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="20">
                            <a href="gallery.html">
                                <img class="img-responsive img-full" src="img/f2.jpg" alt="">
                            </a></div>
                        <div class="swiper-slide" data-val="21">
                            <img class="img-responsive img-full" src="img/f3.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="22">
                            <img class="img-responsive img-full" src="img/f4.jpg" alt="">
                        </div>
                        <div class="swiper-slide" data-val="23">
                            <img class="img-responsive img-full" src="img/f5.jpg" alt="">
                        </div>
                    </div>
                    <div class="pagination hidden"></div>
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
            <!-- SCRIPTS	 -->
            <script src="script/jquery-2.1.4.min.js"></script>
            <script src="script/jquery-ui.min.js"></script>
            <script src="script/bootstrap.min.js"></script>		
            <script src="script/idangerous.swiper.min.js"></script>
            <script src="script/jquery.mixitup.js"></script>
            <script src="script/jquery.viewportchecker.min.js"></script>
            <script src="script/filters.js"></script>
            <script src="script/global.js"></script>
    </body>
    <!-- Mirrored from demo.nrgthemes.com/projects/nrgnetwork/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 14:46:29 GMT -->
</html>