<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:17
         compiled from "/var/www/daps/site/application/views/themes/default/turnos/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209362337858188179c249c0-22171298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7477ce8b5084f8a4a0cfa86b50b0267dc356e6b9' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/turnos/form.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
    '4aafcd3df571acc6e4e4eefa7a38b3320d629a34' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/base/base.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
    'd285cbb9ed3c2ade542b4155a491f9c9d3175d3e' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/turnos/form-step-1.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
    '50924840e5413f949cc6293d7b66f1c468a9f8e0' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/turnos/form-step-2.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
    '546cf9859d41f2a90fa0ba0dc46ed6b4c64297d3' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/turnos/form-step-3.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
    'fbf077e19c5e77d217b27d9021e7f04ff2d206e4' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/turnos/form-step-4.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209362337858188179c249c0-22171298',
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
  'unifunc' => 'content_58188179c6e512_25468560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58188179c6e512_25468560')) {function content_58188179c6e512_25468560($_smarty_tpl) {?><!doctype html>
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

        
        
	<div class="steper">
    </div>


        <section id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mainSecctionId']->value)===null||$tmp==='' ? 'main' : $tmp);?>
">
            <div class="container">
            	<?php if ($_smarty_tpl->tpl_vars['hideSidebar']->value!=true) {?>
                	<?php echo $_smarty_tpl->getSubTemplate ('include/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                
	<?php /*  Call merged included template "turnos/form-step-1.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209362337858188179c249c0-22171298');
content_58188179c4cab8_03305626($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-1.tpl" */?>
	<?php /*  Call merged included template "turnos/form-step-2.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209362337858188179c249c0-22171298');
content_58188179c50858_62069774($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-2.tpl" */?>
	<?php /*  Call merged included template "turnos/form-step-3.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-3.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209362337858188179c249c0-22171298');
content_58188179c55157_77171184($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-3.tpl" */?>
	<?php /*  Call merged included template "turnos/form-step-4.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('turnos/form-step-4.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209362337858188179c249c0-22171298');
content_58188179c61930_03240446($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "turnos/form-step-4.tpl" */?>

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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:17
         compiled from "/var/www/daps/site/application/views/themes/default/turnos/form-step-1.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58188179c4cab8_03305626')) {function content_58188179c4cab8_03305626($_smarty_tpl) {?><div id="step-1" class="step active">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el servicio</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="list-group">
						  <button class="list-group-item nexter">
						  	Corte
						  	<div class="pull-right m-l-1">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  	<div class="pull-right">
							  	<i class="fa fa-clock-o" aria-hidden="true"></i> 30 min
						  	</div>
						  </button>
						  <button class="list-group-item nexter">
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
						  </button>
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:17
         compiled from "/var/www/daps/site/application/views/themes/default/turnos/form-step-2.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58188179c50858_62069774')) {function content_58188179c50858_62069774($_smarty_tpl) {?><div id="step-2" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el coiffeur</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="list-group">
						  <button class="list-group-item nexter">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>
						  <button class="list-group-item nexter">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>
						  <button class="list-group-item nexter">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>
						  <button class="list-group-item nexter disabled" disabled="disabled">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>

						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:17
         compiled from "/var/www/daps/site/application/views/themes/default/turnos/form-step-3.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58188179c55157_77171184')) {function content_58188179c55157_77171184($_smarty_tpl) {?><div id="step-3" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el turno</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<ul class="nav nav-tabs text-center">
						  <li role="presentation" class="active"><a href="#now" aria-controls="now" role="tab" data-toggle="tab">HOY</a></li>
						  <li role="presentation" class=""><a href="#tomorrow" aria-controls="tomorrow" role="tab" data-toggle="tab">MAÑANA</a></li>
						  <li role="presentation" class=""><a href="#other" aria-controls="other" role="tab" data-toggle="tab">OTRO DIA</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="now">
								<div class="list-group">
								  <div class="list-group-item p-t-1">
									<div class="line"></div>
								  	<span class="m-r-1 hour">9 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">10 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">11 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">12 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">1 PM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:30</button>
								  </div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="tomorrow">
								<div class="list-group">
								  <div class="list-group-item p-t-1">
									<div class="line"></div>
								  	<span class="m-r-1 hour">9 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">10 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">11 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">12 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">1 PM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:30</button>
								  </div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="other">



								<div class="list-group">
								  <div class="list-group-item">
									  <div id="carousel-month" class="carousel slide" data-ride="carousel" data-interval="false">
										   <div class="carousel-inner" role="listbox">
											    <div class="item active">ENERO</div>
											    <div class="item">FEBRERO</div>
											    <div class="item">MARZO</div>
											    <div class="item">ABRIL</div>
											</div>
											<a class="left control" href="#carousel-month" role="button" data-slide="prev">
										    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="right control" href="#carousel-month" role="button" data-slide="next">
										    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
									  </div>
								  </div>
								  <div class="list-group-item" id="list-day">
									  <div id="carousel-day" class="carousel slide" data-ride="carousel" data-interval="false">
										   <div class="carousel-inner" role="listbox">
											    <div class="item active">
												    <button class="btn btn-default btn-circle">1</button>
												    <button class="btn btn-default btn-circle">2</button>
												    <button class="btn btn-default btn-circle">3</button>
												    <button class="btn btn-default btn-circle">4</button>
												    <button class="btn btn-default btn-circle">5</button>
												     <button class="btn btn-default btn-circle">6</button>
												    <button class="btn btn-default btn-circle">7</button>
												    <button class="btn btn-default btn-circle">8</button>
												    <button class="btn btn-default btn-circle">9</button>
												    <button class="btn btn-default btn-circle">10</button>
											    </div>
											    <div class="item">
												    <button class="btn btn-default btn-circle">11</button>
												    <button class="btn btn-default btn-circle">12</button>
												    <button class="btn btn-default btn-circle">13</button>
												    <button class="btn btn-default btn-circle">14</button>
												    <button class="btn btn-default btn-circle">15</button>
												    <button class="btn btn-default btn-circle">16</button>
												    <button class="btn btn-default btn-circle">17</button>
												    <button class="btn btn-default btn-circle">18</button>
												    <button class="btn btn-default btn-circle">19</button>
												    <button class="btn btn-default btn-circle">20</button>
											    </div>
											    <div class="item">
												    <button class="btn btn-default btn-circle">21</button>
												    <button class="btn btn-default btn-circle">22</button>
												    <button class="btn btn-default btn-circle">23</button>
												    <button class="btn btn-default btn-circle">24</button>
												    <button class="btn btn-default btn-circle">25</button>
												    <button class="btn btn-default btn-circle">26</button>
												    <button class="btn btn-default btn-circle">27</button>
												    <button class="btn btn-default btn-circle">28</button>
												    <button class="btn btn-default btn-circle">29</button>
												    <button class="btn btn-default btn-circle">30</button>
												</div>
											</div>
											<a class="left control" href="#carousel-day" role="button" data-slide="prev">
										    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="right control" href="#carousel-day" role="button" data-slide="next">
										    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
									  </div>
								  </div>

								  <div class="list-group-item p-t-1">
									<div class="line"></div>
								  	<span class="m-r-1 hour">9 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">10 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">11 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">12 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">1 PM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:30</button>
								  </div>
								</div>

							</div>
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:17
         compiled from "/var/www/daps/site/application/views/themes/default/turnos/form-step-4.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58188179c61930_03240446')) {function content_58188179c61930_03240446($_smarty_tpl) {?><div id="step-4" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Confirmar el turno</h3>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-danger lista message" role="alert">
					TU TURNO ESTÁ EN LISTA DE ESPERA<br>
					En el caso de que otra persona cancele
te avisamos.
					</div>
					<div class="panel panel-default" id="confirmacion">
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
						</div>
					</div>
					<div class="panel panel-default animated" id="ok-panel">
							<div class="ok"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div>
							<div class="ok-text">Ya reservaste tu turno. ¡Te esperamos!</div>
						</div>
					<a href="#" class="btn btn-success nexter m-0-a align-center">
						confirmar
					</a>
				</div>
			</div><?php }} ?>
