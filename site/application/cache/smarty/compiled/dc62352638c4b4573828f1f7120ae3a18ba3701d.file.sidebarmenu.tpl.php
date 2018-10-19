<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:36:11
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\include\sidebarmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187655bc9f9ebbbcb61-49253456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc62352638c4b4573828f1f7120ae3a18ba3701d' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\include\\sidebarmenu.tpl',
      1 => 1539805673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187655bc9f9ebbbcb61-49253456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menuactive' => 0,
    'actualBackuser' => 0,
    'submenuactive' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9f9ebe95ea1_85863207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9f9ebe95ea1_85863207')) {function content_5bc9f9ebe95ea1_85863207($_smarty_tpl) {?><ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='Dashboard') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin">
            <i class="icon-custom icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2,3))) {?>
	<li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='turnos') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/turnos"> <i class="fa fa-calendar"></i> <span class="title">Turnos</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2,3))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='clientes') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/clientes"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Clientes</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='productos') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/productos"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> <span class="title">Productos</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2,3))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='notificaciones') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/admin/notificaciones"> <i class="fa fa-bell" aria-hidden="true"></i> <span class="title">Notificaciones</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='servicios') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/servicios"> <i class="fa fa-scissors" aria-hidden="true"></i> <span class="title">Servicios</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='coiffeurs') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/coiffeurs"> <i class="fa fa-user"></i> <span class="title">Coiffeurs</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='balance') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/balance"> <i class="fa fa-bar-chart" aria-hidden="true"></i> <span class="title">Balance</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='tickets') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/tickets"> <i class="fa fa-money" aria-hidden="true"></i> <span class="title">Tickets y Pagos</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='cobros') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/cobros"> <i class="fa fa-money"></i> <span class="title">Cobros</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='configuracion') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/configuracion"> <i class="fa fa-money"></i> <span class="title">Configuración</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='comentarios') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/comentarios"> <i class="fa fa-comments"></i> <span class="title">Comentarios</span></a>
    </li>
    <?php }?>
	
	<?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='comments') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/comments"> <i class="fa fa-comments"></i> <span class="title">Observaciones clientes</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='reportes') {?>active<?php }?>"> <a href="javascript:;"> <i class="icon-settings"></i> <span class="title">Reportes</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='reportes'&&$_smarty_tpl->tpl_vars['submenuactive']->value=='turnos') {?>active<?php }?>"> 
            <a href="<?php echo site_url();?>
admin/reportes"> <i class="fa fa-calendar"></i> <span class="title">Turnos</span></a> 
          </li>
        </ul>
    </li>  
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='broadcast') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/broadcast"> <i class="fa fa-wifi"></i> <span class="title">Broadcast</span></a>
    </li>
    <?php }?>

    <?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['menuactive']->value=='usuarios') {?>active<?php }?>">
        <a href="<?php echo site_url();?>
admin/usuarios"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Usuarios</span></a>
    </li>
    <?php }?>

</ul>
<?php }} ?>
