<?php
$enc_email = $this->encrypt->encode($to_address);
$enc_email = str_replace('/', '%F2', $enc_email);
?>

<strong>Hello <?php echo $user_name; ?>,</strong>
<br/>
<span>Please Click the Link Below for Password Recovery:</span>
<br/>
<a href="<?php echo base_url(); ?>Email/recovery_password/<?php echo $enc_email; ?>"><?php echo base_url(); ?>Email/recovery_password/<?php echo $enc_email; ?></a>
<h2>Thank You for Being With Us</h2>