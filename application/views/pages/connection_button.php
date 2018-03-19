<?php if($check_friend == 1){ ?>
<a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: 20px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Friend</a>
<a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>


<ul class="dropdown-menu" style="background-color: #b22222; margin-left: 20px">
    <li><a onclick="connection('<?php echo $user_id; ?>','connection_div','Friend/unfriend/');" style="font-family: monospace; cursor: pointer; font-weight: bold; color: #999999">Unfriend</a></li>
    <li><a href="#" style="font-family: monospace; font-weight: bold; color: #999999">See Profile</a></li>
</ul>
<?php }else if($check_friend_request == 1){ ?>
<a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace; margin-left: -60px" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Friend Request Sent</a>
<a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>


<ul class="dropdown-menu" style="background-color: #b22222; margin-left: -60px">
    <li><a onclick="connection('<?php echo $user_id; ?>','connection_div','Friend/cancel_friend_request/');" style="font-family: monospace; cursor: pointer; font-weight: bold; color: #999999">Cancel Request</a></li>
    <li><a href="#" style="font-family: monospace; font-weight: bold; color: #999999">See Profile</a></li>
</ul>
<?php }else{ ?>
<a onclick="connection('<?php echo $user_id; ?>','connection_div','Friend/add_friend/');" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Click"><i class="fa fa-user-plus"></i>&nbsp;Add Friend</a>
<a href="#" style="background-color: #b22222; color: whitesmoke; font-family: monospace" class="btn btn-default btn-sm" data-toggle="" title="Click"><i class="fa fa-envelope"></i>&nbsp;Message</a>
<?php } ?>


