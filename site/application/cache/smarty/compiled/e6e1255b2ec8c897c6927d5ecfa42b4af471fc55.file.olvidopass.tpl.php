<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-27 11:21:13
         compiled from "/var/www/daps/site/application/views/olvidopass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6361527587ceb30649663-99191185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6e1255b2ec8c897c6927d5ecfa42b4af471fc55' => 
    array (
      0 => '/var/www/daps/site/application/views/olvidopass.tpl',
      1 => 1493302864,
      2 => 'file',
    ),
    '8b6bf29005e804aae30b9bc4bda920a463d23194' => 
    array (
      0 => '/var/www/daps/site/application/views/base/base.tpl',
      1 => 1485189415,
      2 => 'file',
    ),
    '285a60707cb8417dc46f4e397b1d3275210e8cfd' => 
    array (
      0 => '/var/www/daps/site/application/views/include/olvido-box.tpl',
      1 => 1493302864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6361527587ceb30649663-99191185',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587ceb306c2166_72680120',
  'variables' => 
  array (
    'page_nocache' => 0,
    'usuarioActual' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587ceb306c2166_72680120')) {function content_587ceb306c2166_72680120($_smarty_tpl) {?><!doctype html>
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

        
<style type="text/css">

    div.test { display:none }

</style>


    </head>
    <body class="login">


        <!--[if lt IE 8]>
            <p class="browserupgrade">Tu explorador está <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualizalo</a> para ver todas las funcionalidades del sitio.</p>
        <![endif]-->

		<div class="app">
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
		</div>


		<?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>
       		 <?php echo $_smarty_tpl->getSubTemplate ('include/top-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	   	<?php }?>
        

        <section id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mainSecctionId']->value)===null||$tmp==='' ? 'main' : $tmp);?>
">
            <div class="container">
            	<?php if ($_smarty_tpl->tpl_vars['hideSidebar']->value!=true) {?>
                	<?php echo $_smarty_tpl->getSubTemplate ('include/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                

<div class="row">
 <div class="col-md-12">
   <div class="logo text-center" style="margin-bottom: -65px; z-index: 1; position: relative;">
     <a href="<?php echo site_url();?>
"><img src="<?php echo site_url();?>
assets/images/isologo_4.svg" width="230" height="auto"/></a>
   </div>
 </div>

  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default p-t-3" style="border: 4px solid #be9e54;">
    <?php /*  Call merged included template "include/olvido-box.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('include/olvido-box.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '6361527587ceb30649663-99191185');
content_5901fe59771bf0_19039225($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "include/olvido-box.tpl" */?>
  </div>
  </div>
</div>




<!--<div class="background">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 animated bounceInRight login-box">
        <h2>¿Olvidaste tu clave?</h2>
        <h4>Ingresá tu correo electrónico</h4>
        <form action="<?php echo site_url();?>
registro/olvidopass" method="post" id='form_forgot' >
          <div class="form-group">
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-verde btn-block btn-lg">Recuperar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>-->

<!-- MODAL PASS -->
<div class="modal fade modal-verde modal-viaturno" id="modal-olvido-pass">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span></button>
      <div class="text-center">
        <h1 class="modal-title color-verde">Recuperar Contraseña</h1>
        <p>Te hemos enviado un mail a tu correo electrónico para recuperar tu contraseña.</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade modal-verde modal-viaturno" id="modal-olvido-pass-error">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span></button>
      <div class="text-center">
        <h1 class="modal-title">Recuperar Contraseña</h1>
        <p>El correo no existe en nuestra base de datos.</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<!-- /.modal -->


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
assets/js/registro.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            Registro.initRecuperar();
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-27 11:21:13
         compiled from "/var/www/daps/site/application/views/include/olvido-box.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5901fe59771bf0_19039225')) {function content_5901fe59771bf0_19039225($_smarty_tpl) {?><div class="login-box">
	<div class="inner text-center">
        	<h3>Recuperá tu cuenta</h3>
					<hr/>
            <h5 class="text-left">Ingresá tu email</h5>
						<form action="<?php echo site_url();?>
registro/olvidopass" method="post" id="form_forgot" class="frmRegistro">
						<div class="form-group">
	            <div class="inner-addon left-addon">
	              <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
	            </div>
	          </div>
	          <div class="form-group">
	            <button type="submit" class="btn btn-primary btn-block">Recuperar</button>
	          </div>
        </form>
    </div>
</div>
<?php }} ?>
