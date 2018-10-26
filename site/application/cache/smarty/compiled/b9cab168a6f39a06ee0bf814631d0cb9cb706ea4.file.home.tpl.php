<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-25 18:41:09
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\cobros\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269705bc9fcc62a07f8-29423213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9cab168a6f39a06ee0bf814631d0cb9cb706ea4' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\cobros\\home.tpl',
      1 => 1540503661,
      2 => 'file',
    ),
    '72f6439d088a8da6474558059088296cf6d5ba24' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\base\\base_login.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '167b20303a0417d14f2d0fc6f4fecc51091076e2' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\cobros\\modal-agregar-producto.tpl',
      1 => 1539378746,
      2 => 'file',
    ),
    'd38349d3c5b390ee7b8e94bbcd5d46aa32149f86' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\cobros\\modal-agregar-servicio.tpl',
      1 => 1539380932,
      2 => 'file',
    ),
    'ec1c83b379b25b17dc814a227f4c3b827324fe8c' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\cobros\\modal-agregar-item.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269705bc9fcc62a07f8-29423213',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9fcc698b752_74983368',
  'variables' => 
  array (
    'pageTitle' => 0,
    'pageSubtitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9fcc698b752_74983368')) {function content_5bc9fcc698b752_74983368($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
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
	         <a class="btn green btn-agregar-item m-r-1"> <i class="fa fa-scissors" aria-hidden="true"></i> Agregar Item</a>
			 <a class="btn green btn-agregar-producto m-r-1"> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
 Agregar Producto</a>
 			 <a class="btn green btn-agregar-servicio m-r-3"> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
 Agregar Servicio</a>

        </div>

        <div class="mt-element-list">
            <div class="mt-list-head list-default dark">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="list-head-title-container">
                            <div class="list-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo mb_strtoupper(smarty_modifier_date_format(time(),"%e de %B, %Y"), 'UTF-8');?>
</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-list-container m-y-0  list-default">
							<?php if ($_smarty_tpl->tpl_vars['pagosPendientes']->value) {?>
							<table class="table table-responsive table-striped" id="tblCobros">
									<thead>
										<tr>
											<th>Hora</th>
											<th>Cliente</th>
											<th>Comentario</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['aPago'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aPago']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagosPendientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aPago']->key => $_smarty_tpl->tpl_vars['aPago']->value) {
$_smarty_tpl->tpl_vars['aPago']->_loop = true;
?>
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['aPago']->value->fecha ? $_smarty_tpl->tpl_vars['aPago']->value->fecha->format('Y-m-d \a \l\a\s H:i:s') : '--';?>
</td>
											<td><?php if ($_smarty_tpl->tpl_vars['aPago']->value->cliente) {
echo $_smarty_tpl->tpl_vars['aPago']->value->cliente->nombre;
} else {
echo $_smarty_tpl->tpl_vars['aPago']->value->nombre;
}?></td>
											<td><?php echo $_smarty_tpl->tpl_vars['aPago']->value->comentario;?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['th']->value->servicio->nombre;?>
</td>
											<td class="text-right">
												<button class="btn btn-default btn-agregar-item btn-xs" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" > <i class="fa fa-plus"></i>ITEM</button>
												<button class="btn btn-default btn-agregar-servicio btn-xs" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" > <i class="fa fa-plus"></i>SERVICIO</button>
												<button class="btn btn-default btn-agregar-producto btn-xs" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" > <i class="fa fa-plus"></i>PRODUCTO</button>
							                    <button class="btn btn-<?php if ($_smarty_tpl->tpl_vars['aPago']->value->total==0) {?>warning canjear<?php } else { ?>success cobrar<?php }?>  btn-xs" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" data-total="<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total),2,".",'');?>
" data-descuentos="<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total_descuentos),2,".",'');?>
"><?php if ($_smarty_tpl->tpl_vars['aPago']->value->total==0) {?>Canjear<?php } else { ?>Cobrar <span>$<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total),2,",",".");
}?></span></button>
							                    <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#detalle-pago-<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" aria-expanded="false" aria-controls="detalle-pago-<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
