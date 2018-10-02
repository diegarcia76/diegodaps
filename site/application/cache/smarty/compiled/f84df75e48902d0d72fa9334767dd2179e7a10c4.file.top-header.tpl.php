<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:02
         compiled from "/var/www/daps/site/application/views/themes/default/include/top-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33817274757ed1b850d2e05-42758224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f84df75e48902d0d72fa9334767dd2179e7a10c4' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/top-header.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33817274757ed1b850d2e05-42758224',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ed1b850ec411_01493819',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ed1b850ec411_01493819')) {function content_57ed1b850ec411_01493819($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo site_url();?>
">
	          <img src="<?php echo site_url();?>
assets/images/logo.png" alt="logo" width="118" height="31">
          </a>
        </div>
        <div id="navbar-top" class="top-nav navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
		        <li><a href="<?php echo site_url();?>
turnos/nuevo_turno" class="text-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 NUEVO TURNO</a></li>
		        <li><a href="<?php echo site_url();?>
turnos" class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> TUS TURNOS</a></li>
		        <li><a href="<?php echo site_url();?>
profile/historial" class="text-primary"><i class="fa fa-user" aria-hidden="true"></i> TU HISTORIAL</a></li>
		        <li class="dropdown notificacion new">
		        	<!-- SI HAY NOTIFICACIONES NUEVAS SE AGREGA LA CLASE NEW -->
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
		        	<span class="button_badge"></span>
		        	 <ul class="dropdown-menu">
			        	<!-- AL LEER LA NOTIFICACION SE VA LA CLASE UNREAD -->
		        	 	<li class="unread"><a href="#">
			        	 	<p>Notificacion 1</p>
			        	 	<p><small><i class="fa fa-clock-o" aria-hidden="true"></i> Hace 5 horas</small></p>
			        	 </a></li>
			        	 <li><a href="#">
			        	 	<p>Notificacion 2</p>
			        	 	<p><small><i class="fa fa-clock-o" aria-hidden="true"></i> Hace 5 horas</small></p>
			        	 </a></li>
			        	 <li><a href="#" class="vertodas">VER TODAS</a></li>
		        	 </ul>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="Imagen de perfil" width="30" height="30" class="img-circle">
				     </a>
				     <ul class="dropdown-menu">
					     <li><a href="<?php echo site_url();?>
profile">Mi perfil</a></li>
					     <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
				     </ul>
			    </li>
		     </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav><?php }} ?>
