<div class="mainbar">
    <div class="article">
        <h3 class="star"><span>&nbsp;All Friend List</span></h3>
        <div class="clr"></div>

        <div class="col c1">

            <div class="row">
                <?php if (!$all_friend) { ?>
                    <h3 class="text-capitalize" style="font-weight: bold">There is no friend request for you..</h3>
                <?php } else { ?>
                    <?php foreach ($all_friend as $v_friend) { ?>
                        <?php
                        if ($v_friend->user_id == $this->session->userdata('user_id')) {
                            $friend_info = user_info_by_id($v_friend->friend_id);
                        } else {
                            $friend_info = user_info_by_id($v_friend->user_id);
                        }
                        ?>
                        <div class="col-md-8" style="margin-top: 5px; padding: 0px 15px; position: static; background-color: whitesmoke">
                            <div class="col-md-3" style="margin-left: -30px; position: static">
                                <a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $friend_info->user_id; ?>"><img src="<?php echo base_url() . $friend_info->user_photo; ?>" width="200" height="200" alt="Profile Picture" /></a>
                                <div class="dropdown" style="margin-top: -50px; margin-left: 5px; position: absolute;">

                                    <br/><a onclick="" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-top: -35px" class="btn btn-default btn-xs" title=""><i class="fa fa-envelope"></i>&nbsp;Message</a>
                                    <br/><a style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-top: -15px" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-user-plus"></i>&nbsp;Friend</a>
                                    <ul class="dropdown-menu" style="background-color: #b22222;">
                                        <li><a onclick="connection('<?php echo $friend_info->user_id; ?>', 'my_post_1', 'Friend/unfriend_from_list_page/');" style="font-family: monospace; cursor: pointer; font-weight: bold">Unfriend</a></li>
                                        <li><a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $friend_info->user_id; ?>" style="font-family: monospace; font-weight: bold">See Profile</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6" style="margin-left: 105px; margin-top: -10px; position: static">
                                <br/><a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $friend_info->user_id; ?>" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px"><?php echo $friend_info->user_name; ?></a>
                                <br/><span class="text-muted" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px">Age 23</span>
                                <br/><span class="text-muted text-center" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px"><?php echo date('M j Y g:i A', strtotime($v_friend->friend_since)); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--  Friend Info (1st div:- margin-left: 0px but next 2 div margin-left: 40px)  -->




            </div>
        </div>

    </div>
</div>