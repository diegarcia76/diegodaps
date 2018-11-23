<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181305bce0c8138b9f4-55280213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '562e305da5bf8c67d1adfd333f1ab926615bd22e' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\form.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '60ac2ff8bf46065cc589b8fbd89c13f620e36a16' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\base\\base.tpl',
      1 => 1542922660,
      2 => 'file',
    ),
    '52770e85bf33db55524d67043f3850598428b020' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\form-step-1.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '02915c2923aa9f7c5da954e2a569a1cfac57ef1d' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\form-step-2.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '7b9ab67f54b999bbbbb9f8b9fd2fb09c6145e8e4' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\item-horario.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '0f7ed2881e5989a71a1f61ad4556e2227b3251ef' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\form-step-3.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '806db121c22a132518561f28021b23bd4db8ca96' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\item-confirmacion-turno.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '46e4b0929b652b44190c1b96b15f45ed5b4fa079' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\form-step-4.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '594c4c29f4b4289e9cdf51c21864eee7d3c3e5be' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\item-coifffeur.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181305bce0c8138b9f4-55280213',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bce0c817c0d75_52520126',
  'variables' => 
  array (
    'page_nocache' => 0,
    'usuarioActual' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bce0c817c0d75_52520126')) {function content_5bce0c817c0d75_52520126($_smarty_tpl) {?><!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Diego Dap's</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if ($_smarty_tpl->tpl_vars['page_nocache']->value==true) {?>
        <meta http-equiv="Cache-Control" content="no-cache"/>
        <?php }?>

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php echo site_url();?>
assets/stylesheets/bootstrap.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href="<?php echo site_url();?>
home/cssEstados.css" rel="stylesheet" type="text/css"/>

        <style>
            body {
                padding-top: 68px;
                padding-bottom: 20px;
            }
            .modal-dialog{
                z-index: 1041;
            }
        </style>

                
        <!-- Facebook Pixel Code -->
        <?php echo '<script'; ?>
>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '344165956080294');
          fbq('track', 'PageView');
        <?php echo '</script'; ?>
>
        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=344165956080294&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
                


        

<link rel="stylesheet" href="<?php echo site_url();?>
assets/common/plugins/calendarPicker/jquery.calendarPicker.css">

