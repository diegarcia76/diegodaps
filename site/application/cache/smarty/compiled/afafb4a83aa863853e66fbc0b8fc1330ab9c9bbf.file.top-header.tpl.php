<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-18 10:52:57
         compiled from "/var/www/daps/site/application/views/include/top-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12711588005819f52b5fb3c2-01148167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afafb4a83aa863853e66fbc0b8fc1330ab9c9bbf' => 
    array (
      0 => '/var/www/daps/site/application/views/include/top-header.tpl',
      1 => 1494442891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12711588005819f52b5fb3c2-01148167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5819f52b606a10_19040480',
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5819f52b606a10_19040480')) {function content_5819f52b606a10_19040480($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
		  <a class="navbar-brand" href="<?php echo site_url();?>
">
		      <img src="<?php echo site_url();?>
assets/images/isologo.png" alt="logo" width="120" height="auto">
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
		        	<a href="#" id="bt_notificacion" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"></i></a>

		        	<span class="button_badge hidden"></span>

		        	 <ul class="dropdown-menu" id="dropdownMenu">

		        	 </ul>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		        		<img src="<?php echo \Managers\ImagenManager::getInstance()->getUrl($_smarty_tpl->tpl_vars['usuarioActual']->value->foto,'');?>
" width="30" height="30" class="img-circle" alt="Imagen de perfil"/>
						<!--img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="Imagen de perfil" width="30" height="30" class="img-circle"-->
				     </a>
				     <ul class="dropdown-menu">
					     <li><a href="<?php echo site_url();?>
profile">Mi perfil</a></li>
					     <li><a href="<?php echo site_url();?>
registro/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
				     </ul>
			    </li>
		    </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
<?php }} ?>