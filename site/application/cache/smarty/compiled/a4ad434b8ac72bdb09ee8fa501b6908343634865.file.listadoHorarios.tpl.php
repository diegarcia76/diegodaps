<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 18:46:01
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\coiffeurs\listadoHorarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194245bbb89c9f40af9-42728424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4ad434b8ac72bdb09ee8fa501b6908343634865' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\coiffeurs\\listadoHorarios.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '72f6439d088a8da6474558059088296cf6d5ba24' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\base\\base_login.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '1e57b5887b755b49e54cafa4aa9a5b6c958a3df4' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\coiffeurs\\item-horario.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '442cc83a23ec44b0eba1d4d18f49c59f8657d075' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\coiffeurs\\item-ausencia.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194245bbb89c9f40af9-42728424',
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
  'unifunc' => 'content_5bbb89cacd53c7_30371245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbb89cacd53c7_30371245')) {function content_5bbb89cacd53c7_30371245($_smarty_tpl) {?><!DOCTYPE html>
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
assets/common/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css"/>

    <style type="text/css">
        #tblPremiosSorteo tr.ui-sortable-placeholder{
            height: 40px;
            background: #f5f5f5;
            border: 2px dashed #999;
        }

        #tblPremiosSorteo tr.ui-sortable-helper{
            height: 40px;
            background: #f5f5f5;
            border: 1px dashed #f0f0f0;
        }

        input.timepicker{
            width: 100px !important;
        }

        .input-group-addon{
            width: 0% !important;
        }

    </style>

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
                	

    <form action="/admin/coiffeurs/save_horarios" id="frmPremios" name="frmPremios" class="form-horizontal" method="POST">
                    <input type="hidden" id="coiffeur_id" name="coiffeur_id" value="<?php echo $_smarty_tpl->tpl_vars['coiffeur']->value->id;?>
" />
                    <table id="tblPremiosSorteo" class="table table-stripped table-responsive">
                    <thead>
                        <tr>
                            <th>Día de Semana</th>
                            <th>Horario Desde</th>
                            <th>Horario Hasta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="wpr-imagenes-carrusel">
                        <?php  $_smarty_tpl->tpl_vars['ha'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ha']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coiffeur']->value->horariosDeAtencionXCoiffeur; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ha']->key => $_smarty_tpl->tpl_vars['ha']->value) {
$_smarty_tpl->tpl_vars['ha']->_loop = true;
?>
                            <?php /*  Call merged included template "admin/coiffeurs/item-horario.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/coiffeurs/item-horario.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '194245bbb89c9f40af9-42728424');
content_5bbb89ca991fa5_68089179($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/coiffeurs/item-horario.tpl" */?>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="5">
                                <div class="text-right">
                                    <a href="#" class="btn green btnAddPremio pull-left"><i class="icon-plus"></i> Agregar horario</a>
                                    <a href="<?php echo site_url();?>
admin/coiffeurs" class="btn"><i class="icon-angle-left"></i> Cancelar</a>
                                    <button type="submit" class="btn green btnGuardar"><i class="icon-check"></i> Guardar</button>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    </table>
            </form>

    <h1>Horarios especiales</h1>
    <a class="btn green" href="<?php echo site_url();?>
admin/coiffeurs/administrar_horarios_especiales/0/<?php echo $_smarty_tpl->tpl_vars['coiffeur']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Administrar Horarios Especiales"><i class="fa fa-clock-o"></i> Definir Horarios Especiales para <?php echo $_smarty_tpl->tpl_vars['coiffeur']->value->nombre;?>
</a>

    <h1>Ausencias y Vacaciones</h1>
    <form action="/admin/coiffeurs/save_ausencias" id="frmAusencias" name="frmAusencias" class="form-horizontal" method="POST">
            <input type="hidden" id="coiffeur_id" name="coiffeur_id" value="<?php echo $_smarty_tpl->tpl_vars['coiffeur']->value->id;?>
" />
            <table id="tblAusencias" class="table table-stripped table-responsive">
            <thead>
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Motivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="wpr-ausencias-body">
                <?php  $_smarty_tpl->tpl_vars['ha'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ha']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coiffeur']->value->ausencias; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ha']->key => $_smarty_tpl->tpl_vars['ha']->value) {
$_smarty_tpl->tpl_vars['ha']->_loop = true;
?>
                    <?php /*  Call merged included template "admin/coiffeurs/item-ausencia.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/coiffeurs/item-ausencia.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '194245bbb89c9f40af9-42728424');
content_5bbb89cab080f2_79531716($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/coiffeurs/item-ausencia.tpl" */?>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="5">
                        <div class="text-right">
                            <a href="#" class="btn green btnAddAusencia pull-left"><i class="icon-plus"></i> Agregar Ausencia</a>
                            <a href="<?php echo site_url();?>
