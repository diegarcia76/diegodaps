<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-26 11:46:23
         compiled from "/var/www/daps/site/application/views/admin/turnos/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1753015165835bb266a0b33-48609527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04f71eb6804aa744acabc36baf06b64a29552851' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/turnos/dashboard.tpl',
      1 => 1524743783,
      2 => 'file',
    ),
    'a51a3942a48197d80a1a5bd6755a0795d9719aed' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/base/base_login.tpl',
      1 => 1519844844,
      2 => 'file',
    ),
    '832943cbd7b95a75592bc606d4b00af3b86c7407' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/turnos/item-horario.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1753015165835bb266a0b33-48609527',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5835bb267772c6_92032166',
  'variables' => 
  array (
    'pageTitle' => 0,
    'pageSubtitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5835bb267772c6_92032166')) {function content_5835bb267772c6_92032166($_smarty_tpl) {?><!DOCTYPE html>
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
admin/turnos/add"> <i class="icon-plus"></i> Agregar Turno</a>
						<a class="btn green" href="<?php echo site_url();?>
admin/clientes/add"> <i class="icon-plus"></i> Agregar Cliente</a>
		            </div>
		            <div class="col-sm-6 hidden-xs text-right">
		            	<ul class="list-unstyled list-inline list-estados">
	                    	<li><span class="label reservado "> Reservado</span></li>
	                    	<li><span class="label recepcionado"> Recepcionado</span></li>
	                    	<li><span class="label enservicio"> En Servicio</span></li>
	                    	<li><span class="label cancelado"> Cancelado</span></li>
	                    	<li><span class="label terminado"> Terminado</span></li>
	                    	<li><span class="label cobrado"> Cobrado</span></li>
	                    </ul>
		            </div>
		        </div>
	    </div>
    </div>

    <div class="dahsboard-turnos">
    	<div class="wpr-datepicker">
        	<div id="Adatepicker" class="date-picker"></div>
        </div>
        <div class="table-responsive" id="tab-turnos">
            <ul class="nav nav-tabs text-center">
                <?php  $_smarty_tpl->tpl_vars['co'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['co']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCoiffeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['co']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['co']->key => $_smarty_tpl->tpl_vars['co']->value) {
$_smarty_tpl->tpl_vars['co']->_loop = true;
 $_smarty_tpl->tpl_vars['co']->index++;
 $_smarty_tpl->tpl_vars['co']->first = $_smarty_tpl->tpl_vars['co']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['obj']['first'] = $_smarty_tpl->tpl_vars['co']->first;
?>
                    <li role="presentation" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['obj']['first']) {?> class="active" <?php }?>>
                        <a href="#<?php echo $_smarty_tpl->tpl_vars['co']->value->id;?>
" data-id-coiffeur="<?php echo $_smarty_tpl->tpl_vars['co']->value->id;?>
" aria-controls="now" role="tab" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['co']->value->nombre;?>
</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content">
                <?php  $_smarty_tpl->tpl_vars['co'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['co']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCoiffeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['co']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['co']->key => $_smarty_tpl->tpl_vars['co']->value) {
$_smarty_tpl->tpl_vars['co']->_loop = true;
 $_smarty_tpl->tpl_vars['co']->index++;
 $_smarty_tpl->tpl_vars['co']->first = $_smarty_tpl->tpl_vars['co']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['obje']['first'] = $_smarty_tpl->tpl_vars['co']->first;
?>
                    <div role="tabpanel" class="tab-pane <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['obje']['first']) {?> active <?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['co']->value->id;?>
">
                        <div class="list-group" id="listado_horario_<?php echo $_smarty_tpl->tpl_vars['co']->value->id;?>
">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

	<?php /*  Call merged included template "admin/turnos/item-horario.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/turnos/item-horario.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1753015165835bb266a0b33-48609527');
content_5ae1e63fcce968_69891713($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/turnos/item-horario.tpl" */?>


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
assets/common/plugins/jsrender.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/admin/js/turnos.js?version=20180425"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			Turnos.init();
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-26 11:46:23
         compiled from "/var/www/daps/site/application/views/admin/turnos/item-horario.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5ae1e63fcce968_69891713')) {function content_5ae1e63fcce968_69891713($_smarty_tpl) {?><?php echo '<script'; ?>
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
