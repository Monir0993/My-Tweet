<?php if($all_reply){ ?>
<?php foreach ($all_reply as $v_reply){ ?>
<?php 
    $reply_user_info = user_info_by_id($v_reply->user_id);
?>
<div class="row">
    <div class="col-md-12">
        <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url() . $reply_user_info->user_photo; ?>" width="30" height="30" alt="Profile Picture" />&nbsp;<?php echo $reply_user_info->user_name; ?></a>
        <br/><span class="date" style="margin-left: 35px; color:#78bbe6 "><?php echo date('M j Y g:i A', strtotime($v_reply->reply_time)); ?></span> 
        <p style="margin-left: 35px"><?php echo $v_reply->reply_description; ?></p>
        <p class="spec" style="margin-left: 35px">
            <a href="#" title="see all like" class=""><i class="fa fa-thumbs-up"></i>(<?php echo like_count_by_reply_id($v_reply->reply_id); ?>)</a>
            <a onclick="insert_like('<?php echo $v_reply->reply_id; ?>', '<?php echo $this->session->userdata('user_id') ?>','3', 'sub_com<?php echo $v_reply->comment_id; ?>', 'Post/insert_reply_like/');" style="cursor: pointer"><i class="fa fa-thumbs-up"></i>&nbsp;Like</a></p>
    </div>
</div>
<?php } ?>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <form>
            <div class="form-group">
                <label for="user_reply">Reply</label>
                <textarea name="user_comment" placeholder="Write..." id="user_comment<?php echo $comment_id; ?>" class="form-control" rows="2"></textarea>
            </div>

            <div class="form-group">
                <input type="button" onclick="insert_sub_comment('<?php echo $comment_id; ?>','<?php echo $this->session->userdata('user_id'); ?>','user_comment<?php echo $comment_id; ?>','Post/insert_sub_comment/','sub_com<?php echo $comment_id; ?>');" name="btn_submit" class="pull-right btn btn-info" value="Enter" style="border-radius: 0px 35px 0 35px; border: 1px solid #78bbe6; background-color: #78bbe6" >
            </div>
        </form>
    </div>
</div>