"><i class="fa fa-chevron-down"></i></button>
											</td>
										</tr>
											<tr>
												<td colspan="6">


												<div id="detalle-pago-<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" class="collapse">
																	<table class="table table-stripped">
																	<thead>
																			<tr>
																					<th>Fecha</th>
																					<th>Cantidad</th>
																					<th>Detalle</th>
																					<th>Precio Unitario</th>
																					<th>Costo</th>
																					<th></th>
																			</tr>
																	</thead>
																	<tbody>
																	<?php  $_smarty_tpl->tpl_vars['aDetallePago'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aDetallePago']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aPago']->value->detallePago; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aDetallePago']->key => $_smarty_tpl->tpl_vars['aDetallePago']->value) {
$_smarty_tpl->tpl_vars['aDetallePago']->_loop = true;
?>
																			<tr>
																					<td><?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->fecha->format('Y-m-d');?>
</td>
																					<td><?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->cantidad;?>
</td>
																					<td><?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->descripcion;?>
</td>
																					<td>$<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aDetallePago']->value->precio),2,",",".");?>
</td>
																					<td>$<?php echo number_format(floatval(($_smarty_tpl->tpl_vars['aDetallePago']->value->precio*$_smarty_tpl->tpl_vars['aDetallePago']->value->cantidad)),2,",",".");?>
</td>
																					<td>
																						<?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1))) {?>
																						<button class="btn btn-default btn-sm btn-eliminar-item" data-id-detalle="<?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->id;?>
" > <i class="fa fa-trash"></i></button>
																						<?php }?>
																						
																						
																						<button class="btn btn-default btn-sm btn-modificar-item" data-id-detalle="<?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->id;?>
" > <i class="fa fa-pencil"></i></button>
																						
																				<input type="checkbox" name="eliminar[]" class="eliminar" id="eliminar" rel="<?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->id;?>
"/>		
																					</td>
																			</tr>
																			
																	<?php } ?>
																			<tr>
																					<td colspan="4" class="text-right">TOTAL</td>
																					<th>$<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total),2,",",".");?>
</th>
																			</tr>
																			 <tr><td colspan="5"> <button class="btn red pull-right" type="button" id="eliminar_todos">Eliminar Seleccionados</button> </td></tr>
																	</tbody>
																	</table>
														</div>
														</td>
														</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php } else { ?>
									No hay pagos pendientes.
								<?php }?>



















								<!--<ul style="margin-top: 20px;">
                	<?php  $_smarty_tpl->tpl_vars['aPago'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aPago']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagosPendientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aPago']->key => $_smarty_tpl->tpl_vars['aPago']->value) {
$_smarty_tpl->tpl_vars['aPago']->_loop = true;
?>
                        <li class="mt-list-item m-y-0 p-y-0">
							<div class="row">
								<div class="col-md-6">
								 	<h4 class="m-y-0 p-b-2 p-t-2 pull-left m-r-2">
									 	<i class="fa fa-clock-o" aria-hidden="true"></i>
									 	<?php echo $_smarty_tpl->tpl_vars['aPago']->value->fecha ? $_smarty_tpl->tpl_vars['aPago']->value->fecha->format('Y-m-d \a \l\a\s H:i:s') : '--';?>

									 </h4>
									 <h4 class="m-y-0 p-b-2 p-t-2 pull-left"> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['aPago']->value->cliente->nombre;?>
</h4>
								</div>
								<div class="col-lg-6 col-md-6 p-b-2 p-t-1">
									<div class="pull-right">
										<button class="btn btn-default btn-agregar-item" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" > <i class="fa fa-plus"></i> Agregar Item</button>
										<button class="btn btn-default btn-agregar-producto" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" > <i class="fa fa-plus"></i> Agregar Producto</button>
                            			<button class="btn btn-success cobrar" data-id-pago="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" data-total="<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total),2);?>
" data-descuentos="<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total_descuentos),2);?>
"> Cobrar <span>$<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total),2,",",".");?>
</span></button>
                            			<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#detalle-pago-<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" aria-expanded="false" aria-controls="detalle-pago-<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
