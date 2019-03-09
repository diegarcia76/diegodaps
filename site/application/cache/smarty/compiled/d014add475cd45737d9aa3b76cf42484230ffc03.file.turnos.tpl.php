<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-12-06 13:18:46
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\turnos\turnos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286325bd8b8f6e2c0d5-91185986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd014add475cd45737d9aa3b76cf42484230ffc03' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\turnos\\turnos.tpl',
      1 => 1544113120,
      2 => 'file',
    ),
    '72f6439d088a8da6474558059088296cf6d5ba24' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\base\\base_login.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '97e9fb23611d50da623fb6b46a42499493508486' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\turnos\\item-horario.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286325bd8b8f6e2c0d5-91185986',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bd8b8f795c9e4_80218810',
  'variables' => 
  array (
    'pageTitle' => 0,
    'pageSubtitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bd8b8f795c9e4_80218810')) {function content_5bd8b8f795c9e4_80218810($_smarty_tpl) {?><!DOCTYPE html>
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
assets/common/plugins/bootstrap-datepicker/css/datepicker.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>
assets/common/plugins/fullcalendarfull/fullcalendar.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>
assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

	

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
		        <div class="row">
		            <div class="col-sm-6">
	                    <a class="btn green" href="<?php echo site_url();?>
admin/clientes/add"> <i class="icon-plus"></i> Agregar Cliente</a>
		            </div>
		            <div class="col-sm-6 hidden-xs text-right">
					<?php if ($_smarty_tpl->tpl_vars['aCategorias']->value) {?>
		            	<ul class="list-unstyled list-inline list-estados">
	                    	
							<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCategorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
							<li><span class="label" style=<?php if ($_smarty_tpl->tpl_vars['cat']->value->color=='violeta') {?>"background:violet"<?php }
if ($_smarty_tpl->tpl_vars['cat']->value->color=='negro') {?>"background:black"<?php }
if ($_smarty_tpl->tpl_vars['cat']->value->color=='blanco') {?>"background:white"<?php }
if ($_smarty_tpl->tpl_vars['cat']->value->color=='rojo') {?>"background:red"<?php }
if ($_smarty_tpl->tpl_vars['cat']->value->color=='amarillo') {?>"background:yellow"<?php }
if ($_smarty_tpl->tpl_vars['cat']->value->color=='azul') {?>"background:blue"<?php }
if ($_smarty_tpl->tpl_vars['cat']->value->color=='verde') {?>"background:green"<?php } else { ?>"background:green"<?php }?>"> <?php echo $_smarty_tpl->tpl_vars['cat']->value->nombre;?>
</span></li>
	                    	<?php } ?>	
	                    </ul>
					<?php }?>	
		            </div>
		        </div>
	    </div>
    </div>

    <div class="dahsboard">
    	<div class='page-content__container container'>
      <div class='sidebar-layout' style='padding-top:1em'>
        <div class='sidebar-layout__main' style='font-size:14px'>
          <div id='calendar'></div>
       
        </div>
       
      </div>
     
    </div>
    </div>

	<?php /*  Call merged included template "admin/turnos/item-horario.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/turnos/item-horario.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '286325bd8b8f6e2c0d5-91185986');
content_5c094be6f2b197_57338898($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/turnos/item-horario.tpl" */?>
	
	
	<!-- Modal  to Add Event -->
<div id="createEventModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Agregar Turno</h4>
 </div>
 <div class="modal-body">
 <div class="control-group">
 <form action="<?php echo site_url();?>
admin/turnos/saveNew" id="frmSaveTurnos" class="formulario" method="post">
 <input type="hidden" name="turno_id" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->id;?>
" />
 <label class="control-label" for="inputPatient">Seleccione Cliente</label>
 
 <div class="form-group  form-md-line-input">
				                <select class="form-control change_cliente" <?php if ((($_smarty_tpl->tpl_vars['editUser']->value->cliente)||($_smarty_tpl->tpl_vars['editUser']->value->nombre!=''))) {?> disabled="disabled" <?php }?> required="required" name="cliente" id="cliente" >
				                	<option value=""></option>
					                <option value="0"  <?php if ($_smarty_tpl->tpl_vars['editUser']->value->nombre!='') {?> selected="selected" <?php }?>>Nuevo cliente</option>
					                <?php if ($_smarty_tpl->tpl_vars['clientes']->value) {?>
					                	<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
					                    	<option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->cliente->id==$_smarty_tpl->tpl_vars['sub']->value->id) {?> selected="selected" <?php }?>><span class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
</span> - (<?php echo $_smarty_tpl->tpl_vars['sub']->value->email;?>
) </option>
					                    <?php } ?>
					                <?php }?>
				                </select>
				                <div id="cliente_nuevo" class="form-group <?php if ($_smarty_tpl->tpl_vars['editUser']->value->nombre=='') {?> hidden <?php }?>" >
									<input type="text" class="form-control cliente_nuevo" placeholder="Escribe el nombre del nuevo cliente" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->nombre;?>
