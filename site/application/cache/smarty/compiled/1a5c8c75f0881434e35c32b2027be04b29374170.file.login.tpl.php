<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-22 08:50:01
         compiled from "/var/www/daps/site/application/views/admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3338549235829a500bce716-46578277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a5c8c75f0881434e35c32b2027be04b29374170' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/login.tpl',
      1 => 1519219733,
      2 => 'file',
    ),
    '5c0c5294f94d80a818b7736a04534992b3679195' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/base/base_nologin.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3338549235829a500bce716-46578277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829a500d16092_83591755',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829a500d16092_83591755')) {function content_5829a500d16092_83591755($_smarty_tpl) {?><!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Diego Dap's | Administración general</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/common/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/common/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/common/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/common/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo site_url();?>
assets/admin/css/login2.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo site_url();?>
assets/admin/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/layout.css" rel="stylesheet" type="text/css"/>
<!-- <link href="<?php echo site_url();?>
assets/admin/layout/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/> -->
<link href="<?php echo site_url();?>
assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/main.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>


<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login" style="background-color: #364150;">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo " style="margin-top: 30px; margin-bottom: -120px; z-index: 1; position: relative;">
	<a href="<?php echo site_url();?>
admin">
			   <img src="<?php echo site_url();?>
assets/images/isologo_4.svg" width="230" height="auto"/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<div class="inner" style="border: 4px solid #be9e54;">
	<!-- BEGIN LOGIN FORM -->

		<div class="login-box">
			<div class="inner p-x-2 p-y-2">
		    	<form action="<?php echo site_url();?>
admin/login" method="post" class="login-form ">

		            <h3 class="m-b-3" style="color: #333;">Administrador</h3>

					<div class="form-group">
		                <div class="inner-addon left-addon">
						<input class="form-control form-control-solid margin-bottom-10 placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo electrónico" name="email"/>
		                </div>
		            </div>

					<div class="form-group">
		                <div class="inner-addon left-addon">
		                    <input class="form-control form-control-solid margin-bottom-10 m-b-2 placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password"/>
		                </div>
		            </div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block m-t-1">INGRESAR</button>
		            </div>

		            <!--<div class="form-group">
		                <div class="checkbox">
		                  <label>
		                    <input type="checkbox" value="1" name="recordar">
		                     Recordar mis datos
		                  </label>
		                </div>
		            </div>-->
		            	<!--<a class="text-center" href="<?php echo site_url();?>
registro/olvidopass">No me acuerdo mi clave</a><!--<a class="pull-right" href="<?php echo site_url();?>
registro">REGISTRARME</a>-->
		        </form>
		    </div>
		</div>



		<!--<form class="login-form" action="<?php echo site_url();?>
admin/login" method="post">
			<div class="form-title">
				<span class="form-title txt-default">ADMINISTRADOR</span>
			</div>
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>
				Ingresa tu usuario y tu contraseña. </span>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<!--<label class="control-label visible-ie8 visible-ie9">Correo electrónico</label>
				<input class="form-control form-control-solid margin-bottom-10 placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo electrónico" name="email"/>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
				<input class="form-control form-control-solid margin-bottom-10 placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password"/>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-default btn-lg btn-block">INGRESAR</button>
			</div>
			<div class="form-actions">
				<div class="pull-left">
					<label class="rememberme check">
					<input type="checkbox" name="recordar" value="1"/>Recordarme</label>
				</div>
				<div class="pull-right forget-password-block">
					<a href="javascript:;" id="forget-password" class="forget-password">¿Olvidaste tu contraseña?</a>
				</div>
			</div>


		</form>
		<!-- END LOGIN FORM -->







		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="forget-form" action="<?php echo site_url();?>
admin/login/olvido" method="post">
			<div class="form-title">
				<span class="form-title">¿Olvidaste tu contraseña?</span><br>
				<span class="form-subtitle">Ingresa tu correo electrónico para recuperarla.</span>
			</div>
			<div class="form-group margin-bottom-30">
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Correo electrónico" name="email"/>
			</div>
			<div class="form-actions">
				<button type="button" id="back-btn" class="btn btn-default btn-primary uppercase">Volver</button>
				<button type="submit" class="btn btn-default btn-primary uppercase pull-right">Enviar</button>
			</div>
		</form>
	<!-- END FORGOT PASSWORD FORM -->
	</div>
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/respond.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/excanvas.min.js"><?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-migrate.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery.blockui.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/uniform/jquery.uniform.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery.cokie.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/metronic.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/layout.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/demo.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/admin/js/login.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- END PAGE LEVEL SCRIPTS -->
<?php echo '<script'; ?>
>
jQuery(document).ready(function() {
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
	Demo.init();
});
<?php echo '</script'; ?>
>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html><?php }} ?>