"><i class="fa fa-chevron-down"></i></button>
									</div>
								</div>
							</div>

							<div id="detalle-pago-<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" class="collapse">
			                    <hr />
		                        <table class="table table-stripped">
		                        <thead>
		                            <tr>
		                                <th>Fecha</th>
		                                <th>Cantidad</th>
		                                <th>Detalle</th>
		                                <th>Precio Unitario</th>
		                                <th class="text-right">Costo</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        <?php  $_smarty_tpl->tpl_vars['aDetallePago'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aDetallePago']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aPago']->value->detallePago; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aDetallePago']->key => $_smarty_tpl->tpl_vars['aDetallePago']->value) {
$_smarty_tpl->tpl_vars['aDetallePago']->_loop = true;
?>
		                            <tr>
		                                <td><?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->fecha->format('Y-m-d');?>
</td>
		                                <td><?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->cantidad;?>
</td>
		                                <td><?php echo $_smarty_tpl->tpl_vars['aDetallePago']->value->descripcion;?>
</td>
		                                <td class="text-right">$<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aDetallePago']->value->precio),2,",",".");?>
</td>
		                                <td class="text-right">$<?php echo number_format(floatval(($_smarty_tpl->tpl_vars['aDetallePago']->value->precio*$_smarty_tpl->tpl_vars['aDetallePago']->value->cantidad)),2,",",".");?>
</td>
		                            </tr>
		                        <?php } ?>
		                            <tr>
		                                <td colspan="4" class="text-right">TOTAL</td>
		                                <th class="text-right">$<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aPago']->value->total),2,",",".");?>
</th>
		                            </tr>
		                        </tbody>
		                        </table>
		                	</div>




                        </li>
					 <?php }
if (!$_smarty_tpl->tpl_vars['aPago']->_loop) {
?>
						No hay cobros pendientes
					<?php } ?>
				</ul>-->
            </div>
        </div>
	</div>
</div>












<div id="confirmarCobro" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content modal-warning">
            <div class="modal-body">
	            <div class="wpr">
		            <p>Está por cobrar el pago! <br>¿Está Seguro?<br><a href="#" class="text-info btn-mostrar-importe-efectivo">Modificar monto efectivo</a><br/>
		            </p>
		           
		            <p class="wpr-efectivo form-inline hidden">
		            	Puede modificar el importe para pago en efectivo:<br/>
		            	<input type="text" class="form-control numeric monto-efectivo" value="" >
		            </p>
		            <p>	<label><input type="checkbox" name="cb_modificar_fecha" class="cb_modificar_fecha" value="1"> Modificar Fecha de Cobro</label><br></p>
		            <p class="wpr-fecha-cobro form-inline hidden">
		            	Fecha de Cobro:<br/>
			            <input type="text" class="form-control fecha_cobro" id="Adatepicker" name="fecha_cobro">
						    
		            </p>
					
					<p class="wpr-fecha-cobro form-inline ">
		            	Si realiza el pago con tarjeta (Interés):<br/>
			            <select id="t"  name="t" class="form-control select2 t" placeholder='tarjeta'>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota1;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota1;?>
 % 1 cuota  de <?php echo $_smarty_tpl->tpl_vars['aPago']->value->total;?>
