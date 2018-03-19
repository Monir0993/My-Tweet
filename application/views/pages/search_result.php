<div class="mainbar">
    <div class="article">
        <h3 class="star"><span>&nbsp;Search Result</span></h3>
        <div class="clr"></div>
        
        <div class="col c1">

            <div class="row">
                <?php if ($friend_info == null) { ?>
                    <h3 class="text-capitalize" style="font-weight: bold">sorry couldn't find anything..</h3>
                    <p class="text-info">Looking for people? Try entering a name, or email address.</p>
                <?php } else { ?>
                    <?php
                    $message = $this->session->userdata('message');
                    $this->session->unset_userdata('message');
                    if ($message) {
                        ?>
                        <div class="col-md-8" style="margin-top: 5px; padding: 0px 15px; position: static; background-color: whitesmoke">
                            <div class="col-md-3" style="margin-left: -30px; position: static">
                                <a href="#" data-toggle="modal" data-target="#modal_photo"><img src="<?php echo base_url() . $friend_info->user_photo; ?>" width="200" height="200" alt="Profile Picture" /></a>
                                <div class="dropdown" style="margin-top: -50px; margin-left: 5px; position: absolute;">
                                    <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-xs" data-toggle="" title="Send Message"><i class="fa fa-envelope"></i>&nbsp;Message</a>
                                    <br/><a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Friend</a>

                                    <ul class="dropdown-menu" style="background-color: #b22222;">
                                        <li><a href="#" style="font-family: monospace; font-weight: bold">Unfriend</a></li>
                                        <li><a href="#" style="font-family: monospace; font-weight: bold">See Profile</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6" style="margin-left: 105px; margin-top: -10px; position: static">
                                <br/><a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $friend_info->user_id; ?>" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px"><?php echo $friend_info->user_name; ?></a>
                                <br/><span class="text-muted" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px">Age 23</span>
                                
                            </div>
                        </div>
                        <?php
                    } else {
                        foreach ($friend_info as $v_friend) {
                            ?>

                            <!--  Friend Info (1st div:- margin-left: 0px but next 2 div margin-left: 40px)  -->

                            <div class="col-md-8" style="margin-top: 5px; padding: 0px 15px; position: static; background-color: whitesmoke">
                                <div class="col-md-3" style="margin-left: -30px; position: static">
                                    <a href="#" data-toggle="modal" data-target="#modal_photo"><img src="<?php echo base_url() . $v_friend->user_photo; ?>" width="200" height="200" alt="Profile Picture" /></a>
                                    <div class="dropdown" style="margin-top: -50px; margin-left: 5px; position: absolute;">
                                        <a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-xs" data-toggle="" title="Send Message"><i class="fa fa-envelope"></i>&nbsp;Message</a>
                                        <br/><a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Friend</a>

                                        <ul class="dropdown-menu" style="background-color: #b22222;">
                                            <li><a href="#" style="font-family: monospace; font-weight: bold">Unfriend</a></li>
                                            <li><a href="#" style="font-family: monospace; font-weight: bold">See Profile</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6" style="margin-left: 105px; margin-top: -10px; position: static">
                                    <br/><a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $v_friend->user_id; ?>" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px"><?php echo $v_friend->user_name; ?></a>
                                    <br/><span class="text-muted" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px">Age 23</span>
                                    <br/><span class="text-muted text-center" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px">Your friend since October 09,2012</span>
                                </div>
                            </div>

                            <?php
                        }
                    }
                }
                ?>


            </div>
        </div>

    </div>





</div>