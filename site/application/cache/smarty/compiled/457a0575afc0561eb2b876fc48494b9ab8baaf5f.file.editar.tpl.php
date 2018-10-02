<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-03-02 16:17:40
         compiled from "/var/www/daps/site/application/views/turnos/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:886792882582da6c9b8df83-02351818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '457a0575afc0561eb2b876fc48494b9ab8baaf5f' => 
    array (
      0 => '/var/www/daps/site/application/views/turnos/editar.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
    '8b6bf29005e804aae30b9bc4bda920a463d23194' => 
    array (
      0 => '/var/www/daps/site/application/views/base/base.tpl',
      1 => 1519842473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '886792882582da6c9b8df83-02351818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582da6c9bf33e6_11759380',
  'variables' => 
  array (
    'page_nocache' => 0,
    'usuarioActual' => 0,
    'mainSecctionId' => 0,
    'hideSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582da6c9bf33e6_11759380')) {function content_582da6c9bf33e6_11759380($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/daps/site/application/third_party/Smarty/plugins/modifier.date_format.php';
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
                


			<div id="step-1" class="step active">
				<div class="col-md-12 title text-center p-t-2">
					<h3 class="m-t-0 p-t-0">Editar el turno</h3>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default" id="confirmacion">
						<div class="list-group">
						  <button class="list-group-item nexterday" id="day">
						  	<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['aTurno']->value->fecha_hora,"%e de %B de %Y");?>

						  </button>
						  <button class="list-group-item nexterday" id="hour">
							<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['aTurno']->value->fecha_hora,"%k:%M");?>
						  	
						  </button>
						  <button class="list-group-item nexterservice" id="service">
							<i class="fa fa-scissors" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['aTurno']->value->servicio->nombre;?>

						  </button>
						  <button class="list-group-item nextercoiffeur" id="coiffeur">
							<i class="fa fa-user" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['aTurno']->value->coiffeur->nombre;?>

						  </button>
						</div>
					</div>
					<a href="<?php echo site_url();?>
turnos/editar_turno_paso_2/<?php echo $_smarty_tpl->tpl_vars['aTurno']->value->id;?>
" class="btn btn-success nexter m-0-a align-center">
						editar
					</a>
				</div>
			</div>

<!--
			<div id="step-2" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">EDITAR TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el servicio</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="list-group">
						  	<?php  $_smarty_tpl->tpl_vars['serv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['serv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['serv']->key => $_smarty_tpl->tpl_vars['serv']->value) {
$_smarty_tpl->tpl_vars['serv']->_loop = true;
?>
							  <button class="list-group-item nexter" data-id-servicio="<?php echo $_smarty_tpl->tpl_vars['serv']->value->id;?>
" data-id-turno="<?php echo $_smarty_tpl->tpl_vars['aTurno']->value->id;?>
">
							  	<?php echo $_smarty_tpl->tpl_vars['serv']->value->nombre;?>

							  	<div class="pull-right m-l-1">
							  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
							  	</div>
							  	<div class="pull-right">
								  	<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['serv']->value->duracion;?>
 min
							  	</div>
							  </button>
							<?php } ?>
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div>

			<div id="step-3" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">EDITAR TURNO</h6>
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
			</div>

			<div id="step-4" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el turno</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<ul class="nav nav-tabs text-center">
						  <li role="presentation" class="active"><a href="#now" aria-controls="now" role="tab" data-toggle="tab">HOY</a></li>
						  <li role="presentation" class=""><a href="#tomorrow" aria-controls="tomorrow" role="tab" data-toggle="tab">MAÃ‘ANA</a></li>
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
			</div>
-->

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
assets/common/plugins/jquery-template-master/dist/jquery.loadTemplate.min.js"><?php echo '</script'; ?>
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