</option>
									<?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota2/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/2, null, 0);?>
									  <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota2;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota2;?>
 %  2 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
									  
									  <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota3/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/3, null, 0);?>
									    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota3;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota3;?>
 %  3 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
										
										<?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota4/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/4, null, 0);?>
										  <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota4;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota4;?>
 %  4 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
										  
										  <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota5/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/5, null, 0);?>
										    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota5;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota5;?>
 %  5 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
											
											<?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota6/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/6, null, 0);?>
											  <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota6;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota6;?>
 %  6 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
											  
											  <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota7/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/7, null, 0);?>
											    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota7;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota7;?>
 %  7 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
												
												<?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota8/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/8, null, 0);?>
												  <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota8;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota8;?>
 %  8 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
												  
												  <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota9/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/9, null, 0);?>
												    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota9;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota9;?>
 %  9 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
													
													<?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota10/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/10, null, 0);?>
													  <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota10;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota10;?>
 %  10 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
													  
													  <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota11/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/11, null, 0);?>
													    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota11;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota11;?>
 %  11 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
														
														<?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable($_smarty_tpl->tpl_vars['aPago']->value->total+($_smarty_tpl->tpl_vars['aPago']->value->total*$_smarty_tpl->tpl_vars['t']->value->cuota12/100), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['tf'] = new Smarty_variable($_smarty_tpl->tpl_vars['to']->value/12, null, 0);?>
														  <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cuota12;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value->cuota12;?>
 %  12 cuotas de <?php echo number_format(floatval($_smarty_tpl->tpl_vars['tf']->value),2,".",'');?>
 c/u</option>
                                	
                                   
                                </select>
						
						
						    
		            </p>
					
		        </div>    
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button class="btn btn-success green btn-confirm-efectivo"></button>
              	<button class="btn btn-success green btn-confirm-no-efectivo"></button>
				<button class="btn btn-success blue cobrarCombinando">Combinar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</div>


<div id="confirmarCobroCombinado" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content modal-warning">
            <div class="modal-body">
	            <div class="wpr">
					 <p class="wpr-efectivo form-inline">
		            	Monto a Cobrar (Tarjeta saldo en 1 cuota)<br/>
						<div class="success green btn-confirm-no-efectivo"></div>
		            	
		            </p>
					
		           	           
		            <p class="wpr-efectivo form-inline">
		            	Monto en Efectivo:<br/>
		            	<input type="text" class="form-control numeric monto-efectivo2" name="monto-efectivoc"  value="0" >
		            </p>
					 <p class="wpr-efectivo form-inline">
		            	Monto con Tarjeta:<br/>
		            	<input type="text" class="form-control numeric monto-tarjeta2" name="monto-tarjetac" value="0" >
		            </p>
		           	         
						<input type="hidden" name="idc" value="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" >
						<input type="hidden" name="totalc" value="<?php echo $_smarty_tpl->tpl_vars['aPago']->value->total;?>
" >
						
					 
					
		        </div>    
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
               	<button class="btn btn-success green finalizar">FINALIZAR</button>
				
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</div>








<!-- modales de la pantalla -->
<?php /*  Call merged included template "admin/cobros/modal-agregar-producto.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/cobros/modal-agregar-producto.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '269705bc9fcc62a07f8-29423213');
content_5bd23875bcc634_73489913($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/cobros/modal-agregar-producto.tpl" */?>
<?php /*  Call merged included template "admin/cobros/modal-agregar-servicio.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/cobros/modal-agregar-servicio.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '269705bc9fcc62a07f8-29423213');
content_5bd23875c7d0e5_05762790($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/cobros/modal-agregar-servicio.tpl" */?>
<?php /*  Call merged included template "admin/cobros/modal-agregar-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/cobros/modal-agregar-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '269705bc9fcc62a07f8-29423213');
content_5bd23875d03726_10651105($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/cobros/modal-agregar-item.tpl" */?>

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
assets/common/plugins/jquery-validation/js/jquery.validate.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jquery-validation/js/additional-methods.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jquery.form.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jquery.numeric.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/cobros.js?version=20180712"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			Cobros.init();
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-25 18:41:09
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\cobros\modal-agregar-producto.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bd23875bcc634_73489913')) {function content_5bd23875bcc634_73489913($_smarty_tpl) {?><div id="modal-agregar-producto" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-producto-label" aria-hidden="true" data-backdrop='static'>
    <form id="frm-agregar-producto" action="<?php echo site_url();?>
admin/cobros/addProducto" method="post" class="formulario">
    <input type="hidden" name="pago-id" value="" />
    <input type="hidden" name="detallePago-id" value="" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Ingrese un producto para cobrar</h4>
            </div>
            <div class="modal-body">
                <div class="form-body">

                        
                    <div class="form-group form-md-line-input">
                        <label class="control-label">Cliente</label>
                        <select class="form-control change_cliente select2" name="cliente-id" id="cliente" >
                            <option value=""></option>
                            <option value="0">Nuevo cliente</option>
                            <?php if ($_smarty_tpl->tpl_vars['clientes']->value) {?>
                                <?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
"><span class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
</span> - (<?php echo $_smarty_tpl->tpl_vars['sub']->value->email;?>
) </option>
                                <?php } ?>
                            <?php }?>
                        </select>
                        <div id="cliente_nuevo_producto" class="form-group hidden wpr-cliente-nuevo" >
                            <input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente"  id="nombrecobro" name="nombrecobro" />                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Producto</label>
                        <select class="form-control select select2" name="producto-id">
                        <?php  $_smarty_tpl->tpl_vars['aProducto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aProducto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productosActivos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aProducto']->key => $_smarty_tpl->tpl_vars['aProducto']->value) {
$_smarty_tpl->tpl_vars['aProducto']->_loop = true;
?>
                        	<option data-precio='<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->precio;?>
' value="<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->id;?>
">[<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->codigo;?>
] <?php echo $_smarty_tpl->tpl_vars['aProducto']->value->nombre;?>
 - $<?php echo number_format(floatval($_smarty_tpl->tpl_vars['aProducto']->value->precio),2,",",".");?>
