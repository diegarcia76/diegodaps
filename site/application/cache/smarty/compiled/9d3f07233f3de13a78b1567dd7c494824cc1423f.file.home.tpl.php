<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:48:17
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\dashboard\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115935bc9fcc15fa342-41158655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d3f07233f3de13a78b1567dd7c494824cc1423f' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\dashboard\\home.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '72f6439d088a8da6474558059088296cf6d5ba24' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\base\\base_login.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '5da857bf46aea96370686729da8cb06be6591b23' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\dashboard\\modal-agregar-comentario.tpl',
      1 => 1539805623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115935bc9fcc15fa342-41158655',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'pageSubtitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9fcc1a8c077_96973389',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9fcc1a8c077_96973389')) {function content_5bc9fcc1a8c077_96973389($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.6.2
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
<title>Diego Dap's | <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageTitle']->value)===null||$tmp==='' ? '' : $tmp);?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta http-equiv="Pragma" content="no-cache">
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>
assets/common/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>
assets/common/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>
assets/common/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>
assets/common/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/common/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />

<link href="<?php echo site_url();?>
home/cssEstados.css" rel="stylesheet" type="text/css"/>

<!-- END GLOBAL MANDATORY STYLES -->

<!-- NUEVOS -->
<link href="<?php echo site_url();?>
assets/admin/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo site_url();?>
assets/admin/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- NUEVOS -->

<!-- BEGIN THEME STYLES -->
<!--<link href="<?php echo site_url();?>
assets/admin/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/layout.css" rel="stylesheet" type="text/css"/>-->

<link href="<?php echo site_url();?>
assets/admin/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url();?>
assets/admin/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo site_url();?>
assets/admin/css/custom.css" rel="stylesheet" type="text/css" />



<!--<link id="style_color" href="<?php echo site_url();?>
assets/admin/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>
assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>
assets/admin/css/custom2.css">-->

<!--<link href="<?php echo site_url();?>
assets/admin/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>-->
<link rel="stylesheet" href="<?php echo site_url();?>
assets/common/plugins/jasny/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!--<link href="<?php echo site_url();?>
assets/admin/css/main.css" rel="stylesheet" type="text/css"/>-->





<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
			<?php echo $_smarty_tpl->getSubTemplate ('admin/include/topmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<?php echo $_smarty_tpl->getSubTemplate ('admin/include/sidebarmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->


			<!--<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<!--<div class="page-title">
					<h1><small><?php echo $_smarty_tpl->tpl_vars['pageSubtitle']->value;?>
</small><br><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
				</div>
				<!-- END PAGE TITLE -->
			<!--</div>-->
			 <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
						<?php echo $_smarty_tpl->getSubTemplate ('admin/include/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>

                            <?php echo $_smarty_tpl->tpl_vars['pageSubtitle']->value;?>

                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
                	


<div class="row dashboard">
	<div class="col-lg-12">

	                <div class="btn-group m-t-1 m-b-2">
	                    <a class="btn green pull-left m-r-1" href="<?php echo site_url();?>
admin/turnos/add"> <i class="icon-plus"></i> Agregar Turno</a>
	                     <a class="btn green pull-left" href="<?php echo site_url();?>
admin/clientes/add"> <i class="icon-plus"></i> Agregar Cliente</a>
	                </div>

                    <div class="mt-element-list">
                        <div class="mt-list-head list-default dark">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="list-head-title-container">
                                        <!--<h3 class="list-title uppercase sbold">Turnos del día</h3>-->
                                        <div class="list-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo mb_strtoupper(smarty_modifier_date_format(time(),"%e de %B, %Y"), 'UTF-8');?>
</div>
                                    </div>
                                </div>
                                <!--<div class="col-xs-4">
                                    <div class="list-head-summary-container">
                                        <div class="list-pending">
                                            <div class="badge badge-default list-count">3</div>
                                            <div class="list-label">Pending</div>
                                        </div>
                                        <div class="list-done">
                                            <div class="list-count badge badge-default last">2</div>
                                            <div class="list-label">Completed</div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="mt-list-container m-y-0  list-default">
													<?php if ($_smarty_tpl->tpl_vars['turnosHoy']->value) {?>

													<table class="table table-stripped table-responsive tabla-responsive" id="tblDashboard">
															<thead>
																<tr>
																	<th>Estado</th>
																	<th>Hora</th>
																	<th>Cliente</th>
																	<th>Coiffeur</th>
																	<th>Sevicio</th>
																	<th>Acción</th>
																</tr>
															</thead>
															<tbody id="turnosHoyDash">
																<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['turnosHoy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
?>
																<tr>
																	<td>
																		<div class="fc-title">

																			<span class="label <?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->className;?>
"><?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->nombre;?>
 &nbsp;
																			<?php if ($_smarty_tpl->tpl_vars['th']->value->prioridad>0) {?>
																			<br>&nbsp;<strong>(sobreturno)</strong>
																			<?php }?>
																			</span>
																			
																		</div>
																	</td>
																	<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['th']->value->fecha_hora,"%H:%M");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['th']->value->fecha_hora_fin,"%H:%M");?>
</td>
																	<td><?php if ($_smarty_tpl->tpl_vars['th']->value->cliente) {
echo $_smarty_tpl->tpl_vars['th']->value->cliente->nombre;
} else {
echo $_smarty_tpl->tpl_vars['th']->value->nombre;
}?></td>
																	<td><?php echo $_smarty_tpl->tpl_vars['th']->value->coiffeur->nombre;?>
</td>
																	<td><?php echo $_smarty_tpl->tpl_vars['th']->value->servicio->nombre;?>
</td>
																	<td>
																		<button class="btn btn-default cambioEstado" data-id-turno="<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
" data-accion="<?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->accion_siguiente->nombre;?>
"> <?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->accion_siguiente->accion;?>
 </button>
																		<a class="btn btn-eliminar btn-icon-only btn-default" href="<?php echo site_url();?>
admin/turnos/eliminar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

																		<a class="btn btn-default btn-icon-only" href="<?php echo site_url();?>
admin/turnos/editar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
">
																			<i class="fa fa-pencil" aria-hidden="true"></i>
																		</a>
																		<div class="clearfix"></div>
																		</div>
																	</td>
																</tr>
																<?php } ?>

															</tbody>
														</table>
														<?php } else { ?>
															No hay turnos el día de hoy.
														<?php }?>
														<!--<ul style="margin-top: 20px;">




															<?php if ($_smarty_tpl->tpl_vars['turnosHoy']->value) {?>
	                                <?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['turnosHoy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
?>
	                                <li class="mt-list-item m-y-0 p-y-0">
										<div class="row">
											<div class="col-lg-3 col-md-6">
												<div class="row">
													<div class="col-md-5">
													 	<h4 class="m-y-0 p-b-2 p-t-1"><span class="label <?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->className;?>
"><?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->nombre;?>
</span></h4>
													</div>
													<div class="col-md-7">
													 	<h4 class="m-y-0 p-b-2 p-t-2"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['th']->value->fecha_hora,"%H:%M");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['th']->value->fecha_hora_fin,"%H:%M");?>
