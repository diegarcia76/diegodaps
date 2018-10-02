<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:41:23
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\include\topmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96775bb3e603519f41-77641603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae3418f7065421e906c75e88368f383321471d01' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\include\\topmenu.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96775bb3e603519f41-77641603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'federacionActual' => 0,
    'actualBackuser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb3e6035b64c6_97292346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e6035b64c6_97292346')) {function content_5bb3e6035b64c6_97292346($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.capitalize.php';
?><div class="page-logo">
                        <a href="<?php echo site_url();?>
admin">
	                        <img src="<?php echo site_url();?>
assets/images/logo.png" alt="logo" class="logo-default" style="margin-top:10px;" width="100">
 						</a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right hidden-xs">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="#" id="bt_notificacion" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-bell"></i>
                                        <span class="badge badge-default hidden">  </span>
                                </a>

                                <ul class="dropdown-menu" id="dropdownMenu">


                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->


                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<img src="<?php echo \Managers\ImagenManager::getInstance()->getUrl($_smarty_tpl->tpl_vars['federacionActual']->value->imagen_id,'55x55');?>
" class="img-circle">
                                    <span class="username username-hide-on-mobile"> ¡Hola <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['actualBackuser']->value->nombre);?>
!  </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                   <li>
                                       <a href="<?php echo site_url();?>
admin/perfil"> <i class="icon-user"></i> Mi Perfil</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url();?>
admin/login/logout">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--<li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li-->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->






<div id="Navmenu" class="offcanvas navmenu-fixed-right">
  <div class="button-collapse default-bg cerrar" id="cerrar-nav"  data-toggle="offcanvas" data-target="#Navmenu" data-canvas="body"> <i class="fa fa-chevron-circle-right"></i> </div>
  <ul class="nav">
    <li>
    <a href="<?php echo site_url();?>
admin/usuarios/perfil"> <i class="icon-user"></i> Mi Perfil</a>
    </li>
    <li class="divider"> </li>
    <li>
    <a href="<?php echo site_url();?>
admin/logout"> <i class="icon-key"></i> Salir</a>
    </li>
  </ul>
</div>
<?php }} ?>
