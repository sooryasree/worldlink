<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<style type="text/css">
    #chatbox{
        display: none;
        position:relative;;
        border-radius: 10px;
        background: #FFF;
        width:160px;
        height: 100px;
        max-height: 300px;
        z-index: 10;
        margin-left: 20px;
        margin-top: 370px;
        margin-bottom: 120px;
    }
    #chatboxes{
        display: none;
        position:relative;;
        border-radius: 10px;
        background: #FFF;
        width:160px;
        height: 100px;
        max-height: 300px;
        z-index: 10;
        margin-left: 20px;
    }
    #ser{
        display: none;
    }
</style>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script/script.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            function like()
            {
                var postid = document.getElementById('pid').value;
                var usrid = document.getElementById("usrid").value;
                $.get('ajax/likes.php', {pstid: postid, urid: usrid}, function (data)
                {
                    $('#like').html(data);
                });
            }
//            function add_post() {
//                var input = document.getElementById("file");
//                file = input.files[0];
//                if (file != undefined) {
//                    formData = new FormData();
//                    if (!file.type.match(/image.*/)) {
//                        formData.append("image", file);
//                    }
//
//                    alert(formData);
//                    var cmt = document.getElementById('comment').value;
//
//                    $.get('ajax/posts.php', {commnt: cmt}, function (data)
//                    {
//
//                        document.getElementById('cmt_post').value = data;
//
////                   $("#img").html(data);
//                    })
//                }
        </script>
        <script>
//                if (formdata) {
//                    $.ajax({
//                        url: "ajax/upload.php",
//                        type: "POST",
//                        data: formdata,
//                        processData: false,
//                        contentType: false,
//                        success: function (res) {
//                            document.getElementById("response").innerHTML = res;
//                        }
//                    });
//                }
        </script>
        <script type="text/javascript">
