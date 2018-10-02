<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-22 14:52:04
         compiled from "/var/www/daps/site/application/views/admin/productos/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17014831135829fc9b530ff3-30738621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a06465ae3cbb817842075769cfd076f8a10d936' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/productos/form.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
    'a51a3942a48197d80a1a5bd6755a0795d9719aed' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/base/base_login.tpl',
      1 => 1519219731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17014831135829fc9b530ff3-30738621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829fc9b5b4450_29001806',
  'variables' => 
  array (
    'pageTitle' => 0,
    'pageSubtitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829fc9b5b4450_29001806')) {function content_5829fc9b5b4450_29001806($_smarty_tpl) {?><!DOCTYPE html>
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
                	
<div class="row">
	<div class="col-md-6">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-pencil font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Producto</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="<?php echo site_url();?>
admin/productos/save" id="frmSaveProductos" method="post">
                	<input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->id;?>
" />
					<div class="form-body">

						<div class="form-group">
							<label class="control-label">Código</label>
								<input type="text" class="form-control" name="codigo" placeholder="Código" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->codigo;?>
">
						</div> 

						<div class="form-group">
							<label class="control-label">Nombre</label>
								<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->nombre;?>
" required="required">
						</div>

						<div class="form-group">
							<label class="control-label">Descripción</label>
								<textarea rows="3" class="form-control" name="descripcion" placeholder="Descripción" ><?php echo $_smarty_tpl->tpl_vars['editUser']->value->descripcion;?>
</textarea>
						</div>

                        <div class="form-group">
							<label class="control-label">Precio</label>
								<input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->precio;?>
" >
						</div>

                        <div class="form-group">
							<label class="control-label">Precio Efectivo</label>
								<input type="text" class="form-control" name="precio_efectivo" placeholder="Precio" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->precio_efectivo;?>
" >
						</div>

						<div class="form-group">
							<label class="control-label">Marca</label>
								<select id="filtro-marca" name="filtro-marca" class="form-control select2 " placeholder='Seleccione Marca'>
                                    <option value="">Sin Marca</option>
                                	<?php  $_smarty_tpl->tpl_vars['aMa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aMa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMarcas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aMa']->key => $_smarty_tpl->tpl_vars['aMa']->value) {
$_smarty_tpl->tpl_vars['aMa']->_loop = true;
?>
                                    	<option value="<?php echo $_smarty_tpl->tpl_vars['aMa']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->marca->id==$_smarty_tpl->tpl_vars['aMa']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['aMa']->value->nombre;?>
</option>
                                    <?php } ?>
                                </select>
						</div>

						<!--<div class="form-group">
                            <label class="control-label col-md-3">Activo</label>
                            <div class="col-md-9">
								<div class="checkbox-list">
                                	<label><input name="activo" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->activo==true) {?>checked="checked"<?php }?> /></label>
								</div>
                            </div>
                        </div-->

					</div>
					<div class="form-actions">
						<div class="row">
								<button type="submit" class="btn green btn-lg">Guardar</button>
								<a href="<?php echo site_url();?>
admin/productos" class="btn default pull-right">Cancelar</a>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

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
 src="<?php echo site_url();?>
assets/common/plugins/demo.js" type="text/javascript"><?php echo '</script'; ?>
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
assets/common/plugins/spinner.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/productos.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(function(){
		Productos.initForm();

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
