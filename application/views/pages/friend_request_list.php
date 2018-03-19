<div class="mainbar">
    <div class="article">
        <h3 class="star"><span>&nbsp;All Friend Request</span></h3>
        <div class="clr"></div>

        <div class="col c1">

            <div class="row">
                <?php if (!$friend_request) { ?>
                    <h3 class="text-capitalize" style="font-weight: bold">There is no friend request for you..</h3>
                <?php }else{ ?>
                    <?php foreach ($friend_request as $v_request) { ?>
                        <?php
                        $request_user_info = user_info_by_id($v_request->requested_user_id);
                        ?>
                        <div class="col-md-8" style="margin-top: 5px; padding: 0px 15px; position: static; background-color: whitesmoke">
                            <div class="col-md-3" style="margin-left: -30px; position: static">
                                <a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $request_user_info->user_id; ?>"><img src="<?php echo base_url() . $request_user_info->user_photo; ?>" width="200" height="200" alt="Profile Picture" /></a>
                                <div class="dropdown" style="margin-top: -50px; margin-left: 5px; position: absolute;">

                                    <br/><a onclick="connection('<?php echo $request_user_info->user_id; ?>', 'my_post_1', 'Friend/confirm_friend_from_list_page/');" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-xs" title="Confirm <?php echo $request_user_info->user_name; ?>"><i class="fa fa-user-plus"></i>&nbsp;confirm</a>

                                </div>
                            </div>

                            <div class="col-md-6" style="margin-left: 105px; margin-top: -10px; position: static">
                                <br/><a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $request_user_info->user_id; ?>" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px"><?php echo $request_user_info->user_name; ?></a>
                                <br/><span class="text-muted" style="margin-left: 0px; font-family: monospace; font-weight: bolder; font-size: 14px">Age 23</span>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--  Friend Info (1st div:- margin-left: 0px but next 2 div margin-left: 40px)  -->




            </div>
        </div>

    </div>
</div>