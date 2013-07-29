<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
</table>
<?php echo form_submit('reset', 'Get a new password', 'class="register_submit"'); ?>
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

.register_submit {
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
        margin-left: 45px !important;
        margin-top: 35px !important;
}.register_submit:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e0e0e0), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #e0e0e0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#e0e0e0');
	background-color:#dfdfdf;
}.register_submit:active {
	position:relative;
	top:1px;
}

input[type="text"]{
    color: #000;
}
</style>