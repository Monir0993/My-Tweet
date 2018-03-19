<?php if($all_comment){ ?>
<?php foreach ($all_comment as $v_comment){ ?>
<?php 
    $comment_user_info = user_info_by_id($v_comment->user_id);
?>
<div class="row">
    <div class="col-md-12">
        <a href="#" onclick="" style="text-decoration: none; color: #622c2c"><img src="<?php echo base_url() . $comment_user_info->user_photo; ?>" width="30" height="30" alt="Profile Picture" />&nbsp;<?php echo $comment_user_info->user_name; ?></a>
        <br/><span class="date" style="margin-left: 35px; color:#78bbe6 "><?php echo date('M j Y g:i A', strtotime($v_comment->comment_time)); ?></span> 
        <p style="margin-left: 35px"><?php echo $v_comment->comment_description; ?></p>
        <p class="spec" style="margin-left: 35px">
            <a href="#sub_com<?php echo $v_comment->comment_id; ?>" data-toggle="collapse" data-target="" onclick="makerequest('<?php echo $v_comment->comment_id; ?>','sub_com<?php echo $v_comment->comment_id; ?>','Post/user_sub_comment/');"><i class="fa fa-comment"></i>&nbsp;Replay (<?php echo reply_count_by_comment_id($v_comment->comment_id); ?>)</a>
            <a href="#" class="" title="see all like"><i class="fa fa-thumbs-up"></i>(<?php echo like_count_by_comment_id($v_comment->comment_id); ?>)</a>
            <a onclick="insert_like('<?php echo $v_comment->comment_id; ?>', '<?php echo $this->session->userdata('user_id') ?>','2', '<?php echo 'com' . $v_comment->post_id; ?>', 'Post/insert_comment_like/');" style="cursor: pointer"><i class="fa fa-thumbs-up"></i>&nbsp;Like</a>
        </p>

        <!-- Sub Comments  -->

        <div id="sub_com<?php echo $v_comment->comment_id; ?>" class="collapse" style="margin-left: 40px; background-color: #eeecec; padding: 10px">

        </div>

    </div>
</div>
<?php } ?>
<?php } ?>


<div class="row">
    <div class="col-md-12">
        <form>
            <div class="form-group">
                <label for="user_comment">Comment</label>
                <textarea name="user_comment" placeholder="Write..." id="user_comment<?php echo $post_id; ?>" class="form-control" rows="2"></textarea>
            </div>

            <div class="form-group">
                <input type="button" onclick="insert_comment('<?php echo $post_id; ?>','<?php echo $user_id; ?>','user_comment<?php echo $post_id; ?>','Post/insert_comment/','<?php echo 'com' . $post_id; ?>');" name="btn_submit" class="pull-right btn btn-info" value="Enter" style="border-radius: 0px 35px 0 35px; border: 1px solid #78bbe6; background-color: #78bbe6" >
            </div>
        </form>
    </div>
</div>