</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <select class="form-control select" name="cantidad">
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Precio a Cobrar c/u</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">$</span>
                                    <input type="text" class="form-control"  name="precio" placeholder="" value="" required="required">
                                </div>                            
                            </div>
                        </div>
                    </div>
					
					

                    <div class="form-group">
                        <label class="control-label">Seleccionar Coiffeur</label>
                        <select class="form-control select2" name="coiffeur-id" required="required">
                            <option value="">Selecciona Coiffeur</option>
                            <?php  $_smarty_tpl->tpl_vars['aCoiffeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aCoiffeur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coiffeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aCoiffeur']->key => $_smarty_tpl->tpl_vars['aCoiffeur']->value) {
$_smarty_tpl->tpl_vars['aCoiffeur']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['aCoiffeur']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['aCoiffeur']->value->nombre;?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="wpr-total text-right">
                        <h2>PRECIO recomendado: $<span>0.00</span></h2>
                    </div> 
					<!--<div class="wpr-total-2 text-right">
                        <h2>PRECIO Real a cobrar: $<span>0.00</span></h2>
                    </div> -->
            
				</div>            	
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button type="submit" class="btn btn-success btn-aceptar"><i class="fa fa-check"></i> Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal --><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-25 18:41:09
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\cobros\modal-agregar-servicio.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bd23875c7d0e5_05762790')) {function content_5bd23875c7d0e5_05762790($_smarty_tpl) {?><div id="modal-agregar-servicio" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-servicio-label" aria-hidden="true" data-backdrop='static'>
    <form id="frm-agregar-servicio" action="<?php echo site_url();?>
admin/cobros/addServicio" method="post" class="formulario">
    <input type="hidden" name="pago-id" value="" />
    <input type="hidden" name="detallePago-id" value="" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Ingrese un servicio para cobrar</h4>
            </div>
            <div class="modal-body">
                <div class="form-body">

                    <!--div class="form-group">
                        <label class="control-label">Seleccionar cliente</label>
                        <select class="form-control select2" style="width: 100%;" name="cliente-id">
                            <?php  $_smarty_tpl->tpl_vars['aCliente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aCliente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aCliente']->key => $_smarty_tpl->tpl_vars['aCliente']->value) {
$_smarty_tpl->tpl_vars['aCliente']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['aCliente']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['aCliente']->value->nombre;?>
</option>
                            <?php } ?>
                        </select>
                    </div-->
                    <div class="form-group  form-md-line-input">
                        <label class="control-label">Cliente</label>
                        <select class="form-control change_cliente select2" name="cliente-id" id="cliente" >
                            <option value=""></option>
                            <option value="0">Nuevo cliente</option>
                            <?php if ($_smarty_tpl->tpl_vars['clientes']->value) {?>
                                <?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
"><span class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
</span> - (<?php echo $_smarty_tpl->tpl_vars['sub']->value->email;?>
) </option>
                                <?php } ?>
                            <?php }?>
                        </select>
                        <div id="cliente_nuevo_servicio" class="form-group hidden wpr-cliente-nuevo" >
                            <input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente"  id="nombrecobro" name="nombrecobro" />                        
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Seleccionar Coiffeur</label>
                        <select class="form-control select2" style="width: 100%;" name="coiffeur-id" id="coiffeur-id" required="required">
                            <option value="">Selecciona Coiffeur</option>
                            <?php  $_smarty_tpl->tpl_vars['aCoiffeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aCoiffeur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coiffeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aCoiffeur']->key => $_smarty_tpl->tpl_vars['aCoiffeur']->value) {
$_smarty_tpl->tpl_vars['aCoiffeur']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['aCoiffeur']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['aCoiffeur']->value->nombre;?>
</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Servicio</label>
                        <select class="form-control select2" name="servicio-id" id="servicio-id" style="width: 100%;">
                        
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <select class="form-control" name="cantidad">
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label class="control-label">Precio a Cobrar c/u</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">$</span>
                                    <input type="text" class="form-control"  name="precio" placeholder="" value="" required="required">
                                </div>                            
                            </div>
                        </div>
                    </div>

                    <div class="wpr-total text-right">
                        <h2>$<span>0.00</span></h2>
                    </div> 
            
				</div>            	
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button type="submit" class="btn btn-success btn-aceptar"><i class="fa fa-check"></i> Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal --><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-25 18:41:09
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\cobros\modal-agregar-item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bd23875d03726_10651105')) {function content_5bd23875d03726_10651105($_smarty_tpl) {?><div id="modal-agregar-item" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-item-label" aria-hidden="true" data-backdrop='static'>
    <form id="frm-agregar-item" action="<?php echo site_url();?>
admin/cobros/saveItem" method="post" class="formulario"
    >
    <input type="hidden" name="pago-id" value="" />
    <input type="hidden" name="detallePago-id" value="" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Agregar Item a <span class="cliente-nombre"></span></h4>
            </div>
            <div class="modal-body">

                <!--div class="form-group">
                    <label class="control-label">Seleccionar cliente</label>
                    <select class="form-control select2" name="cliente-id">
                    	<?php  $_smarty_tpl->tpl_vars['aCliente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aCliente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aCliente']->key => $_smarty_tpl->tpl_vars['aCliente']->value) {
$_smarty_tpl->tpl_vars['aCliente']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['aCliente']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['aCliente']->value->nombre;?>
</option>
                        <?php } ?>
                    </select>
                </div-->

                <div class="form-group  form-md-line-input">
                    <label class="control-label">Cliente</label>
                    <select class="form-control change_cliente select2" name="cliente-id" id="cliente" >
                        <option value=""></option>
                        <option value="0">Nuevo cliente</option>
                        <?php if ($_smarty_tpl->tpl_vars['clientes']->value) {?>
                            <?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
"><span class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
</span> - (<?php echo $_smarty_tpl->tpl_vars['sub']->value->email;?>
) </option>
                            <?php } ?>
                        <?php }?>
                    </select>
                    <div id="cliente_nuevo_item" class="form-group hidden wpr-cliente-nuevo" >
                        <input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente"  id="nombrecobro" name="nombrecobro" />                        
                    </div>
                </div>

            
            	<div class="row">
                	<div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cantidad</label>
                            <select class="form-control" name="cantidad">
                            	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>    
                	<div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Precio Unitario</label>
                            <div class="input-group">
                              	<span class="input-group-addon" id="basic-addon1">$</span>
                            	<input type="text" class="form-control" name="precio" placeholder="" value="" required="required">
                            </div>                            
                        </div>
                    </div>
                </div>    
                <div class="form-group">
                    <label class="control-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" required="required"></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Seleccionar tipo</label>
                    <select class="form-control" name="tipo" required="required">
                        <option value="servicio">Servicio</option>
                        <option value="producto">Producto</option>
                    </select>
                </div>

           		<div class="wpr-total text-right">
                	<h2>$<span>0.00</span></h2>
                </div>
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button type="submit" class="btn btn-success btn-aceptar"><i class="fa fa-check"></i> Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal --><?php }} ?>
