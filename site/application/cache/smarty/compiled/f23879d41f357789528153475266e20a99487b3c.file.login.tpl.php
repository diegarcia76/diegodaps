<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-02 11:14:04
         compiled from "/var/www/daps/site/application/views/themes/default/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4674879425819ef24026d57-63530188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f23879d41f357789528153475266e20a99487b3c' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/login.tpl',
      1 => 1478096043,
      2 => 'file',
    ),
    '4aafcd3df571acc6e4e4eefa7a38b3320d629a34' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/base/base.tpl',
      1 => 1478096001,
      2 => 'file',
    ),
    '525386fd57e67ba87d6aeb7eb7cde955ec8de46f' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/login-box.tpl',
      1 => 1465834004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4674879425819ef24026d57-63530188',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5819ef2407b452_83409107',
  'variables' => 
  array (
    'page_nocache' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5819ef2407b452_83409107')) {function content_5819ef2407b452_83409107($_smarty_tpl) {?><!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title></title>

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

        <style>
            body {
                padding-top: 68px;
                padding-bottom: 20px;
            }
        </style>

        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"><?php echo '</script'; ?>
>

        


    </head>
    <body home>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php echo $_smarty_tpl->getSubTemplate ('include/top-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
        

        <section id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mainSecctionId']->value)===null||$tmp==='' ? 'main' : $tmp);?>
">
            <div class="container">
            	<?php if ($_smarty_tpl->tpl_vars['hideSidebar']->value!=true) {?>
                	<?php echo $_smarty_tpl->getSubTemplate ('include/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                

<div class="background">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-1 bkg-white padding-50  margin-top-50 animated bounceInRight"> <?php /*  Call merged included template "include/login-box.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('include/login-box.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '4674879425819ef24026d57-63530188');
content_5819f4ac75a822_47475536($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "include/login-box.tpl" */?> </div>
    </div>
  </div>
</div>

            

            </div>
        </section>


        <?php echo $_smarty_tpl->getSubTemplate ('include/bottom-footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div> <!-- /container -->


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
        <?php echo $_smarty_tpl->getSubTemplate ('include/js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/plugins.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo site_url();?>
assets/js/main.js"><?php echo '</script'; ?>
>
        
        

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo assets_url('js/login.js');?>
"><?php echo '</script'; ?>
> 

    <?php echo '<script'; ?>
 type="text/javascript">

        $(document).ready(function() {
        
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-02 11:14:04
         compiled from "/var/www/daps/site/application/views/themes/default/include/login-box.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5819f4ac75a822_47475536')) {function content_5819f4ac75a822_47475536($_smarty_tpl) {?><div class="login-box">
	<div class="inner">
    	<form action="<?php echo site_url();?>
registro/checklogin" method="post" id="frmLogin" class="frmLogin">
        	<h2>Iniciar sesión</h2>
            <?php if ($_smarty_tpl->tpl_vars['validado']->value==1) {?>
            <H5>Tus Datos ya fueron Validados</H5>
            <?php }?>
			<div class="form-group">
                <div class="inner-addon left-addon">
                    <i class="glyphicon glyphicon-user outline"></i>
                    <input type="text" class="form-control" name="username" placeholder="Email" />
                </div>
            </div>    

			<div class="form-group">
                <div class="inner-addon left-addon">
                    <i class="glyphicon glyphicon-lock outline"></i>
                    <input type="password" class="form-control" name="pass" placeholder="Contraseña" />
                </div>
            </div>    
            
			<div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="recordar">
                    Recordar mis datos
                  </label>
                </div>
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-lg btn-block btn-verde">Ingresar</button>
            </div>
            
            <div class="text-right">
            	<a class="pull-left" href="<?php echo site_url();?>
registro/olvidopass">Olvidé mi clave</a><a class="pull-right" href="<?php echo site_url();?>
registro">REGISTRARME</a>
            </div>
        </form>
    </div>
</div><?php }} ?>