//                $(document).ready(function () {
//// Function for Preview Image.
//                    $(function () {
//                        $(":file").change(function () {
//                            if (this.files && this.files[0]) {
//                                var reader = new FileReader();
//                                reader.onload = imageIsLoaded;
//                                reader.readAsDataURL(this.files[0]);
//                            }
//                        });
//                    });
//                    function imageIsLoaded(e) {
//                        $('#message').css("display", "none");
//                        $('#preview').css("display", "block");
//                        $('#previewimg').attr('src', e.target.result);
//                    }
//                    ;
//// Function for Deleting Preview Image.
//                    $("#deleteimg").click(function () {
//                        $('#preview').css("display", "none");
//                        $('#file').val("");
//                    });
//                });

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
    <body >
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $q = "delete from posts where pid=$id";
            mysql_query($q);
            echo "<script>window.location.href='user_home.php';alert('Your Status Deleted')</script>";
        } else {
            
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
                    <center><div class="col-md-7">
                            <div id="container-mix"  class="row _post-container_">
                                <div class="tab-wrapper style-1">

                                    <?php
                                    $pid = $_GET["pid"];
//                                    $res=  mysql_query("SELECT * FROM posts INNER JOIN friend_request ON friend_request.frnd_id = posts.user_id WHERE friend_request.user_id ={$_SESSION['id']} AND friend_request.status ='Friends'");
                                    $res=  mysql_query("select * from  add_profile join posts on add_profile.reg_id=posts.user_id where posts.pid=$pid");
                                    while ($row1 = mysql_fetch_array($res)) {
                                        if ($row1["user_id"] == $_SESSION['id']) {
                                            ?>
                                            <br/><br/> <div class="col-lg-7">
                                                <div class="be-post">
                                                    <input type="hidden" id="usrid" name="usrid" value="<?php echo $row1["user_id"] ?>">
                                                    <input type="hidden" id="pid" name="pid" value="<?php echo $row1["pid"] ?>">
                                                    <div style="float: left">   <img class="login-user" src="img/<?php echo $row1["image"] ?>" height="40px" width="40px"> <b><a href="myprofile.php?uid=<?php echo $row1["user_id"] ?>"><?php echo $row1["fname"] . " " . $row1["lname"] ?></a></b> Updated his status...<?php // echo date("h:i:sa");                 ?></div><br/><br/><br>
                                                    <b style="float: left"><?php
                                                        echo $row1["comment"];
                                                        ?></b><br> <br> 
                                                    <?php
                                                    if ($row1["img_file"] == "") {
                                                        ?>
                                                        <a href="user_home.php" class="be-img-block" id="img">

                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="#" class="be-img-block" id="img">
                                                            <img src="upload/<?php echo $row1["img_file"] ?>" alt="omg">
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <div class="author-post">
                                                        <img src="img/a1.png" alt="" class="ava-author">
                                                        <span>by <a href="user_home.php">World Link</a></span>
                                                    </div>
                                                    <div class="info-block">
                                                        <span id="like"><i class="fa fa-thumbs-o-up" onclick="like()"></i></span>
                                                        <?php $res=mysql_query("select count(cmt_id) from comments where post_id=$pid");
                                                        $r=mysql_fetch_array($res)
                                                        ?>
                                                        <span><i class="fa fa-comment-o"></i><?php echo $r[0]?></span>
                                                        <span><a href="user_home.php?id=<?php echo $row1["pid"] ?>"><i class="glyphicon glyphicon-trash" style="color:darkgray"></i></a></span>
                                                    </div>
                                                    <div class="author-post" style="float: left;height: auto">
                                                        <?php
                                                        $q3 = mysql_query("select * from comments inner join add_profile on comments.uid=add_profile.reg_id where comments.post_id=$pid");
                                                        while ($row3 = mysql_fetch_array($q3)) {
                                                            ?>

                                                            <img src="img/<?php echo $row3["image"] ?>" alt="" class="ava-author">
                                                            <span>by <a href="#"><?php echo $row3["fname"] . " " . $row3["lname"]; ?></a></span>

                                                            <?php echo $row3["comment"]; ?>
                                                            <hr>

                                                            <?php
                                                        }
                                                        ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="col-lg-7" >
                                                <div class="be-post">
                                                    <input type="hidden" name="usrid" id="usrid" value="<?php echo $row1["user_id"] ?>">
                                                    <input type="hidden" id="pid" name="pid" value="<?php echo $row1["pid"] ?>">
                                                    <div style="float: left">   <img class="login-user" src="img/<?php echo $row1["image"] ?>" height="40px" width="40px"> <b><a href="myprofile.php?uid=<?php echo $row1["user_id"] ?>"><?php echo $row1["fname"] . " " . $row1["lname"] ?></a></b> Updated his status...<?php // echo date("h:i:sa");               ?></div><br/><br/><br>
                                                    <b style="float: left"><?php
                                                        echo $row1["comment"];
                                                        ?></b><br> <br> 
                                                    <?php
                                                    if ($row1["img_file"] == "") {
                                                        ?>
                                                        <a href="#" class="be-img-block" id="img">

                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="#" class="be-img-block" id="img">
                                                            <img src="upload/<?php echo $row1["img_file"] ?>" alt="omg">
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <div class="author-post">
                                                        <img src="img/a1.png" alt="" class="ava-author">
                                                        <span>by <a href="user_home.php">World Link</a></span>
                                                    </div>
                                                    <div class="info-block">
                                                        <span id="like"><i class="fa fa-thumbs-o-up" onclick="like()"></i></span>
                                                       <?php $res=mysql_query("select count(cmt_id) from comments where post_id=$pid");
                                                        $r=mysql_fetch_array($res)
                                                        ?>
                                                        <span><i class="fa fa-comment-o"></i><?php echo $r[0]?></span>
                                                    </div>
                                                    <div class="author-post" style="float: left;height: auto">
                                                        <?php
                                                        $q3 = mysql_query("select * from comments inner join add_profile on comments.uid=add_profile.reg_id where comments.post_id=$pid");
                                                        while ($row3 = mysql_fetch_array($q3)) {
                                                            ?>

                                                            <img src="img/<?php echo $row3["image"] ?>" alt="" class="ava-author">
                                                            <span>by <a href="#"><?php echo $row3["fname"] . " " . $row3["lname"]; ?></a></span>

                                                            <?php echo $row3["comment"]; ?>
                                                            <hr>

                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <form action="" enctype="multipart/form-data" id="form" method="post" name="form">

                                <!--                                        <div  class="nav-tab  clearfix">                      
                                                                            <div class="nav-tab-item">
                                
                                                                                <li ><a href="#"><i class="fa fa-cloud-upload"></i></a><input class="file" type="file" name="file"/>Upload Images</li>
                                                                      
                                                                            </div>
                                                                        </div><br><br>-->
                                <div class="col-lg-7">
                                    <center><div class="">
                                        <img class="login-user" src="img/<?php echo $row["image"] ?>" height="30px" width="30px" style="border-radius:50%;">&nbsp;<textarea id="comment" name="comment" rows="" cols="2px" style="width: 428px;border-radius: 14px" placeholder=" <?php ?>Write a comment....."></textarea>
                                        <!--                                                <div class="tab-nav-wrapper">
                                                                                         
                                                                                        </div>-->
                                        </div></center>
                                </div>
                                <div class="col-lg-7" style="width:70.333333% !important;">


                                    <div id="clear"></div>
                                    <div id="preview" style="height:180px; width:180px;text-align:center;margin:20px;display:none;">
                                        <img id="previewimg" src="" style="height:140px;width:140px;float:left;padding:8px;border:1px solid #e4d3c3;margin-bottom:5px"><img id="deleteimg" src="abc.png"> 
                                    </div>

                                    <input type="submit" value="Post" style="background-color: #0097b9;float: left;color: white;width: 100px;margin-bottom: 30px" name="submit" onclick="add_post()"><br/><br>

                                </div><br/><br/>
                                <?php
                                if (isset($_POST["submit"])) {
                                    $cmnt = $_POST["comment"];
                                    $pid = $_GET["pid"];
                                    $id = $_SESSION["id"];

                                    if(mysql_query("insert into comments(cmt_id,post_id,uid,comment,status) values('','$pid','$id','$cmnt','1')"))
                                    {
                                        echo "<script>window.location.href='comments.php?pid=$pid';</script>"; 
                                    }
                                }
                                ?>
                            </form>
                        </div></center>
                 <div class="col-md-2 right-feild">
                        <div id="onlineuser"></div>
                        <div id="on" name="response" style="float: right;margin-top: 10px;width: 70%;">
                            <table id="tbl"  width="250px" style="border-radius: 5px;margin-top: 10px;float: right;margin-right: 5px;">

                            </table>
                        </div>


                        <div id="seruser"></div>
                        <div id="ser" name="response" style="margin-top: 10px;width: 70%;margin-right: 200px;">
                            <table id="sertbl"  width="250px" style="border-radius: 5px;margin-top: 10px;;margin-right:200px;">

                            </table>
                        </div>

                        <form method="post" id="myform">
                            <div id="chatbox" class="terminal" style="width: 260px;">
                                <input type="text"  name="hid" id="dn" style="width:240px;border-radius:5px;text-align:center;margin-bottom: 10px;" disabled/>
                                <a onclick="list.ok()" style="color:red;font-weight: bold;background:#d3d3d3;width:10px;float: left;">X</a>
                                <textarea style="width:260px;height:220px;border-radius:2px;" id="result" disabled>
                                </textarea>
                                <br>
                                <input type="hidden"  name="hid" id="res"/>
                                <textarea style="vertical-align:bottom;width:260px;" name="msgs" id="box"></textarea>
                                <input type="submit" id="sub" value="SEND" style="width:260px;"/>
                            </div>
                        </form>

                        <form method="post" id="myforms">
                            <div id="chatboxes" class="terminal" style="width: 260px;">
                                <textarea style="width:260px;height:220px;border-radius:2px;" id="results" disabled>
                                </textarea>
                                <br>
                                <input type="hidden"  name="hid" id="ress"/>
                                <textarea style="vertical-align:bottom;width:260px;" name="msgs" id="boxs"></textarea>
                                <input type="submit" id="subs" value="SEND" style="width:260px;"/>
                            </div>
                        </form>



                        <div class="be-vidget">
<!--                            <div class="be-drop-down" style="margin-top: 400px;">
                                <h4>Contacts</h4>
                            </div>-->
                            <?php
//                            $q2 = "select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$id and friend_request.user_id!=$id and friend_request.status='Friends'";
//                            $res2 = mysql_query($q2);
//                            while ($row2 = mysql_fetch_array($res2)) {
//                                ?>
<!--                                <div>
                                    <h3 class="letf-menu-article">
                                        <img class="login-user" src="img///<?php //echo $row2["image"] ?>" height="40px" width="40px">

                                        <a href="#" style="color:black"> //<?php //echo $row2["fname"] . ' ' . $row2["lname"] ?></a>
                                    </h3>
                                </div>-->
                                <?php
//                            }
                            ?>

                            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                            <script>
                                    $(document).ready(function (e)
                                    {
                                        $("#sub").click(function (event)
                                        {
                                            event.preventDefault();
                                            $.ajax({
                                                type: "post",
                                                url: "insert.php",
                                                data: $("#myform").serialize(),
                                                success: function (response)
                                                {
                                                    $('#box').val("");
                                                    $('#chatbox').show();
                                                    $("#result").html(response)
                                                }
                                            });
                                        });
                                    });
                            </script>
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                            <script type="application/javascript">

                                $(document).ready(function(e)
                                {


                                var nams=function()
                                { $.ajax({
                                url: 'sonline.php',
                                type: "POST",
                                datType:'html',
                                success: function (response)
                                {

                                $("#tbl").html(response);

                                }

                                });
                                }

                                setInterval(nams,300);                   });
                            </script>

                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                            <script type="application/javascript">

                                function chat(k,p)
                                {
                                var test =k;
                                if(window.myInterval!=undefined&&window.myInterval!='undefined'){
                                clearInterval(window.myInterval);
                                }
                                $("#chatbox").show();
                                li.oks();
                                var call=function(){$.ajax({
                                url: 'chats.php',
                                type: "POST",
                                data: {val:test},
                                datType:'html',
                                success: function (response)
                                {

                                $("#res").val(k);
                                $("#dn").val(p);
                                $("#result").html(response);

                                }

                                });
                                }
                                window.myInterval=setInterval(call,300)
                                };

                                function chatObj()
                                {
                                this.ok = function(){
                                document.getElementById('chatbox').style.display = "none";
                                document.getElementById('chatbox').style.display = "none";
                                }
                                }
                                var list = new chatObj();


                            </script>
                            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                            <script>
                                    $(document).ready(function (e)
                                    {

                                        $("#but").click(function (event)
                                        {
                                            event.preventDefault();
                                            $("#ser").show();
                                            $.ajax({
                                                type: "post",
                                                url: "chat_page.php",
                                                data: $("#newform").serialize(),
                                                success: function (response)
                                                {
                                                    $("#sertbl").html(response);
                                                }
                                            });
                                        });
                                    });
                                    function chating(k, p)
                                    {
                                        var test = k;

                                        $("#chatboxes").show();
                                        list.ok();
                                        var calls = function () {
                                            $.ajax({
                                                url: 'chats.php',
                                                type: "POST",
                                                data: {val: test},
                                                datType: 'html',
                                                success: function (response)
                                                {

                                                    $("#ress").val(k);
                                                    $("#results").html(response);

                                                }

                                            });
                                        }
                                    }
                                    ;

                                    $(document).ready(function (e)
                                    {
                                        $("#subs").click(function (event)
                                        {
                                            event.preventDefault();
                                            $.ajax({
                                                type: "post",
                                                url: "insert.php",
                                                data: $("#myforms").serialize(),
                                                success: function (response)
                                                {
                                                    $('#boxs').val("");
                                                    $('#chatboxes').show();
                                                    $("#results").html(response)
                                                }
                                            });
                                        });
                                    });

                                    function chatOb()
                                    {
                                        this.oks = function () {
                                            document.getElementById('ser').style.display = "none";
                                            document.getElementById('chatboxes').style.display = "none";
                                        }
                                    }
                                    var li = new chatOb();
                            </script>               


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
                    <div class="entry s-color active color11"  data-colour="style/style-oranges.css"></div> 
                    <div class="entry s-color active color12"  data-colour="style/style-greens.css"></div>
                    <div class="entry s-color active color13"  data-colour="style/style-reds.css"></div>
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
        <script src="script/jquery.viewportchecker.min.js"></script>
        <script src="script/filters.js"></script>
        <script src="script/global.js"></script>
    </body>
</html>