" id="nombreturno" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->nombre!='') {?> disabled="disabled" <?php }?>/>
									<input type="text" class="form-control cliente_nuevo " placeholder="Escribe el teléfono del nuevo cliente" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->telefono;?>
" id="telefonoturno" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->telefono!='') {?> disabled="disabled" <?php }?>/>
									<input type="text" class="form-control cliente_nuevo " placeholder="Escribe el email del nuevo cliente" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->email;?>
" id="emailturno" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->email!='') {?> disabled="disabled" <?php }?>/>
									<?php if ($_smarty_tpl->tpl_vars['accion']->value=='add') {?>
									<a href="#" class="nocliente" id="nocliente" >Guardar</a>
									<?php }?>
								</div></div>	
	<label class="control-label" for="inputPatient">Seleccione Servicio</label>							
				<div class="field desc">
 <div class="form-group  form-md-line-input">
				                <select class="form-control change_calendar" required="required" name="servicio" id="servicio">
					                <option value=""></option>
					                <?php if ($_smarty_tpl->tpl_vars['servicios']->value) {?>
					                	<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
					                    	<option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->servicio->id==$_smarty_tpl->tpl_vars['sub']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
 </option>
					                    <?php } ?>
					                <?php }?>
				                </select>
								</div>				
								
							
							
 </div>
 </div>
 
 <input type="hidden" id="startTime"/>
 <input type="hidden" id="endTime"/>
 <input type="hidden" id="fecha"/>
	</form>
<div class="control-group">
 <label class="control-label" for="when">Cuando:</label>
 <div class="controls controls-row" id="when" style="margin-top:5px;">
 </div>
 </div>
 
 </div>
 <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button type="submit" class="btn btn-primary" id="submitButton">Guardar</button>
 </div>
 </div>

 </div>
</div>

<!-- Modal to Event Details -->
<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Detalle del Servicio</h4>
 </div>
 <div id="modalBody" class="modal-body">
 <h4 id="modalTitle" class="modal-title"></h4>
 <div id="modalWhen" style="margin-top:5px;"></div>
 </div>
 <input type="hidden" id="eventID"/>
 <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
 <button type="submit" class="btn btn-succes" id="editButton">Editar</button>
 <button type="submit" class="btn btn-danger" id="deleteButton">Eliminar</button>
 </div>
 </div>
</div>
</div>
<!--Modal-->

	
	


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
assets/common/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"><?php echo '</script'; ?>
>
	
	
	
	
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/momento.js"><?php echo '</script'; ?>
>
	
	 <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/fullcalendarfull/fullcalendar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/schu.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jsrender.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/turnosNew.js?version=20180628"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			TurnosNew.initForm();
			$('#cliente').select2();
			$('#servicio').select2();
			//TurnosNew.initFotoForm();
			$('#ocultar_coiffeur').show();
		});
 $(function() {
 var todayDate = moment().startOf('day');

 
 
  var TODAY = todayDate.format('YYYY-MM-DD');
 
     
    $('#calendar').fullCalendar({
	
	
           
     defaultView: 'agendaDay',

      groupByResource: true,
	  editable: true,
         selectable: true,
		 language: 'es',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNameShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
buttonText: {
today: 'hoy',
month: 'mes',
week: 'semana',
day: 'dia'

},
allDay : false ,
	
	 <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable(1, null, 0);?>
      resources: [
	    <?php  $_smarty_tpl->tpl_vars['co'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['co']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCoiffeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['co']->key => $_smarty_tpl->tpl_vars['co']->value) {
$_smarty_tpl->tpl_vars['co']->_loop = true;
?>
	 		
       		 	{ id: <?php echo $_smarty_tpl->tpl_vars['co']->value->id;?>
, title: "<?php echo $_smarty_tpl->tpl_vars['co']->value->nombre;?>
" },
			 <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['id']->value+1, null, 0);?>
       <?php } ?>  
      ],
	   minTime: '09:00:00',
    maxTime: '20:00:00',
    slotDuration: '00:15:00',
    slotLabelInterval: 15,
    slotLabelFormat: 'h(:mm)a',
    slotMinutes: 15,
	 eventLimit: true,
	
  
	// events: "index.php?view=1",  // request to load current events
	
	
	events: 'getTurnosOcupadosNew',
	
	//alert(eventos);
	/*
		events: [
		
				{
					resourceId: 8,
					title: 'Test',
					start: '2018-11-16 16:00:00',
					end: '2018-11-16 17:00:00',
					color: 'green',
					allDay : false ,
					
				},
	<?php  $_smarty_tpl->tpl_vars['ev'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ev']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventos']->value['coiffeurs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ev']->key => $_smarty_tpl->tpl_vars['ev']->value) {
$_smarty_tpl->tpl_vars['ev']->_loop = true;
?>
	
				{
					resourceId: 8,
					title: 'Test',
					start: '2018-11-16 13:00:00',
					end: '2018-11-16 14:00:00',
					color: 'green',
					allDay : false ,
					
				},
		
		
			
			
	
		
	
	
		<?php } ?>
			], 
	
	 */
	 eventClick:  function(event, jsEvent, view) {  // when some one click on any event
              // alert(event.resourceId);
				endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },
			
	 select: function(start, end, jsEvent) {  // click on empty time slot
              //console.log(resources.id);
				//alert(resourceId);
				//console.log(jsEvent);
				endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
				fecha = $.fullCalendar.moment(start).format('Y-M-D');
                var mywhen = starttime + ' hasta ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
				 $('#createEventModal #fecha').val(fecha);
				  //$('#createEventModal #estilista').val(id);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
           },
           eventDrop: function(event, delta){ // event drag and drop
               $.ajax({
                   url: 'index.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   //alert(json);
                   }
               });
           },
		   
		 eventResize: function(event) {  // resize to increase or decrease time of event
               $.ajax({
                   url: 'index.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                       //alert(json);
                   }
               });
           }   
		   		
     
    });

  });