</h4>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-md-6 p-b-2 p-t-2">
												 <h4 class="m-y-0">
												 <a href="#"><?php echo $_smarty_tpl->tpl_vars['th']->value->cliente->nombre;?>
</a>
												</h4>
											</div>
											<div class="col-lg-4 col-md-6 p-b-2 p-t-2">
												<div class="row">
													<div class="col-md-6">
												<h5 class="m-y-0 p-y-0 pull-left text-uppercase"><i class="fa fa-user" aria-hidden="true"></i>
	 <?php echo $_smarty_tpl->tpl_vars['th']->value->coiffeur->nombre;?>
</h5>
													</div>
													<div class="col-md-6">
	 											<h5 class="m-y-0 p-y-0 p-l-1 pull-left text-uppercase"><i class="fa fa-scissors" aria-hidden="true"></i>
	 <?php echo $_smarty_tpl->tpl_vars['th']->value->servicio->nombre;?>
</h5></div>
												</div>

											</div>
											<div class="col-lg-3 col-md-6 p-b-2 p-t-1">
												<button class="btn btn-default pull-right cambioEstado" data-id-turno="<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
" data-accion="<?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->accion_siguiente->nombre;?>
"> <?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->accion_siguiente->accion;?>
 </button>
												<a class="btn btn-eliminar btn-icon-only btn-default pull-right m-r-2" href="<?php echo site_url();?>
admin/turnos/eliminar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												<!--<a class="btn btn-sm btn-eliminar" href="<?php echo site_url();?>
turnos/eliminar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
">-->
												<!--<a class="btn btn-sm btn-eliminar" href="<?php echo site_url();?>
admin/turnos/eliminar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>-->
												<!--<a class="btn btn-default btn-icon-only pull-right m-r-2" href="<?php echo site_url();?>
admin/turnos/editar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
">
													<i class="fa fa-pencil" aria-hidden="true"></i>
												</a>
												<div class="clearfix"></div>
											</div>
										</div>

	                                </li>
									<?php } ?>
								<?php } else { ?>
									No hay turnos el día de hoy.
								<?php }?>







							</ul>-->
                        </div>
                    </div>
	</div>
</div>
<?php /*  Call merged included template "admin/dashboard/modal-agregar-comentario.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/dashboard/modal-agregar-comentario.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '115935bc9fcc15fa342-41158655');
content_5bc9fcc1999c16_00628883($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/dashboard/modal-agregar-comentario.tpl" */?>

				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2016 &copy; Diego Dap's.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/include/dialogs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- END FOOTER -->
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
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery.blockui.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery.cokie.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js" type="text/javascript" ><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"><?php echo '</script'; ?>
>


<!-- END CORE PLUGINS -->
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/metronic.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/layout.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/dialogs.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/noti.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jasny/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("admin/include/js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/home.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			Home.init();
		});
    <?php echo '</script'; ?>
>



<?php echo '<script'; ?>
>
	$.fn.select2.defaults.set( "theme", "bootstrap" );
	
	jQuery(document).ready(function() {
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		//Always.init();
		Notificaciones.init();
		
	});
<?php echo '</script'; ?>
>
<!-- END JAVASCRIPTS -->
</body>

<!-- END BODY -->
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:48:17
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\dashboard\modal-agregar-comentario.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bc9fcc1999c16_00628883')) {function content_5bc9fcc1999c16_00628883($_smarty_tpl) {?><div id="modal-agregar-comentario" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-comentario-label" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Agregar Observacion al Cliente o al Pago</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="turno_id_modal" id="turno_id_modal">
                <div class="form-group">
                    <label class="control-label">Comentario</label>
                    <textarea class="form-control" name="comentario" id="comentario" required="required"></textarea>
                </div>

            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button type="button" class="btn btn-success btn-aceptar-comentario"><i class="fa fa-check"></i> Terminar Servicio</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>
