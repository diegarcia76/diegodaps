<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:41:53
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\turnos\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170445bb3e621b85084-89957236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a89170e90cbe4a1e5fac14100a10333eb1c57d4b' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\turnos\\form.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '72f6439d088a8da6474558059088296cf6d5ba24' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\base\\base_login.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '84efe9eebdc2ddd78faa99ad1cfb3a133a5cf2b7' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\turnos\\item-horario-add.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170445bb3e621b85084-89957236',
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
  'unifunc' => 'content_5bb3e6220c5d75_91295085',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e6220c5d75_91295085')) {function content_5bb3e6220c5d75_91295085($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
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



	<!-- ******* css para multile files uploads ******* -->
	<link rel="stylesheet" href="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/css/jquery.fileupload-ui.css">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/css/jquery.fileupload-noscript.css"></noscript>
	<noscript><link rel="stylesheet" href="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/css/jquery.fileupload-ui-noscript.css"></noscript>

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
                	
	<?php if ($_smarty_tpl->tpl_vars['editUser']->value) {?>
<!--<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#turno" aria-expanded="false" aria-controls="turno">
  <i class="fa fa-pencil" aria-hidden="true"></i> Editar el turno
</button>-->

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#fotos" aria-expanded="false" aria-controls="fotos">
  <i class="fa fa-photo" aria-hidden="true"></i> Agregar fotos
</button>
	<?php }?>
<div class="clearfix" style="margin-top: 30px;"></div>

<?php if ($_smarty_tpl->tpl_vars['editUser']->value) {?>
	<!--   FOTOSSSSSS    -->
	<div class="col-md-6 collapse" id="fotos">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Agrega y Edita las Fotos</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="<?php echo site_url();?>
admin/turnos/guardar_foto" id="frmSaveTurnosFotos" method="post" class="form" enctype="multipart/form-data">
                    	<input type="hidden" name="turno_id" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->id;?>
" />


                    		<!--      Imagen      -->
							<div class="form-group">

                                <!-- The container for the uploaded files -->
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <span>Elegir fotos para subir</span>
                                    <!-- The file input field used as target for the file upload widget -->
                                    <input id="fileupload" type="file" name="files[]" multiple>
                                </span>

                                <div id="files-container" class="files">
                                	<?php  $_smarty_tpl->tpl_vars['aFoto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aFoto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['editUser']->value->fotos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aFoto']->key => $_smarty_tpl->tpl_vars['aFoto']->value) {
$_smarty_tpl->tpl_vars['aFoto']->_loop = true;
?>
                                        <div class="wpr-image">
                                        	<p>
                                            	<img src="<?php echo \Managers\ImagenManager::getInstance()->getUrl($_smarty_tpl->tpl_vars['aFoto']->value,'120x120');?>
" class="img-preview pull-left" />
                                                <span>Imagen actual</span>
                                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button><br />
                                                <input type="hidden" name="images[]" value="<?php echo $_smarty_tpl->tpl_vars['aFoto']->value->id;?>
" />
                                          	</p>
                                    	</div>
                                    <?php } ?>
                                </div>

                                <div class="form-actions text-right">
                                    <div class="controls">
                                        <button type="submit" name="btn-publicar" value="1" class="btn btn-circle blue">Publicar</button>
                                    </div>
                                </div>

	                        </div>


    				</form>
    			</div>
    </div>
    <?php }?>

<!--<div class="clearfix" style="margin-top: 30px;"></div>-->


<div class="row" id="turno">
	<form action="<?php echo site_url();?>
admin/turnos/save" id="frmSaveTurnos" class="formulario" method="post">
	<div class="col-md-3">
		<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil font-green-sharp"></i>
        		<span class="caption-subject font-green-sharp bold uppercase">Datos del Turno</span>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->

                    	<input type="hidden" name="turno_id" id="turno_id" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->id;?>
" />
                    	<input type="hidden" name="fecha" id="fecha" value="" />
                    	<input type="hidden" name="fecha_sola" id="fecha_sola" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['editUser']->value->fecha_hora,'Y-m-d');?>
" />
                    	<input type="hidden" name="hora_sola" id="hora_sola" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['editUser']->value->fecha_hora,'H:i');?>
" />

                    	<input type="hidden" name="coiffeur" id="coiffeur" value="" />

						<div class="form-body">

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
									<input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->nombre;?>
" id="nombreturno" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->nombre!='') {?> disabled="disabled" <?php }?>/>
									<input type="text" class="form-control cliente_nuevo " placeholder="escribe el teléfono del nuevo cliente" value="<?php echo $_smarty_tpl->tpl_vars['editUser']->value->telefono;?>