admin/coiffeurs" class="btn"><i class="icon-angle-left"></i> Cancelar</a>
                            <button type="submit" class="btn green btnGuardar"><i class="icon-check"></i> Guardar</button>
                        </div>
                    </td>
                </tr>
            </tfoot>
            </table>
    </form>



    <?php $_smarty_tpl->tpl_vars['ha'] = new Smarty_variable(false, null, 0);?>
    <?php /*  Call merged included template "admin/coiffeurs/item-horario.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/coiffeurs/item-horario.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '194245bbb89c9f40af9-42728424');
content_5bbb89ca991fa5_68089179($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/coiffeurs/item-horario.tpl" */?>
    <?php /*  Call merged included template "admin/coiffeurs/item-ausencia.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/coiffeurs/item-ausencia.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '194245bbb89c9f40af9-42728424');
content_5bbb89cab080f2_79531716($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/coiffeurs/item-ausencia.tpl" */?>



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
assets/common/plugins/jquery.form.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/horarios.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){

            Horarios.init();

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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 18:46:02
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\coiffeurs\item-horario.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bbb89ca991fa5_68089179')) {function content_5bbb89ca991fa5_68089179($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
?><?php if (!$_smarty_tpl->tpl_vars['ha']->value) {?> <table style="display: none;" id="diapositiva-layout" ><?php }?>
    <tr class="admin-imagen-carrusel" >
        <td>
            <select class="form-control" id="premio-dia-<?php echo $_smarty_tpl->tpl_vars['ha']->value->id;?>
" name="dia[]">
                <?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value) {
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['dia']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['dia']->value->id==$_smarty_tpl->tpl_vars['ha']->value->diaSemana->id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['dia']->value->nombre;?>
</option>
                <?php } ?>
            </select>
        </td>
        <td>

            <div class="input-group bootstrap-timepicker timepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                <!--input id="premio-titulo-<?php echo $_smarty_tpl->tpl_vars['ha']->value->id;?>
" name="horaDesde[]" class="form-control timepicker" value="<?php if ($_smarty_tpl->tpl_vars['ha']->value) {
echo $_smarty_tpl->tpl_vars['ha']->value->horaDesde->format('H:i A');
}?>" required class="required" type="text"-->
                <input id="premio-titulo-<?php echo $_smarty_tpl->tpl_vars['ha']->value->id;?>
" name="horaDesde[]" class="form-control timepicker" value="<?php if ($_smarty_tpl->tpl_vars['ha']->value) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ha']->value->horaDesde,'H:i');
}?>" required class="required" type="text">
            </div>
        </td>
        <td>
            <div class="input-group bootstrap-timepicker timepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                <input id="premio-description-<?php echo $_smarty_tpl->tpl_vars['ha']->value->id;?>
" name="horaHasta[]" class="form-control timepicker" value="<?php if ($_smarty_tpl->tpl_vars['ha']->value) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ha']->value->horaHasta,'H:i');
}?>" required class="required" type="text">
            </div>
        </td>

        <td>
            <div class="acctions text-right">
                <a href="#" class="btnEliminar btn btn-default"><i class="icon icon-trash"></i></a>
                <a href="#" class="btnAgregar btn btn-default"><i class="icon icon-plus"></i></a>
            </div>
        </td>
    </tr>
<?php if (!$_smarty_tpl->tpl_vars['ha']->value) {?> </table><?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 18:46:02
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\coiffeurs\item-ausencia.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bbb89cab080f2_79531716')) {function content_5bbb89cab080f2_79531716($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
?><?php if (!$_smarty_tpl->tpl_vars['ha']->value) {?> <table style="display: none;" id="ausencia-layout" ><?php }?>
    <tr class="tr-ausencia" >
        <td>
            <div class="input-group bootstrap-datetimepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="ausencia-inicio-<?php echo $_smarty_tpl->tpl_vars['ha']->value->id;?>
" name="fecha_inicio[]" class="form-control datepicker" value="<?php if ($_smarty_tpl->tpl_vars['ha']->value) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ha']->value->fecha_inicio,'Y-m-d');
}?>" required class="required" type="text" style="z-index: 2 !important;">
            </div>
        </td>
        <td>
            <div class="input-group bootstrap-datetimepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="ausencia-fin-<?php echo $_smarty_tpl->tpl_vars['ha']->value->id;?>
" name="fecha_fin[]" class="form-control datepicker" value="<?php if ($_smarty_tpl->tpl_vars['ha']->value) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ha']->value->fecha_fin,'Y-m-d');
}?>" required class="required" type="text" style="z-index: 2 !important;">
            </div>
        </td>
        <td>
            <input type="text" class="form-control" name="motivo[]" value="<?php if ($_smarty_tpl->tpl_vars['ha']->value) {
echo $_smarty_tpl->tpl_vars['ha']->value->motivo;
}?>" />
        </td>

        <td>
            <div class="acctions text-right">
                <a href="#" class="btnEliminar btn btn-default"><i class="icon icon-trash"></i></a>
                <a href="#" class="btnAgregar btn btn-default"><i class="icon icon-plus"></i></a>
            </div>
        </td>
    </tr>
<?php if (!$_smarty_tpl->tpl_vars['ha']->value) {?> </table><?php }?>
<?php }} ?>
