<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-03-02 13:59:26
         compiled from "/var/www/daps/site/application/views/profile/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1948548357582c7de00aa305-61771999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ee10804050d5032b4602d496db7b43e7119e07a' => 
    array (
      0 => '/var/www/daps/site/application/views/profile/form.tpl',
      1 => 1520009937,
      2 => 'file',
    ),
    '8b6bf29005e804aae30b9bc4bda920a463d23194' => 
    array (
      0 => '/var/www/daps/site/application/views/base/base.tpl',
      1 => 1519842473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1948548357582c7de00aa305-61771999',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582c7de012d6e7_58267290',
  'variables' => 
  array (
    'page_nocache' => 0,
    'usuarioActual' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582c7de012d6e7_58267290')) {function content_582c7de012d6e7_58267290($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/daps/site/application/third_party/Smarty/plugins/modifier.date_format.php';
?><!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
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
                


        
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>
assets/common/plugins/bootstrap-datepicker/css/datepicker.css"/>


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
                
			<div id="content" class="col-md-12 col-lg-9 p-t-2">
				<div class="panel panel-default">
					<div class="row">
						<form id="frmSaveProfile" class="p-x-2 p-y-2" method="post" action="<?php echo site_url();?>
profile/save">
						<input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->id;?>
">
						<div class="col-md-6">
						 <div class="form-group">
						    <label for="name">NOMBRE</label>
						    <input type="text" class="form-control" id="name" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->nombre;?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="email">EMAIL</label>
						    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->email;?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="fecha-nacimiento">FECHA DE NACIMIENTO</label>
							<input type="text" class="form-control date-picker" data-mask="99-99-9999" name="fecha_nacimiento" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['usuarioActual']->value->fecha_nacimiento,"%d-%m-%Y");?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="phone">TELÉFONO</label>
						    <input type="phone" class="form-control" id="phone" name="telefono" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->telefono;?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="profesion">PROFESIÓN</label>
						    <select name="profesion" class="form-control">
						    	<?php  $_smarty_tpl->tpl_vars['pro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aProfesiones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pro']->key => $_smarty_tpl->tpl_vars['pro']->value) {
$_smarty_tpl->tpl_vars['pro']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['pro']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['pro']->value->id==$_smarty_tpl->tpl_vars['usuarioActual']->value->profesion->id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['pro']->value->nombre;?>
</option>
								<?php } ?>
							</select>
						  </div>
				<a href="/" class="btn btn-sm btn-primary">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
							</a>						</div>
						<div class="col-md-6">
						  
						  <div class="form-group">
						    <label for="whatsapp">WHATSAPP</label>
						    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->whatsapp;?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="facebook">FACEBOOK</label>
							<input type="text" class="form-control" name="facebook" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->facebook;?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="twitter">TWITTER</label>
						    <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->twitter;?>
">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="password">CONTRASEÑA</label>
						    <input type="password" class="form-control" id="password" name="password" value="">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="password2">REPETIR CONTRASEÑA</label>
						    <input type="password" class="form-control" id="password2" name="password2" value="">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <button type="submit" name="" class="btn btn-success btn-lg pull-right">confirmar</button>

						</div>
						<div class="clearfix"></div>

						</form>
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
assets/common/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"><?php echo '</script'; ?>
> 
	<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/profile.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
    	$(function(){
			Profile.init();
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
            ga('create','UA-88963860-1','auto');ga('send','pageview');
        <?php echo '</script'; ?>
>
        

    </body>
</html>
<?php }} ?>