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

            function makerequest(given_text, objid, server_location) {
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

            function insert_like(like_type_id, user_id, like_type, objid, server_location, page_location) {
                serverpage = "<?php echo base_url(); ?>" + server_location + like_type_id + '/' + user_id + '/' + like_type + '/' + page_location;

                xmlhttp.open('GET', serverpage);

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                            alert(xmlhttp.responseText);
                        document.getElementById(objid).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.send(null);
            }

            function friend_request(user_id, objid, server_location) {
                serverpage = "<?php echo base_url(); ?>" + server_location + user_id;

                xmlhttp.open('GET', serverpage);

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                            alert(xmlhttp.responseText);
                        document.getElementById(objid).innerHTML = xmlhttp.responseText;
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

            function set_div_id(new_id, old_id) {

                document.getElementById(old_id).setAttribute("id", 'com' + new_id);
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
    <body onload="makerequest('<?php echo $this->session->userdata('user_id'); ?>', 'my_post', 'Post/my_post/');">

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
                                            <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . $profile_picture->user_photo; ?>" style="height: 20px; width: 20px" />&nbsp;<?php echo $user_info->user_name; ?></a></li>
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
                                                    <div class="dropdown" id="friend_request">
                                                        <a title="Friend Request" onclick="friend_request('<?php echo $user_info->user_id; ?>', 'friend_request', 'Friend/all_friend_request/');" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="background-color: #b22222" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <i class="fa fa-user-plus">(<?php echo $friend_request_count; ?>)</i>
                                                        </a>
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
                                <div class="col-md-4 list-group" id="search_friend" style="margin-top: 52px; margin-left: 420px; position: fixed;"></div>
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
                                <div class="dropdown" style="margin: 5px; margin-left: 720px; margin-top: -50px; position: absolute;">
        <!--                                        <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Add Friend</a>
                                    <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>


                                    <ul class="dropdown-menu" style="background-color: #b22222;">
                                        <li><a href="#" style="font-family: monospace; font-weight: bold; color: #999999">Cancel Request</a></li>
                                        <li><a href="#" style="font-family: monospace; font-weight: bold; color: #999999">See Profile</a></li>
                                    </ul>-->
                                    <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: 50px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-edit"></i>&nbsp;Update Info</a>
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
                                            <a href="<?php echo base_url(); ?>Friend/all_friend_list/<?php echo $user_info->user_id; ?>" title="All Friends" style="text-decoration: none; color: #2828db"><h4 class="star"><span>&nbsp;Friends(<?php echo $friend_count; ?>)</span></h4></a>
                                            <div class="clr"></div>
                                            <div class="fbg">
                                                <div class="col c1">
                                                    <?php $count = 0; ?>
                                                    <?php foreach ($all_friend as $v_friend) { ?>
                                                        <?php
                                                        if ($count > 11) {
                                                            break;
                                                        }
                                                        if ($v_friend->user_id == $this->session->userdata('user_id')) {
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
                                    <div id="my_post_1" style="position: static; margin-top: -100px" class="col-md-8">
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
                        <!--                                modal content(upload picture)            -->
                        <div class="article">
                            <div class="modal fade" id="update_pic">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="article">
                                                        <form action="<?php echo base_url(); ?>Post/upload_picture" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                                                            <hr />
                                                            <h5></h5>
                                                            <br />

                                                            <div class="form-group">
                                                                <label>Upload Picture..</label>
                                                                <input type="file" name="user_photo" />
                                                                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
                                                                <input type="hidden" name="photo_type" id="photo_type" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Description..</label>
                                                                <textarea id="message" placeholder="Write Something !!" name="post_description" class="form-control" rows="5" cols="50"></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <select name="privacy_status" required exclude=" ">
                                                                    <option value=" ">Select Privacy</option>
                                                                    <option value="1"><i class="fa fa-lock"></i>Public</option>
                                                                    <option value="2">Friends</option>
                                                                    <option value="3">Only Me</option>
                                                                </select>
                                                            </div>

                                                            <h5 style="font-weight: bolder; color: red">
                                                                <?php
                                                                $exception = $this->session->userdata('exception');
                                                                if ($exception) {
                                                                    echo $exception;
                                                                    $this->session->unset_userdata('exception');
                                                                }
                                                                ?>
                                                            </h5>
                                                            <input type="submit" id="sbtn" class="btn btn-primary" value="Upload">
                                                                <hr />

                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button  data-dismiss="modal" style="background-color: #78bbe6"><i class="fa fa-close"></i></button>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--  Modal Content (Picture)  -->


                        <div class="article">
                            <div class="modal fade" id="modal_photo">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-12">

                                                    <img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="570" height="570" alt="Profile Picture" />


                                                </div>
                                                <div class="col-md-12">


                                                    <div class="article">
                                                        <a href="#" style="text-decoration: none; color: #622c2c"><h3><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="40" height="40" alt="Profile Picture" /><span>&nbsp;Jannatun Nayeem</span></h3></a>
                                                        <div class="clr"></div>
                                                        <p class="post-data"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a></p>

                                                        <p>This is a free CSS website template by RocketWebsiteTemplates.com. This work is distributed under the <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a>, which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>

                                                        <p class=""><a href="#">Alamin Mia,</a><a href="#">Sakhawat Hossain,</a><a href="#">Jannatun Nayeem</a> & <a href="#">80 more people</a> like this</p>
                                                        <p class="spec"><a href="#" data-toggle="collapse" data-target="#comment" class=""><i class="fa fa-comment"></i>&nbsp;Comments (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like</a></p>
                                                        <div class="clr"></div>
                                                        <div id="comment" class="collapse" style="background-color: #fbf5ff; padding: 10px">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                    <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                    <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                    <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment3" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>

                                                                    <!-- Sub Comments  -->

                                                                    <div id="sub_comment3" class="collapse" style="margin-left: 40px; background-color: #eeecec; padding: 10px">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                                <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                                <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                                <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                                <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                                <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                                <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                                <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                                <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                                <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form action="" method="">
                                                                                    <div class="form-group">
                                                                                        <label for="user_reply">Reply</label>
                                                                                        <textarea name="user_comment" placeholder="Write..." id="user_comment" class="form-control" rows="2"></textarea>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="submit" name="btn_submit" class="pull-right btn btn-info" value="Enter" style="border-radius: 0px 35px 0 35px; border: 1px solid #78bbe6; background-color: #78bbe6" >
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                    <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                    <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                    <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                    <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                    <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                    <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url(); ?>/user_asset/img/Kumu2.jpg" width="30" height="30" alt="Profile Picture" />&nbsp;Jannatun Nayeem</a>
                                                                    <br/><span class="date" style="margin-left: 35px; color:#78bbe6 ">March 16, 2018</span> 
                                                                    <p style="margin-left: 35px"><span class="date">March 16, 2018</span> &nbsp;|&nbsp; Posted by <a href="#">Owner</a> &nbsp;|&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a>which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to RocketWebsiteTemplates.com.</p>
                                                                    <p class="spec" style="margin-left: 35px"><a href="#" data-toggle="collapse" data-target="#sub_comment" class=""><i class="fa fa-comment"></i>&nbsp;Replay (3)</a> <a href="#" class=""><i class="fa fa-thumbs-up"></i>&nbsp;Like (3)</a></p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="" method="">
                                                                        <div class="form-group">
                                                                            <label for="user_comment">Comment</label>
                                                                            <textarea name="user_comment" placeholder="Write..." id="user_comment" class="form-control" rows="2"></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <input type="submit" name="btn_submit" class="pull-right btn btn-info" value="Enter" style="border-radius: 0px 35px 0 35px; border: 1px solid #78bbe6; background-color: #78bbe6" >
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button  data-dismiss="modal" style="background-color: #78bbe6"><i class="fa fa-close"></i></button>
                                        </div>


                                    </div>
                                </div>
                            </div>

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