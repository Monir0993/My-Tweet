<?php
$i = 0;
?>
<?php foreach ($all_post as $v_post) { ?>
    <?php if ($v_post->post_description || $v_post->user_photo) { ?>
        <div class="mainbar" style="background-color: whitesmoke; margin-top: 15px;">

            <div class="article">
                <a href="<?php echo base_url(); ?>" style=" color: #622c2c"><h5 style="font-weight: bold"><img src="<?php echo base_url() . $profile_picture->user_photo; ?>" width="35" height="35" alt="Profile Picture" /><span>&nbsp;<?php echo $user_info->user_name; ?></span></h5></a>
                <div class="clr"></div>
                <p class="text-info" style="font-weight: bold; margin-left: 39px; margin-top: -15px; padding: 0px">
                    <span class="date">
                        <?php
                        echo date('M j Y g:i A', strtotime($v_post->post_time));
                        ?>
                    </span>
                </p>
                <?php if ($v_post->post_description) { ?>
                    <p style="color: black;"><?php echo $v_post->post_description; ?></p>
                <?php } ?>
                <?php if ($v_post->user_photo) { ?>
                    <a href="#"><img src="<?php echo base_url() . $v_post->user_photo; ?>" width="613" height="500" alt="Image" /></a>
                <?php } ?>

                <p class="text-justify">
                    <?php
                    $j = 0;
                    ?>
                    <?php foreach ($user_like_info_id[$i] as $v_user_like) { ?>

                        <?php
                        if ($j < 3) {
                            $user_like_info_name = user_name_by_id($v_user_like->user_like_id);
                            ?>
                            <?php if ($v_user_like->user_like_id == $this->session->userdata('user_id')) { ?>
                                <a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $v_user_like->user_like_id; ?>" target="_blank"><?php echo 'You'; ?>,</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>Search/show_friend_profile/<?php echo $v_user_like->user_like_id; ?>" target="_blank"><?php echo $user_like_info_name->user_name; ?>,</a>
                            <?php } ?>
                        <?php } else {
                            ?>
                            & <a href="#"><?php echo $like_count[$i] - 3; ?> more people</a> like this
                            <?php break;
                        } $j++;
                        ?>
        <?php } ?>
                </p>
                <p class="spec">
                    <a href="#<?php echo 'com' . $v_post->post_id; ?>" data-toggle="collapse" data-target="" onclick="makerequest('<?php echo $v_post->post_id ?>', '<?php echo 'com' . $v_post->post_id; ?>', 'Post/user_comment/');"><i class="fa fa-comment"></i>&nbsp;Comments (<?php echo comment_count_by_post_id($v_post->post_id); ?>)</a>

                    <a onclick="insert_like('<?php echo $v_post->post_id; ?>', '<?php echo $this->session->userdata('user_id'); ?>', '1', 'my_post', 'Post/insert_like/')" style="cursor: pointer"><i class="fa fa-thumbs-up"></i>&nbsp;Like(<?php echo $like_count[$i]; ?>)</a>
        <?php $i++; ?>
                </p>
                <div class="clr"></div>
                <div id="<?php echo 'com' . $v_post->post_id; ?>" class="collapse" style="background-color: #fbf5ff; padding: 10px">


                </div>

            </div>
        </div>
        <?php
    } else {
        $i++;
    }
    ?>
<?php } ?>