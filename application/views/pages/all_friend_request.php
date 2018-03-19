<a title="Friend Request" onclick="friend_request('<?php echo $user_id; ?>', 'friend_request', 'Friend/all_friend_request/');" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="background-color: #b22222" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <i class="fa fa-user-plus">(<?php echo $friend_request_count; ?>)</i>
</a>
<div class="dropdown-menu list-group" id="request_list" style="width: 250px; margin: 0px; padding: 0px" aria-labelledby="dropdownMenu1">
    <?php foreach ($friend_request as $v_request) { ?>
        <?php
        $request_user_info = user_info_by_id($v_request->requested_user_id);
        ?>
    <a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $request_user_info->user_id; ?>" class="list-group-item list-group-item-warning" style="color: black"><img src="<?php echo base_url() . $request_user_info->user_photo; ?>" style="height: 25px; width: 25px" alt="My Tweet" />&nbsp;<?php echo $request_user_info->user_name; ?></a>
    <button type="button" onclick="connection('<?php echo $request_user_info->user_id; ?>','friend_request','Friend/confirm_friend_from_navbar/');" style="margin-left: 45px; color: black; font-family: monospace; font-weight: bolder" title="confirm <?php echo $request_user_info->user_name; ?>">confirm</button>
    <button type="button" onclick="connection('<?php echo $request_user_info->user_id; ?>','friend_request','Friend/not_now_friend/');" style="margin-left: 2px; color: black; font-family: monospace; font-weight: bolder" title="not now <?php echo $request_user_info->user_name; ?>">not now</button>
        <?php } ?>
    <hr/><a href="<?php echo base_url(); ?>Search/friend_request_list" style="color: blue; margin-left: 95px">See All</a>
</div>

