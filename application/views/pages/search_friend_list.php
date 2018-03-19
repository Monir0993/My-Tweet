
<?php foreach($friend_info as $v_friend){ ?>
<a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $v_friend->user_id; ?>" class="list-group-item" style="color: #000000; font-family: monospace; font-weight: bolder"><img src="<?php echo base_url() . $v_friend->user_photo; ?>" style="height: 30px; width: 30px" />&nbsp;<?php echo $v_friend->user_name; ?></a>
<?php } ?>