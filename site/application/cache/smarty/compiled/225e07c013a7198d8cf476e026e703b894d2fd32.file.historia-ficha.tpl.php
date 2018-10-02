<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 09:17:11
         compiled from "/var/www/daps/site/application/views/themes/default/profile/historia-ficha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:714930077581887c7058350-31832803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '225e07c013a7198d8cf476e026e703b894d2fd32' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/profile/historia-ficha.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
    '4aafcd3df571acc6e4e4eefa7a38b3320d629a34' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/base/base.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '714930077581887c7058350-31832803',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_nocache' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_581887c70bda28_45414144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581887c70bda28_45414144')) {function content_581887c70bda28_45414144($_smarty_tpl) {?><!doctype html>
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
    <body >
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
                
			<div class="col-md-3 p-t-2" id="sidebar">
				<div class="panel panel-default">
					<div class="list-group">
					  <div class="list-group-item">
					  	<i class="fa fa-calendar" aria-hidden="true"></i> 25 de febrero de 2015
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-clock-o" aria-hidden="true"></i> 7:30 PM
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-scissors" aria-hidden="true"></i> Corte
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-user" aria-hidden="true"></i> Diego Dap's
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-commenting-o" aria-hidden="true"></i> Corte completo, retoque de puntas
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i> Shampoo Wella
					  </div>
					</div>
				</div>
				<a href="<?php echo site_url();?>
profile/historial" class="btn btn-sm btn-primary">
					<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
				</a>
			</div>
			<div class="col-md-9 p-t-2" id="content">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
						<img src="http://placehold.it/900x500" alt="..." class="img-responsive">
				    </div>
				    <div class="item">
						<img src="http://placehold.it/900x500" alt="..." class="img-responsive">
				    </div>
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
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
