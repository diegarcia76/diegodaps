<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-24 18:32:42
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\productos\precios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172715bcf88cdea6c35-58990350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54eaf9b2d68961d0699be7e2593550a133d566b6' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\productos\\precios.tpl',
      1 => 1540416757,
      2 => 'file',
    ),
    '72f6439d088a8da6474558059088296cf6d5ba24' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\base\\base_login.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172715bcf88cdea6c35-58990350',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bcf88ce2f7190_98853740',
  'variables' => 
  array (
    'pageTitle' => 0,
    'pageSubtitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcf88ce2f7190_98853740')) {function content_5bcf88ce2f7190_98853740($_smarty_tpl) {?><!DOCTYPE html>
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


	<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>
assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

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
                	
    <div class="portlet-title">
       <div class="table-toolbar">
            <form class="form" accept="" action="<?php echo site_url();?>
admin/productos/imprimir" target="_blank" method="post">
	        <div class="row">
                <div class="col-md-6">
                    <div class="btn-group w-100">
                        <select id="filtro-marca" name="filtro-marca[]" class="form-control select2 " placeholder='Imprimir todas o seleccione marcas' multiple>
                            <?php  $_smarty_tpl->tpl_vars['aMa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aMa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMarcas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aMa']->key => $_smarty_tpl->tpl_vars['aMa']->value) {
$_smarty_tpl->tpl_vars['aMa']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['aMa']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['marca_id']->value==$_smarty_tpl->tpl_vars['aMa']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['aMa']->value->nombre;?>
</option>
                            <?php } ?>
                        </select>                
                    </div>
                </div> 
                <div class="col-md-3 text-left ">
                        <button type="submit" class="bt_imprimir btn default green" >Imprimir</button>
                </div> 
                <div class="col-md-3 text-right ">
                        <a class="btn default" href="<?php echo site_url();?>
admin/productos">Volver a Productos</a>
                </div>                
	        </div>
	    </div>
    </div>
<div class="row">
<div class="panel-body tabla-responsive">
 <table class="table table-stripped table-responsive" id="tblPrecioProductos">
    <thead>
    	<tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Línea</th>
			  <th width="15%">Precio Efectivo</th>
            <th width="10%">Precio</th>
                  <th>Acciones</th>
				   <th>Eliminar</th>
    	</tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['aProducto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aProducto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aProductos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aProducto']->key => $_smarty_tpl->tpl_vars['aProducto']->value) {
$_smarty_tpl->tpl_vars['aProducto']->_loop = true;
?>        
        <tr class="tr-producto <?php if ($_smarty_tpl->tpl_vars['aProducto']->value->marca) {?> marca_<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->marca->id;
}?>">
            <form class="form frmCambiarPrecioProducto" action="<?php echo site_url();?>
admin/productos/cambiarPrecio">
                <td>
                    <input type="hidden" name="producto_id" value="<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->id;?>
">
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['aProducto']->value->nombre;?>
</td>
                <td>
                    <select id="marca" name="marca" class="form-control select2 marca" placeholder='Seleccione Marca'>
                        <option value="0">Sin Marca</option>
                        <?php  $_smarty_tpl->tpl_vars['aMa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aMa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMarcas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aMa']->key => $_smarty_tpl->tpl_vars['aMa']->value) {
$_smarty_tpl->tpl_vars['aMa']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['aMa']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['aProducto']->value->marca->id==$_smarty_tpl->tpl_vars['aMa']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['aMa']->value->nombre;?>
</option>
                        <?php } ?>
                    </select> 
                </td>
                <td>
                    <select id="submarca" name="submarca" class="form-control select2 submarca" placeholder='Seleccione SubMarca'>
                        <option value="0">Sin Línea</option>
                            <?php  $_smarty_tpl->tpl_vars['aSub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aSub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aProducto']->value->marca->submarcas; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aSub']->key => $_smarty_tpl->tpl_vars['aSub']->value) {
$_smarty_tpl->tpl_vars['aSub']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['aSub']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['aProducto']->value->linea->id==$_smarty_tpl->tpl_vars['aSub']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['aSub']->value->nombre;?>
</option>
                            <?php } ?>
                    </select> 
                </td>
				 <td><input type="text" class="number form-control" name="producto_precio_efectivo" value="<?php echo number_format($_smarty_tpl->tpl_vars['aProducto']->value->precio_efectivo,2,'.',',');?>
" data-default="<?php echo number_format($_smarty_tpl->tpl_vars['aProducto']->value->precio_efectivo_default,2,'.',',');?>
"></td>
                <td><input type="text" class="number form-control" name="producto_precio" value="<?php echo number_format($_smarty_tpl->tpl_vars['aProducto']->value->precio,2,'.',',');?>
" data-default="<?php echo number_format($_smarty_tpl->tpl_vars['aProducto']->value->precio_default,2,'.',',');?>
">
				
				</td>
               
                <td><button class="btn blue" type="submit">Guardar</button></td>
					 <td><input type="checkbox" name="eliminar[]" class="eliminar" id="eliminar" rel="<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['aProducto']->value->id;?>
"/></td>
            </form>
        </tr>        
        <?php } ?>    
    </tbody>
    <tfoot>
        <tr><td colspan="6"> <button class="btn green pull-right" type="button" id="guardar_todos">Guardar Todos</button> </td></tr>
		 <tr><td colspan="6"> <button class="btn red pull-right" type="button" id="eliminar_todos">Eliminar Seleccionados</button> </td></tr>
        
    </tfoot>
    </table>
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
assets/admin/js/productos.js?rnd=20180313"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/datatables/media/js/jquery.dataTables.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jquery.form.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jquery.number/jquery.number.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			Productos.initListadoPrecios();
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
