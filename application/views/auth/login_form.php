<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);

$attrib = array('class' => 'form-horizontal','id' => 'login_form');
?>
<?php echo form_open($this->uri->uri_string(), $attrib); ?>
<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red; font-size:12px;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
		<td style="color: red; font-size:12px;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
	</tr>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>

	<tr>
		<td colspan="3" style="padding-top: 0px;">
			<?php echo form_checkbox($remember); ?>
			<?php echo form_label('Remember me', $remember['id']); ?>
			<?php echo anchor('/auth/forgot_password/', 'Forgot password', 'class="forgot_pass"'); ?>
			<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register', 'class="register"'); ?>
		</td>
	</tr>
</table>
<?php echo form_submit('submit', 'LOGIN', 'class="login_submit"'); ?>
<?php echo form_close(); ?>
   <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom-default.css')?>" rel="stylesheet">
<style>
#body {
    background-color: #000;
}
label {
    font-size: 24px;
    color: #fff;
    padding-right: 10px;
    padding-left: 5px;
}

form input[type=submit]{
    margin: 10px;
}

a {
    padding: 3px;
}
form input[type=text]{
    height: 35px;
    font-size: 18px;
}

form input[type=password]{
     height: 35px;
    font-size: 18px;
}

form input[type=checkbox]{
    height: 40px;
    width: 20px;
    margin-top: 2px;
    float: left;
}

form label[for=remember]{
    font-size: 16px;
    margin-top: 10px;
    padding-left: 0px;
    float: left;
}

.forgot_pass {
    float: left;
    margin-left: 32px;
    margin-top: -4px;
    
}

.register {
    float: left;
    margin-left: 8px;
    margin-top: -4px;
}

td {
    padding: 4px;
}

.login_submit {
	-moz-box-shadow:inset 0px 0px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff;
	box-shadow:inset 0px 0px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border-radius:15px;
	display:inline-block;
	color:#00538a;
	font-family:Verdana;
	font-size:23px;
	font-weight:bold;
	padding:15px 30px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
        margin-left: 130px !important;
        margin-top: 35px !important;
}.login_submit:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e0e0e0), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #e0e0e0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#e0e0e0');
	background-color:#dfdfdf;
}.login_submit:active {
	position:relative;
	top:1px;
}
input[type="text"]{
    color: #000;
}
</style>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
   <script src="<?php echo base_url('assets/js/modernizr-transitions.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/jquery.fancybox.pack.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-buttons.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-media.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-thumbs.js')?>"></script>
   <script src="<?php echo base_url('assets/js/login-form.js')?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   <?php 
    if ($this->tank_auth->is_logged_in())
    {
        echo "<script type='text/javascript'>";
        echo "parent.$.fancybox.close();";
        echo "parent.window.location.reload(true);";
        echo "</script>";
    };?>