<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-17 15:22:55
         compiled from "/var/www/daps/site/application/views/profile/historia-ficha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1587360571582c7f8d9cced1-99062913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc087e3449f66856b098fd70e62e381e54e47734' => 
    array (
      0 => '/var/www/daps/site/application/views/profile/historia-ficha.tpl',
      1 => 1492708042,
      2 => 'file',
    ),
    '8b6bf29005e804aae30b9bc4bda920a463d23194' => 
    array (
      0 => '/var/www/daps/site/application/views/base/base.tpl',
      1 => 1498751243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1587360571582c7f8d9cced1-99062913',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582c7f8da339c4_45208834',
  'variables' => 
  array (
    'page_nocache' => 0,
    'usuarioActual' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582c7f8da339c4_45208834')) {function content_582c7f8da339c4_45208834($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/daps/site/application/third_party/Smarty/plugins/modifier.date_format.php';
?><!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Diego Dap´s</title>

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
        


        <section id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mainSecctionId']->value)===null||$tmp==='' ? 'main' : $tmp);?>
">
            <div class="container">
            	<?php if ($_smarty_tpl->tpl_vars['hideSidebar']->value!=true) {?>
                	<?php echo $_smarty_tpl->getSubTemplate ('include/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                
			<div class="col-md-3 p-t-2" id="sidebar">
				<div class="panel panel-default">
					<div class="list-group">
					  <div class="list-group-item">
					  	<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['aTurno']->value->fecha_hora,"%e de %B de %Y");?>

					  </div>
					  <div class="list-group-item">
						<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['aTurno']->value->fecha_hora,"%k:%M");?>

					  </div>
					  <div class="list-group-item">
						<i class="fa fa-scissors" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['aTurno']->value->servicio->nombre;?>

					  </div>
					  <div class="list-group-item">
						<i class="fa fa-user" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['aTurno']->value->coiffeur->nombre;?>

					  </div>
					 
					</div>
				</div>
				<a href="<?php echo site_url();?>
profile/historial" class="btn btn-sm btn-primary">
					<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
				</a>
			</div>
			<div class="col-md-9 p-t-2" id="content">

				<div id="historial-carousel">
					<div class="wrap">
						<div id="fotos-slide" class="slider">
							<ul class="row">
					            <?php if (count($_smarty_tpl->tpl_vars['aTurno']->value->fotos)>0) {?>
									<?php  $_smarty_tpl->tpl_vars['foto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aTurno']->value->fotos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foto']->key => $_smarty_tpl->tpl_vars['foto']->value) {
$_smarty_tpl->tpl_vars['foto']->_loop = true;
?>
					                <li>
					                    <img src="<?php echo \Managers\ImagenManager::getInstance()->getUrl($_smarty_tpl->tpl_vars['foto']->value,'full');?>
" height="400" width="auto" alt=".." />
					                </li>
					             <?php } ?>
								<?php } else { ?>
									<li>
										<img src="<?php echo site_url();?>
assets/images/default-historial.jpg" alt="..." class="img-responsive">
								    </li>
								<?php }?>
				        	</ul>
				    	</div>
				    	<div class="controls">
							<a href="#" class="prev-slide">
								<div class="control left"></div>
							</a>
							<a href="#" class="next-slide">
								<div class="control right"></div>
							</a>
						</div>
					</div>
				</div>



			</div>

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
assets/js/vendor/lemmon-slider.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function(){
			$('#fotos-slide').lemmonSlider();
		});
	<?php echo '</script'; ?>
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
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        <?php echo '</script'; ?>
>
        

    </body>
</html>
<?php }} ?>
