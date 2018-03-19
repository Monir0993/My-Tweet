<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo base_url(); ?>/user_asset/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/user_asset/css/custom.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/user_asset/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/user_asset/bootstrap/font-awesome-4.4.0/css/font-awesome.min.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/bootstrap/js/ajax_jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/jsjquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/jsscript.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/jscufon-yui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/jsarial.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/jscuf_run.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/js/jsval.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/js/country.js"></script>


        <script type="text/javascript">
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject(Msxml2.XMLHTTP);
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }

            function makerequest(given_text, objid, server_location, check_friend, check_friend_request, con_div_id) {
//                connection_button(check_friend, check_friend_request, con_div_id);

                if (given_text != '') {
                    serverpage = "<?php echo base_url(); ?>" + server_location + given_text;

                    xmlhttp.open('GET', serverpage);

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                            alert(xmlhttp.responseText);
                            document.getElementById(objid).innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.send(null);
                } else {
                    document.getElementById(objid).innerHTML = null;
                }


            }

            function insert_comment(post_id, user_id, objid, server_location, div_location) {
                var comment_description = document.getElementById(objid).value;
                if (comment_description != '') {
                    serverpage = "<?php echo base_url(); ?>" + server_location + post_id + '/' + user_id + '/' + comment_description;

                    xmlhttp.open('GET', serverpage);

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                            document.getElementById(div_location).innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.send(null);
                }
            }

            function insert_sub_comment(comment_id, user_id, objid, server_location, div_location) {

                var reply_description = document.getElementById(objid).value;
                if (reply_description != '') {
                    serverpage = "<?php echo base_url(); ?>" + server_location + comment_id + '/' + user_id + '/' + reply_description;

                    xmlhttp.open('GET', serverpage);

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById(div_location).innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.send(null);
                }
            }

            function insert_like(like_type_id, user_id, like_type, objid, server_location) {
                serverpage = "<?php echo base_url(); ?>" + server_location + like_type_id + '/' + user_id + '/' + like_type;

                xmlhttp.open('GET', serverpage);

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                            alert(xmlhttp.responseText);
                        document.getElementById(objid).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.send(null);
            }

            function connection_button(check_friend, check_friend_request, con_div_id) {
                serverpage = '<?php echo base_url(); ?>Search/connection_button/' + check_friend + '/' + check_friend_request;
                xmlhttp.open('GET', serverpage);

                xmlhttp.onreadystatechange = function () {

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById(con_div_id).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.send(null);
            }

            function connection(user_id, objid, server_location) {
                serverpage = '<?php echo base_url(); ?>' + server_location + user_id;
                xmlhttp.open('GET', serverpage);
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById(objid).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.send(null);
            }

            function set_photo_type(objid, val) {
                document.getElementById(objid).value = val;
            }

        </script>

        <!-- Javascript For Stick a div if scroll  -->

        <script type="text/javascript" src="<?php echo base_url(); ?>/user_asset/js/stick_div.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var s = $("#search_friend");
                var pos = s.position();

                $(window).scroll(function () {
                    var windowpos = $(window).scrollTop();
//		s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
                    if (windowpos >= pos.top) {
                        s.addClass("stick");
                    } else {
                        s.removeClass("stick");
                    }
                });
            });
        </script>


    </head>
    <body onload="makerequest('<?php echo $user_info->user_id; ?>', 'my_post', 'Post/my_post/', '<?php echo $check_friend; ?>', '<?php echo $check_friend_request; ?>', 'connection_div');">

        <?php
        if (isset($logout)) {
            echo $log_out_content;
        } else if (isset($sign_up)) {
            echo $sign_up_content;
        } else {
            ?>
            <div class="main">
                <div class="main_resize">
                    <div class="header">
                        <div class="clr"></div>
                        <nav class="navbar navbar-inverse navbar-fixed-top">
                            <div class="container">
                                <div class="row">
                                    <div class="navbar-header">
                                        <li><a href="<?php echo base_url(); ?>" class="btn navbar-brand" style="background-color: #b22222; color: white; font-weight: bold; font-family: monospace; border-radius: 5px 35px 0px 35px">My Tweet</a></li>
                                    </div>

                                    <div>
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
                                            <li><a href="<?php echo base_url(); ?>Welcome/home"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                                            <li>
                                                <form class="form-inline navbar-form">
                                                    <div class="dropdown">
                                                        <a title="Notification" class="btn btn-default dropdown-toggle" style="background-color: #b22222" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <i class="fa fa-bell-o"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                </form>

                                            </li>
                                            <li>
                                                <form class="form-inline navbar-form">
                                                    <div class="dropdown">
                                                        <a title="Message" class="btn btn-default dropdown-toggle" style="background-color: #b22222" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <i class="fa fa-envelope-o"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                </form>

                                            </li>
                                            <li>
                                                <form class="form-inline navbar-form">
                                                    <div class="dropdown">
                                                        <a title="Friend Request" class="btn btn-default dropdown-toggle" style="background-color: #b22222" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <i class="fa fa-user-plus"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                </form>

                                            </li>

                                        </ul>

                                        <ul class="nav navbar-nav">
                                            <li>
                                                <form action="<?php echo base_url(); ?>Search/search_friend" method="post" class="form-inline navbar-form">
                                                    <div class="input-group">
                                                        <input type="text" name="search_friend" onkeyup="makerequest(this.value, 'search_friend', 'Search/search_friend_by_name/');" class="form-control" id="search" placeholder="search" aria-describedby="basic-addon1" />
                                                        <span class="input-group-btn" id="basic-addon1"><button type="submit" class="btn btn-danger" style="background-color: #b22222; border: 2px solid #b22222"><i class="fa fa-search"></i></button></span>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>

                                        <ul class="nav navbar-nav navbar-right">
                                            <li>
                                                <form class="form-inline navbar-form">
                                                    <div class="dropdown">
                                                        <a title="Profile & Settings" class="btn btn-default dropdown-toggle" style="background-color: #b22222" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <i class="fa fa-map-marker"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="<?php echo base_url(); ?>Welcome/logout">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                </form>

                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="clr"></div>
                            </div>
                        </nav>
                        <?php if (isset($profile_page)) { ?>
                            <div class="col-md-4 list-group" id="search_friend" style="margin-top: -8px; margin-left: 420px; position: fixed;">
                            <?php } else { ?>
                                <div class="col-md-4 list-group" id="search_friend" style="margin-top: 52px; margin-left: 420px; position: fixed;">
                                <?php } ?>
                            </div>
                            <!-- Cover Photo -->
                            <?php if (isset($cover_photo)) { ?>
                                <div class="hbg">
                                    <?php if ($user_info->user_id == $this->session->userdata('user_id')) { ?>
                                        <div style="margin: 5px; position: absolute;"><a href="#" data-toggle="modal" data-target="#update_pic" onclick="set_photo_type('photo_type', 1);" title="Change Cover Photo"><i class="fa fa-edit"></i></a></div>
                                    <?php } ?>
                                    <a href="#" data-toggle="modal" data-target="#modal_photo">
                                        <?php if ($cover_picture) { ?>
                                            <img src="<?php echo base_url() . $cover_picture->user_photo; ?>" title="Cover Photo" width="923" height="291" alt="Profile Picture" />
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>/user_imge/cover_default.jpg" title="Cover Photo" width="923" height="291" alt="Profile Picture" />
                                        <?php } ?>
                                    </a>

                                    <div id="connection_div" class="dropdown" style="margin: 5px; margin-left: 720px; margin-top: -50px; position: absolute;">
                                        <?php if ($user_info->user_id == $this->session->userdata('user_id')) { ?>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: 50px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-edit"></i>&nbsp;Update Info</a>

                                        <?php } else if ($check_friend == 1) { ?>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: 20px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Friend</a>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>


                                            <ul class="dropdown-menu" style="background-color: #b22222; margin-left: 20px">
                                                <li><a onclick="connection('<?php echo $user_info->user_id; ?>', 'connection_div', 'Friend/unfriend/');" style="font-family: monospace; cursor: pointer; font-weight: bold; color: #999999">Unfriend</a></li>
                                                <li><a href="#" style="font-family: monospace; font-weight: bold; color: #999999">See Profile</a></li>
                                            </ul>
                                        <?php } else if ($check_rev_friend_request == 1) { ?>    
                                            <a onclick="connection('<?php echo $user_info->user_id; ?>', 'connection_div', 'Friend/confirm_friend_request/');" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: -40px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Confirm Request</a>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>

                                        <?php } else if ($check_friend_request == 1) { ?>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: -60px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Friend Request Sent</a>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>


                                            <ul class="dropdown-menu" style="background-color: #b22222; margin-left: -60px">
                                                <li><a onclick="connection('<?php echo $user_info->user_id; ?>', 'connection_div', 'Friend/cancel_friend_request/');" style="font-family: monospace; cursor: pointer; font-weight: bold; color: #999999">Cancel Request</a></li>
                                                <li><a href="#" style="font-family: monospace; font-weight: bold; color: #999999">See Profile</a></li>
                                            </ul>
                                        <?php } else { ?>
                                            <a onclick="connection('<?php echo $user_info->user_id; ?>', 'connection_div', 'Friend/add_friend/');" style="background-color: #b22222; cursor: pointer; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Add Friend</a>
                                            <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Profile Picture -->

                            <?php if (isset($profile_page)) { ?>
                                <div class="row">
                                    <div class="col-md-offset-1  profile_pic">

                                        <div class="imgcontainer">
                                            <?php if ($user_info->user_id == $this->session->userdata('user_id')) { ?>
                                                <div style="margin: 5px; position: absolute;"><a href="#" data-toggle="modal" data-target="#update_pic" onclick="set_photo_type('photo_type', 3);" title="Change Profile Picture"><i class="fa fa-edit"></i></a></div>
                                            <?php } ?>
                                            <a href="#" data-toggle="modal" data-target="#modal_photo" title="Profile Picture">
                                                <?php if ($profile_picture) { ?>

                                                    <img
                                                        src="<?php echo base_url() . $profile_picture->user_photo; ?>"
                                                        class="captioned img-responsive"
                                                        alt="Profile Picture"

                                                        style="height: 200px; width: 180px; border-radius: 10px" />

                                                <?php } else if ($user_info->user_sex == 'Male') { ?>

                                                    <img
                                                        src="<?php echo base_url(); ?>/user_imge/profile_default_male.jpg"
                                                        class="captioned img-responsive"
                                                        alt="Profile Picture"

                                                        style="height: 200px; width: 180px; border-radius: 10px" />
                                                    <?php } else { ?>

                                                    <img
                                                        src="<?php echo base_url(); ?>/user_imge/profile_default_fem.jpg"
                                                        class="captioned img-responsive"
                                                        alt="Profile Picture"

                                                        style="height: 200px; width: 180px; border-radius: 10px" />

                                                <?php } ?>
                                                <div class="caption"><?php echo $user_info->user_name; ?></div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="" style="margin-top: 60px">
                                            <a href="<?php echo base_url(); ?>" title="Profile Picture">
                                                <div class="imgcontainer">
                                                    <?php if ($profile_picture) { ?>
                                                        <img
                                                            src="<?php echo base_url() . $profile_picture->user_photo; ?>"
                                                            class="captioned img-responsive"
                                                            alt="Profile Picture"
                                                            title="Profile Picture" 
                                                            style="height: 100px; width: 100px; border-radius: 10px" />
                                                        <?php } else if ($user_info->user_sex == 'Male') { ?>
                                                        <img
                                                            src="<?php echo base_url(); ?>/user_imge/profile_default_male.jpg"
                                                            class="captioned img-responsive"
                                                            alt="Profile Picture"

                                                            style="height: 100px; width: 100px; border-radius: 10px" />
                                                        <?php } else { ?>

                                                        <img
                                                            src="<?php echo base_url(); ?>/user_imge/profile_default_fem.jpg"
                                                            class="captioned img-responsive"
                                                            alt="Profile Picture"

                                                            style="height: 100px; width: 100px; border-radius: 10px" />

                                                    <?php } ?>
                                                    <div class="caption1"><?php echo $user_info->user_name; ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="content" style="margin-top: <?php echo $content_class; ?>px">
                            <div class="content_bg">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="sidebar">
                                            <?php if (isset($timeline)) { ?>
                                                <div class="gadget">
                                                    <h3 class="star"><span></span></h3>
                                                    <div class="clr"></div>
                                                    <ul class="sb_menu">
                                                        <li class="active"><a href="<?php echo base_url(); ?>">Timeline</a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Welcome/about">About</a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Welcome/friend_list">Friends</a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Welcome/photo_gallery">Photos</a></li>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                            <!-- Friends On Chat -->

                                            <div class="gadget">
                                                <h4 class="star"><span>Friends on</span> Chat</h4>
                                                <div class="clr"></div>
                                                <ul class="sb_menu">
                                                    <li class=""><a href="#" onclick="func();"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class=""><a href="#" onclick=""><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class=""><a href="#" onclick=""><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class=""><a href="#" onclick=""><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class=""><a href="#" onclick=""><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class=""><a href="#" onclick=""><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class=""><a href="#" onclick=""><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="25" height="25" alt="Profile Picture" />&nbsp;&nbsp;Monir Ahmed</a></li>
                                                    <li class="">
                                                        <div class="input-group">
                                                            <input type="text" name="search_friend" onkeyup="" class="form-control" id="search" placeholder="search friend" aria-describedby="basic-addon1" />
                                                            <span class=""></span>
                                                        </div>
                                                    </li>
                                                    <li class="">

                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="gadget">
                                                <div id="chat" style="">

                                                </div>
                                            </div>

                                            <!--  All Photo List-->

                                            <div class="gadget">
                                                <a href="<?php echo base_url(); ?>/Welcome/photo_gallery" title="All Photo" style="text-decoration: none; color: #2828db"><h4 class="star"><span>&nbsp;Photos</span></h4></a>
                                                <div class="clr"></div>
                                                <div class="fbg">
                                                    <div class="col c1">

                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>
                                                        <a href="#"><img src="<?php echo base_url(); ?>/user_asset/images/pic_1.jpg" width="60" height="60" alt="Profile Picture" /></a>

                                                    </div>
                                                </div>

                                            </div>

                                            <!--  All Friends List-->

                                            <div class="gadget">
                                                <a href="#" title="All Friends" style="text-decoration: none; color: #2828db"><h4 class="star"><span>&nbsp;Friends(<?php echo $friend_count; ?>)</span></h4></a>
                                                <div class="clr"></div>
                                                <div class="fbg">
                                                    <div class="col c1">
                                                        <?php $count = 0; ?>
                                                        <?php foreach ($all_friend as $v_friend) { ?>
                                                            <?php
                                                            if ($count > 11) {
                                                                break;
                                                            }
                                                            if ($v_friend->user_id == $user_info->user_id) {
                                                                $friend_info = user_info_by_id($v_friend->friend_id);
                                                            } else {
                                                                $friend_info = user_info_by_id($v_friend->user_id);
                                                            }
                                                            $count++;
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $friend_info->user_id; ?>" title="<?php echo $friend_info->user_name; ?>" target="_blank"><img src="<?php echo base_url() . $friend_info->user_photo; ?>" width="60" height="60" alt="Profile Picture" /></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- Main Content -->
                                    <?php if (isset($profile_page)) { ?>
                                        <div id="my_post" style="position: static;" class="col-md-8">

                                        </div>
                                    <?php } else {
                                        ?>
                                        <div id="" style="position: static; margin-top: -100px" class="col-md-8">
                                            <?php echo $main_content; ?>
                                        </div>

                                    <?php } ?>
                                    <!--                                <div id="main_content">
                                                                    
                                                                    </div>
                                                                    
                                                                    <div id="main_content">
                                                                     
                                                                    </div>-->


                                </div>

                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="footer">
                    <div class="footer_resize">
                        <p class="lf">&copy; Copyright <a href="#">MyWebSite</a>.</p>
                        <p class="rf">Layout by Rocket <a href="http://www.rocketwebsitetemplates.com/">Website Templates</a></p>
                        <div class="clr"></div>
                    </div>
                </div>
                <div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div>

            <?php } ?>

    </body>
</html>