<style type="text/css">

    .anterior { background-color: #CCCCCC; }

</style>



    </head>
    <body >


        <!--[if lt IE 8]>
            <p class="browserupgrade">Tu explorador está <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualizalo</a> para ver todas las funcionalidades del sitio.</p>
        <![endif]-->

		<!--<div class="app">
			<img src="<?php echo site_url();?>
assets/images/splash.jpg" width="90%" height="auto">
			<div class="m-t-1 m-l-2 m-r-2">
				<div class="col-xs-6 text-center">
					<img src="<?php echo site_url();?>
assets/images/app-store.png" alt="app-store" style="margin:0 auto;" width="150" height="auto">
				</div>
				<div class="col-xs-6 text-center">
					<img src="<?php echo site_url();?>
assets/images/googleplay.png" alt="googleplay" style="margin:0 auto;" width="150" height="auto">
				</div>
			</div>
		</div>-->


		<?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>
       		 <?php echo $_smarty_tpl->getSubTemplate ('include/top-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	   	<?php }?>
        
<input type="hidden" id="servicio_id">
<input type="hidden" id="turno_id" value="<?php echo $_smarty_tpl->tpl_vars['aTurno']->value->id;?>
">
<input type="hidden" id="coiffeur_id">
<input type="hidden" id="fecha_turno">
<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
	<input type="hidden" id="puntos_servicio">
<?php }?>
	<div class="steper">
		<div class="step-container">
			<div class="step-count active" id="step-count-1">
				<div class="number">1</div>
				<div class="text">SERVICIO</div>
			</div>
			<div class="separator count-2">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
			<div class="step-count count-2" id="step-count-2">
				<div class="number">2</div>
				<div class="text">COIFFEUR</div>
			</div>
			<div class="separator count-3">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
			<div class="step-count count-3" id="step-count-3">
				<div class="number">3</div>
				<div class="text">TURNO</div>
			</div>
			<div class="separator count-4">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
			<div class="step-count count-4" id="step-count-4">
				<div class="number">4</div>
				<div class="text">CONFIRMAR</div>
			</div>
			<div class="clearfix"></div>
		</div>
    </div>


        <section id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mainSecctionId']->value)===null||$tmp==='' ? 'main' : $tmp);?>
">
            <div class="container">
            	<?php if ($_smarty_tpl->tpl_vars['hideSidebar']->value!=true) {?>
                	<?php echo $_smarty_tpl->getSubTemplate ('include/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                
	<?php /*  Call merged included template "turnos/form-step-1.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203a82586_09598550($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-1.tpl" */?>
	<?php /*  Call merged included template "turnos/form-step-2.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203bfb191_88352342($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-2.tpl" */?>
	<?php /*  Call merged included template "turnos/form-step-3.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-3.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203c1e696_47257354($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-3.tpl" */?>
	<?php /*  Call merged included template "turnos/form-step-4.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-4.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203cb0fa0_13761943($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-4.tpl" */?>
	<?php /*  Call merged included template "turnos/item-coifffeur.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/item-coifffeur.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203cfa5d7_73367786($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/item-coifffeur.tpl" */?>

            </div>
        </section>




        <!-- Modal -->
        <div class="modal fade" id="cancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Cancelar</h4>
              ¿Estás seguro que querés cancelar?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm cancelar pull-left" data-dismiss="modal">Cerrar</button>

                <button type="button" class="btn btn-danger cancelar" data-dismiss="modal">Si, quiero cancelar</button>
              </div>
            </div>
          </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ('include/js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('include/dialogs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <?php echo $_smarty_tpl->getSubTemplate ('include/bottom-footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/vendor/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://use.fontawesome.com/830a1bbed5.js"><?php echo '</script'; ?>
>

        <!-- Plugins -->
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url();?>
assets/common/plugins/dialogs.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery-validation/js/localization/messages_es.js" type="text/javascript"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo assets_url('js/login.js');?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jquery.form.js" type="text/javascript"><?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/plugins.js"><?php echo '</script'; ?>
>

        
	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/calendarPicker/test/jquery.mousewheel.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/jsrender.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/common/plugins/calendarPicker/jquery.calendarPicker.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/turnosAdd.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
>
            jQuery(document).ready(function() {
                //App.init(); // init metronic core components
                Login.init(); // init current layout
                
            });
        <?php echo '</script'; ?>
>

        
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <?php echo '<script'; ?>
>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-88963860-1','auto');ga('send','pageview');
        <?php echo '</script'; ?>
>
        

    </body>
</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\form-step-1.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203a82586_09598550')) {function content_5bf72203a82586_09598550($_smarty_tpl) {?><div id="step-1" class="step active">
				<div class="col-md-12 title text-center">

					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el servicio</h3>

				</div>
				<div class="col-md-6 col-md-offset-3">
					<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
						<div class="puntos-acumulados">
							Tus Puntos
							<span class="puntos"> <i class="fa fa-money" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados;?>
</span>
						</div>
					<?php }?>
					<div class="panel panel-default">
						<div class="list-group">
						<?php  $_smarty_tpl->tpl_vars['serv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['serv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['serv']->key => $_smarty_tpl->tpl_vars['serv']->value) {
$_smarty_tpl->tpl_vars['serv']->_loop = true;
?>
							<?php if (!$_smarty_tpl->tpl_vars['canje']->value) {?>
							  <button class="list-group-item nexter <?php if ($_smarty_tpl->tpl_vars['serv']->value->id==$_smarty_tpl->tpl_vars['aTurno']->value->servicio->id) {?> anterior bg-success <?php }?>" data-id-servicio="<?php echo $_smarty_tpl->tpl_vars['serv']->value->id;?>
" data-puntos-servicio="<?php echo $_smarty_tpl->tpl_vars['serv']->value->precio_puntos;?>
" >
							  	<?php if ($_smarty_tpl->tpl_vars['serv']->value->id==$_smarty_tpl->tpl_vars['aTurno']->value->servicio->id) {?><i class="fa fa-check txt-success" aria-hidden="true"> </i> <?php }?> <?php echo $_smarty_tpl->tpl_vars['serv']->value->nombre;?>

							  	<div class="pull-right m-l-1">
							  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
							  	</div>
							  	<div class="pull-right">
								  	<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['serv']->value->duracion;?>
 min
							  	</div>
							  	
							  </button>
							<?php } else { ?>
								<?php if ($_smarty_tpl->tpl_vars['serv']->value->precio_puntos>0) {?>	
									<button class="list-group-item nexter <?php if ($_smarty_tpl->tpl_vars['serv']->value->id==$_smarty_tpl->tpl_vars['aTurno']->value->servicio->id) {?> anterior bg-success <?php }?>" data-id-servicio="<?php echo $_smarty_tpl->tpl_vars['serv']->value->id;?>
" data-puntos-servicio="<?php echo $_smarty_tpl->tpl_vars['serv']->value->precio_puntos;?>
" <?php if (($_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados<$_smarty_tpl->tpl_vars['serv']->value->precio_puntos)&&($_smarty_tpl->tpl_vars['canje']->value)) {?> disabled style="background-color:#f5f5f5;" <?php }?>>
								  	<?php if ($_smarty_tpl->tpl_vars['serv']->value->id==$_smarty_tpl->tpl_vars['aTurno']->value->servicio->id) {?><i class="fa fa-check txt-success" aria-hidden="true"> </i> <?php }?> <?php echo $_smarty_tpl->tpl_vars['serv']->value->nombre;?>

								  	<div class="pull-right m-l-1">
								  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
								  	</div>
								  	<div class="pull-right">
									  	<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['serv']->value->duracion;?>
 min
								  	</div>
								  	<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
									  	<div class="pull-right" style="margin-right: 20px; color: #AA9259; font-weight: bold;">
										  	<i class="fa fa-money" aria-hidden="true"></i>
		 <?php echo $_smarty_tpl->tpl_vars['serv']->value->precio_puntos;?>

									  	</div>
								  	<?php }?>
								  </button>
								<?php }?>
							<?php }?>
						<?php } ?>
						  <!--button class="list-group-item nexter">
						  	Coloración
						  	<div class="pull-right m-l-1">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  	<div class="pull-right">
							  	<i class="fa fa-clock-o" aria-hidden="true"></i> 30 min
						  	</div>
						  </button>
						  <button class="list-group-item nexter">
						  	Lavado
						  	<div class="pull-right m-l-1">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  	<div class="pull-right">
							  	<i class="fa fa-clock-o" aria-hidden="true"></i> 30 min
						  	</div>
						  </button-->
						</div>
					</div>
					<a href="<?php echo site_url();?>
" class="btn btn-sm btn-primary">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\form-step-2.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203bfb191_88352342')) {function content_5bf72203bfb191_88352342($_smarty_tpl) {?><div id="step-2" class="step">
	<div class="col-md-12 title text-center">
		<h6 class="text-primary">NUEVO TURNO</h6>
		<h3 class="m-t-0 p-t-0">Elegí el coiffeur</h3>
		<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
			<!--<h5>Tus Puntos: <?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados;?>
</h5>-->
			<!--<h5>Canjeando Servicio de <span id="puntos_servicio_canjear"></span></h5>-->
		<?php }?>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="list-group" id="listado_coiffeurs">

			</div>
		</div>
		<a href="#" class="btn btn-sm btn-primary prever">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
		</a>
	</div>
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\form-step-3.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203c1e696_47257354')) {function content_5bf72203c1e696_47257354($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
?><div id="step-3" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el turno</h3>
					<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
						<!--<h5>Tus Puntos: <?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados;?>
</h5>
						<h5>Canjeando Servicio de <span id="puntos_servicio_canjear_3"></span></h5>-->
					<?php }?>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<ul class="nav nav-tabs text-center">
						  <li role="presentation" class="active"><a href="#now" aria-controls="now" role="tab" data-toggle="tab">HOY</a></li>
						  <li role="presentation" class="">
						  <a href="#tomorrow" aria-controls="tomorrow" role="tab" data-toggle="tab">
						  	<?php if (smarty_modifier_date_format("+1 days","%w")==0) {?>
						  		<?php echo mb_strtoupper(smarty_modifier_date_format("+2 days","%A"), 'UTF-8');?>

						  	<?php } else { ?>
						  		<?php echo mb_strtoupper(smarty_modifier_date_format("+1 days","%A"), 'UTF-8');?>

						  	<?php }?>
						  </a></li>
						  <li role="presentation" class=""><a href="#other" aria-controls="other" role="tab" data-toggle="tab">OTRO DIA</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="now">
								<div class="list-group" id="listado_horario_hoy">

								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="tomorrow">
								<div class="list-group" id="listado_horario_manana">

								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="other">

								<div class="list-group">

									<div class="list-group-item p-x-0">
										<div id="dsel1" style="width:540px"></div>
									</div>
									<div class="list-group" id="listado_horario_otro">

									</div>

								</div>

							</div>
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div>

<div class="modal modal-viaturno" id="modal-loading" data-backdrop="static">
  <div class="modal-dialog">
    <div class="text-center"> 
    <div class="col-md-2 col-md-offset-5">
    	<i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color:#fff;" aria-hidden="true"></i>
    </div>
  
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->


	<?php /*  Call merged included template "turnos/item-horario.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/item-horario.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203c99510_73704498($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/item-horario.tpl" */?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\item-horario.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203c99510_73704498')) {function content_5bf72203c99510_73704498($_smarty_tpl) {?><?php echo '<script'; ?>
 id="template_horario" type="text/x-jsrender">
	
		<div class="list-group-item p-t-1">
			<div class="line"></div>
			<span class="m-r-1 hour">{{:Hora}} hs</span>
			{{for Turnos}}
				<button class="btn btn-sm {{:className}} {{if className != 'nodisponible'}} nexter {{/if}} " data-fecha="{{:fecha_turno}}" {{if className == 'nodisponible'}} disabled {{/if}}>
					<i class="fa fa-clock-o" aria-hidden="true"></i> {{:start}}
				</button>
			{{/for}}
		</div>
	
<?php echo '</script'; ?>
><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\form-step-4.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203cb0fa0_13761943')) {function content_5bf72203cb0fa0_13761943($_smarty_tpl) {?><div id="step-4" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Confirmar el turno</h3>
					<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
						<!--<h5>Tus Puntos: <?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados;?>
</h5>-->
						<!--<h5>Canjeando Servicio de <span id="puntos_servicio_canjear_4"></span></h5>-->
					<?php }?>
				</div>
				<div class="col-md-4 col-md-offset-4 panel_confirmacion hidden">
					<div class="alert alert-danger lista message" style="display: none;" role="alert">
						TU TURNO ESTÃ EN LISTA DE ESPERA<br>
						En el caso de que otra persona cancele te avisamos.
					</div>
					<?php if ($_smarty_tpl->tpl_vars['canje']->value) {?>
						<div class="alert alert-warning" role="alert">
							SE RESTARÃN <i class="fa fa-money text-primary" aria-hidden="true"></i> <strong><span id="puntos_servicio_canjear_4" class="text-primary"></span></strong> PUNTOS DE TUS ACUMULADOS.
						</div>
					<?php }?>
					<div class="panel panel-default" id="confirmacion">
						<div class="list-group" id="confirmacion_turno">

						</div>
					</div>
					<div class="panel panel-default animated" id="ok-panel">
						<div class="ok"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div>
						<div class="ok-text">Ya reservaste tu turno. ¡Te esperamos!</div>
					</div>
					<div class="panel panel-default animated hidden" id="nok-panel">
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text">Perdón :(, no pudimos reservar tu turno. Intentá nuevamente más tarde.</div>
					</div>					
					<a href="#" class="btn btn-success nexter m-0-a pull-right">
						confirmar
					</a>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_no_reserva hidden">
					<div class="panel panel-default">
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text"><strong>Ya tenés un turno para hoy con ese servicio.</strong><br>
						<small>Por favor, elegí otro día para que podamos atenderte.</small></div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_no_edicion hidden">
					<div class="panel panel-default" >
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text">NO PUEDES EDITAR NUEVAMENTE EL TURNO<br>
						No podés editar el turno mas de una vez por día!.</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_bloqueado hidden">
					<div class="panel panel-default" >
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text"></div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_no_sobreturno hidden">
					<div class="panel panel-default">
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text"><strong>Ya hay tomado un turno para hoy con ese servicio.</strong><br>
						<small>Por favor, elegí otro horario para que podamos atenderte.</small></div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

			</div>


	<?php /*  Call merged included template "turnos/item-confirmacion-turno.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/item-confirmacion-turno.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '181305bce0c8138b9f4-55280213');
content_5bf72203ce05b0_86233921($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/item-confirmacion-turno.tpl" */?>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\item-confirmacion-turno.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203ce05b0_86233921')) {function content_5bf72203ce05b0_86233921($_smarty_tpl) {?><?php echo '<script'; ?>
 id="template_confirmacion_turno" type="text/x-jsrender">
	
		<div class="list-group-item">
		  	<i class="fa fa-calendar" aria-hidden="true"></i> {{:fecha_sola}}
		</div>
		<div class="list-group-item">
			<i class="fa fa-clock-o" aria-hidden="true"></i> {{:hora_sola}}
		</div>
		<div class="list-group-item">
			<i class="fa fa-scissors" aria-hidden="true"></i> {{:servicio}}
		</div>
		<div class="list-group-item">
			<i class="fa fa-user" aria-hidden="true"></i> {{:coiffeur}}
		</div>
	
<?php echo '</script'; ?>
><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:39:15
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\item-coifffeur.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bf72203cfa5d7_73367786')) {function content_5bf72203cfa5d7_73367786($_smarty_tpl) {?><?php echo '<script'; ?>
 id="template_coiffeur" type="text/x-jsrender">
	
		<button class="list-group-item nexter {{if id == ~turno_id}} anterior {{/if}}" data-id-coiffeur="{{:id}}">
			<img src="{{:foto}}" alt="{{:nombre}}" width="50" height="50" class="img-circle pull-left"/>
			<div class="pull-left m-l-1 name">			
				<div>{{:nombre}}</div>			
			</div>
			<div class="pull-right m-l-1 arrow">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
		</button>
	
<?php echo '</script'; ?>
><?php }} ?>