$(document).ready(function(){
                      
       $('#submitButton').on('click', function(e){ // add event submit
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit(); // send to form submit function
       });
       
       $('#deleteButton').on('click', function(e){ // delete event clicked
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete(); //send data to delete function
       });
       
       function doDelete(){  // delete event 
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: 'index.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   else
                        return false;
                    
                   
               }
           });
       }
       function doSubmit(){ // add event
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
		   
		    var servicio_id = $('#servicio').val();
			var cliente_id = $('#cliente').val();
			var coiffeur_id = 8;
			//var fecha = $('#fecha').val();
			var turno_id = $('#turno_id').val();
			var nombreturno = $('#nombreturno').val();
			var telefonoturno = $('#telefonoturno').val();
			var email = $('#emailturno').val();
		  
		 // alert(cliente_id);
		  if (cliente_id == ''){
		  	if (nombreturno == ''){
			 alert("Debe seleccionar un cliente o Generar un cliente nuevo");
			 return false;
			}
		  }
		  
		   WebDialogs.doLoading({
					message: 'Aguarde...',
					title: 'Estamos guardando el turno'

				});
           
           $.ajax({
               url: __SITEURL+'admin/turnos/saveNew',
               data:{
				servicio: servicio_id,
				coiffeur: coiffeur_id,
				cliente: cliente_id,
				desde: startTime,
				hasta: endTime,
				fecha: fecha,
				//turno_id: turno_id,
				nombreturno: nombreturno,
				telefonoturno: telefonoturno,
				email: email
			},
              type: 'post',
			  dataType: 'json',
			  
			  success: function (json){
       			WebDialogs.doCloseLoading();
				if (json.status == true){
					WebDialogs.doAlert({
						message: json.message,
						title: json.title,
						onConfirm: function(){
							window.location.href = __SITEURL+'admin/turnos/turnos';
						}
					});

				} else {
					WebDialogs.doAlertError({
						message: json.message,
						title: json.title,
						onConfirm: function(){
							$(form).find('fieldset').attr('disabled',false);
						}
					});
				}

			}
			/*
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                   },
                   true);
               }
			   */
           });
           
       }
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-12-06 13:18:46
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\turnos\item-horario.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c094be6f2b197_57338898')) {function content_5c094be6f2b197_57338898($_smarty_tpl) {?><?php echo '<script'; ?>
 id="template_horario" type="text/x-jsrender">
	
		<div class="list-group-item p-t-1">
			<div class="line"></div>
			<div class="m-r-1 hour col-md-1">{{:Hora}} HS</div>
			<div class="dates col-md-11">
				{{for Turnos}}
					<a href="turnos/editar/{{:id}}" class="fc-bg nexter pull-left {{:className}}" style="padding:5px 10px; margin:5px" data-fecha="{{:fecha_turno}}">
						<div class="fc-title">
							<strong><i class="fa fa-clock-o" aria-hidden="true"></i> {{:start}} HS</strong><br>
							{{:cliente}} / {{:servicio}}
						</div>
					</a>
					<!--button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button-->
				{{/for}}
			</div>
			<div class="clearfix"></div>
		</div>
	
<?php echo '</script'; ?>
>
<?php }} ?>
