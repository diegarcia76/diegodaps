<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 13:05:28
         compiled from "/var/www/daps/site/application/views/recuperar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:628086658587cef484de491-43406994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93647d1a6f84a8074c917f3258c48e211cec9b9b' => 
    array (
      0 => '/var/www/daps/site/application/views/recuperar.tpl',
      1 => 1484582189,
      2 => 'file',
    ),
    '8b6bf29005e804aae30b9bc4bda920a463d23194' => 
    array (
      0 => '/var/www/daps/site/application/views/base/base.tpl',
      1 => 1480680622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '628086658587cef484de491-43406994',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_nocache' => 0,
    'usuarioActual' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587cef485531e4_27639054',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587cef485531e4_27639054')) {function content_587cef485531e4_27639054($_smarty_tpl) {?><!doctype html>
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

		<?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>
       		 <?php echo $_smarty_tpl->getSubTemplate ('include/top-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	   	<?php }?>
        

        <section id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mainSecctionId']->value)===null||$tmp==='' ? 'main' : $tmp);?>
">
            <div class="container">
            	<?php if ($_smarty_tpl->tpl_vars['hideSidebar']->value!=true) {?>
                	<?php echo $_smarty_tpl->getSubTemplate ('include/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                
<div class="background">
  <div class="container">
    <div class="row row-registro">
      <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 animated bounceInRight login-box">
        <h2>Recuperar contraseña</h2>
        <form action="<?php echo site_url();?>
registro/restablecer" method="post" id='reset_password' >
          
          <!--
          <div class="form-group">
          
            <label>Correo electrónico</label>
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input type="text" class="form-control" placeholder="Su Email" name="email_reset" id="email_reset" />
            </div>
          </div>
          -->
          <div class="form-group">
            <label>Nueva Contraseña</label>
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input class="form-control" type="password" placeholder="Contraseña" name="pass" id="pass" />
            </div>
          </div>
          <div class="form-group">
            <label>Repita Contraseña</label>
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input class="form-control" type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2" />
            </div>
          </div>
          <input id="email_v" name="email_v" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" />
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block btn-naranja pull-right">CONFIRMAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--

<div class="container margin-top-40 margin-bottom-40">
  <div class="row">
    <div class="col-md-6 margin-top-40">
      <h1 class="margin-bottom-30 color-white">¿Olvidaste tu clave?<br/>
        <small class="color-white">Reestablece tu contraseña y recupera tu cuenta</small></h1>
    </div>
  </div>
</div>
<div class="bkg-gris padding-top-40 padding-bottom-40">
  <div class="container row-registro">
    <div class="col-md-6 margin-top-40">
      <p class="fontsize-20 color-gris"></p>
    </div>
    <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 col-registro animated bounceInRight">
      <form action="<?php echo site_url();?>
registro/restablecer" method="post" id='reset_password' >
        <div class="form-group">
          <label>Correo electrónico</label>
          <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
            <input type="text" class="form-control" placeholder="Su Email" name="email_reset" id="email_reset" />
         </div>
        </div>
		
		 <div class="form-group">
          <label>Nueva Contraseña</label>
          <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
            <input class="form-control" type="password" placeholder="Contraseña" name="pass" id="pass" />
         </div>
        </div>
		
		 <div class="form-group">
          <label>Repita Contaseña</label>
          <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
            <input class="form-control" type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2" />
         </div>
        </div>
		
		<input id="email_v" name="email_v" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" />
		
       
	    <div class="form-group">
          <button type="submit" class="btn btn-naranja pull-right">Recuperar <i class="fa fa-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
--> 
<!-- MODAL PASS -->
<div class="modal fade " id="modal-olvido-pass-ok">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">Cerrar<span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title">Recuperar Contraseña</h4>
      </div>
      <div class="modal-body">
        <p>La operación se ha realizado con éxito</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
      <div class="modal-footer"> </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->

<div class="modal fade " id="modal-olvido-passw-error">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">Cerrar<span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title">Recuperar Contraseña</h4>
      </div>
      <div class="modal-body">
        <p>Se ha producido un error. Complete los datos e intente nuevamente</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
      <div class="modal-footer"> </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
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