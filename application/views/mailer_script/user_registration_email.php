<?php
$enc_email = $this->encrypt->encode($to_address);
$enc_email = str_replace('/', '%F2', $enc_email);
?>

<strong>Hello <?php echo $user_name; ?>,</strong>
<br/>
<span>Please Click the Link Below to Confirm Your Account Registration:</span>
<br/>
<form action="<?php echo base_url(); ?>Registration/confirm_registration" method="post">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="user_email_address" value="<?php echo $to_address; ?>">
    <input type="hidden" name="user_password" value="<?php echo $user_password; ?>">
    <input type="hidden" name="user_sex" value="<?php echo $user_sex; ?>">
    <input type="submit" value="<?php echo base_url(); ?>Registration/confirm_registration/<?php echo $enc_email; ?>">
</form>

<h2>Thank You for Being With Us</h2>