" id="telefonoturno" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->telefono!='') {?> disabled="disabled" <?php }?>/>
								</div>
							</div>




							<div class="form-group form-md-line-input">
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
				                <label for="servicio" class="control-label">Seleccioná el servicio</label>
							</div>

							<!--div class="form-group  form-md-line-input">
				                <select class="form-control" required="required" name="coiffeur" id="coiffeur">
					                <option value=""></option>
					                <?php if ($_smarty_tpl->tpl_vars['coiffeurs']->value) {?>
					                	<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coiffeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
					                    	<option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->coiffeur->id==$_smarty_tpl->tpl_vars['sub']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
 </option>
					                    <?php } ?>
					                <?php }?>
				                </select>
				                <label for="coiffeur" class="control-label">Seleccioná el coiffeur</label>
							</div-->
							<?php if ($_smarty_tpl->tpl_vars['editUser']->value) {?>
								<div class="form-group form-md-line-input">
					                <select class="form-control" required="required" name="estado" id="estado">
						                <option value=""></option>
						                <?php if ($_smarty_tpl->tpl_vars['estados']->value) {?>
						                	<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
						                    	<option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->estadoTurno->id==$_smarty_tpl->tpl_vars['sub']->value->id) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
 </option>
						                    <?php } ?>
						                <?php }?>

					                </select>
					                <label for="estado" class="control-label">Estado del turno</label>
								</div>
							<?php }?>
							<!--<?php if ($_smarty_tpl->tpl_vars['editUser']->value->fecha_hora) {?>-->

							<!--<?php }?>-->


							<div class="form-group form-md-line-input">
								<label class="control-label">Fecha del Turno</label>
									<div class="input-group date" >
									    <input type="text change_calendar" class="form-control" id="Adatepicker">
									    <div class="input-group-addon">
									        <span class="glyphicon glyphicon-th"></span>
									    </div>
									</div>
							</div>
							<!--div class="form-group">
                                <div id="Adatepicker" class="date-picker"></div>
                            </div-->

							<!--<div class="form-group">
	                            <label class="control-label col-md-3">Activo</label>
	                            <div class="col-md-9">
									<div class="checkbox-list">
	                                	<label><input name="activo" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['editUser']->value->activo==true) {?>checked="checked"<?php }?> /></label>
									</div>
	                            </div>
	                        </div-->

						</div>
						<!--div class="form-actions">
                            <button type="submit" class="btn green btn-lg">Guardar</button>
                            <a href="<?php echo site_url();?>
admin/turnos" class="btn btn-link btn-lg pull-right">Cancelar</a>
						</div-->
					<!-- END FORM-->
				</div>
		</div>
	</div>
		<div class="col-md-9">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Rango de horas</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
			 <div class="form-group" >
				 <!--OCULTAR CUANDO CORRESPONDA -->
				 <div class="alert alert-danger" id="ocultar_coiffeur" role="alert">Seleccioná el coiffeur</div>
                    <div class="list-group" id="listado_horario">
					</div>
				</div>
				</div>
			</div>
		</div>
		</form>

	</div>









<?php /*  Call merged included template "admin/turnos/item-horario-add.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/turnos/item-horario-add.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '170445bb3e621b85084-89957236');
content_5bb3e621ee0035_69740751($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/turnos/item-horario-add.tpl" */?>

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
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <?php echo '<script'; ?>
 src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"><?php echo '</script'; ?>
>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <?php echo '<script'; ?>
 src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.iframe-transport.js"><?php echo '</script'; ?>
>
    <!-- The basic File Upload plugin -->
    <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.fileupload.js"><?php echo '</script'; ?>
>
    <!-- The File Upload processing plugin -->
    <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.fileupload-process.js"><?php echo '</script'; ?>
>
    <!-- The File Upload image preview & resize plugin -->
    <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.fileupload-image.js"><?php echo '</script'; ?>
>
    <!-- The File Upload audio preview plugin -->
    <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"><?php echo '</script'; ?>
>
    <!-- The File Upload video preview plugin -->
    <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.fileupload-video.js"><?php echo '</script'; ?>
>
    <!-- The File Upload validation plugin -->
    <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"><?php echo '</script'; ?>
>


	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/spinner.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/jsrender.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/turnos.js?version=20180628"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			Turnos.initForm();
			$('#cliente').select2();
			$('#servicio').select2();
			Turnos.initFotoForm();
			$('#ocultar_coiffeur').show();
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:41:53
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\turnos\item-horario-add.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bb3e621ee0035_69740751')) {function content_5bb3e621ee0035_69740751($_smarty_tpl) {?><?php echo '<script'; ?>
 id="template_horario" type="text/x-jsrender">
	
		<table class="table">
			<thead>
				<th></th>
			
			{{for coiffeurs}}
				<th>{{:nombre}}</th>
			{{/for}}
			
			</thead>
		</table>

		<div class="list-group-item p-t-1">
			<div class="line"></div>
			<span class="m-r-1 hour">{{:Hora}} hs</span>
			{{for Turnos}}
				<button type="button" class="btn btn-sm {{:className}} bt_reserva" data-fecha="{{:fecha_turno}}"><i class="fa fa-clock-o" aria-hidden="true"></i> {{:start}} </button>
				<!--button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button-->
			{{/for}}
		</div>
	
<?php echo '</script'; ?>
><?php }} ?>
