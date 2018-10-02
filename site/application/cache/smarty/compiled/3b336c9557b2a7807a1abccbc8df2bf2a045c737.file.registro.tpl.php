<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:35:40
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197085bb3e4ac219f83-39664014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b336c9557b2a7807a1abccbc8df2bf2a045c737' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\registro.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '60ac2ff8bf46065cc589b8fbd89c13f620e36a16' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\base\\base.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '19f974900122ba3298970092e42b1c68ce30b698' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\include\\registro-box.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197085bb3e4ac219f83-39664014',
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
  'unifunc' => 'content_5bb3e4ac552628_86669774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e4ac552628_86669774')) {function content_5bb3e4ac552628_86669774($_smarty_tpl) {?><!doctype html>
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
                


        


    </head>
    <body class="login">


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
                
	<a class="float-btn btn-success btn" href="<?php echo site_url();?>
login">INGRESÃ CON TU CUENTA</a>
    <div class="row">
	   <div class="col-md-12">
       <div class="logo text-center" style="margin-bottom: -65px; z-index: 1; position: relative;">
         <a href="<?php echo site_url();?>
"><img src="<?php echo site_url();?>
assets/images/isologo_4.svg" width="230" height="auto"/></a>
		   </div>
	   </div>

	    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default p-t-3" style="border: 4px solid #be9e54;">
				<?php /*  Call merged included template "include/registro-box.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('include/registro-box.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '197085bb3e4ac219f83-39664014');
content_5bb3e4ac421d37_22160617($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "include/registro-box.tpl" */?>
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
 type="text/javascript" src="<?php echo assets_url('js/registro.js');?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">

        $(document).ready(function() {
          Registro.init();
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:35:40
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\include\registro-box.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5bb3e4ac421d37_22160617')) {function content_5bb3e4ac421d37_22160617($_smarty_tpl) {?><div class="login-box">
	<div class="inner text-center">
    	<form action="<?php echo site_url();?>
registro/registrar" method="post" id="frmRegistro" class="frmRegistro">
        	<h3>¡Creá tu cuenta gratis!</h3>
			<hr/>
			<a href="<?php echo $_smarty_tpl->tpl_vars['facebool_login_url']->value;?>
" class="btn btn-face btn-block ">REGISTRATE CON FACEBOOK</a>
			<hr/>

            <h5 class="text-left">O ingresá tus datos</h5>
			<div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" name="nombre" placeholder="NOMBRE" required="required" />
                </div>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="email" class="form-control" name="email" placeholder="EMAIL" required="required" />
                </div>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" name="telefono" placeholder="TELEFONO" required="required" />
                </div>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" data-mask="99-99-9999" name="fecha_nacimiento" placeholder="FECHA DE NACIMIENTO" >
                </div>
            </div>
      		<div class="form-group">
               	<select class="form-control" name="sexo">
				  <option value="0">Hombre</option>
				  <option value="1">Mujer</option>
				  <option value="2">No quiero decirte</option>
				</select>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <select class="form-control" name="profesion" id="profesion">
                        <option value="">Selecciones Profesión</option>
                        <?php if ($_smarty_tpl->tpl_vars['profesiones']->value) {?>
                            <?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profesiones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['sub']->value->nombre;?>
 </option>
                            <?php } ?>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="password" class="form-control " placeholder="CONTRASEÃ‘A" name="password" id="password" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="password" class="form-control " placeholder="REPETIR CONTRASEÃ‘A" name="password2" id="password2" required="required">
                </div>
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Registrarme</button>
            </div>

            <!--<div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="recordar">
                     Recordar mis datos
                  </label>
                </div>
            </div>-->
        </form>
    </div>
</div>
<?php }} ?>
