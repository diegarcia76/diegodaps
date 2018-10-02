{extends file='base/base.tpl'}
{block name='custom_css'}
<style>
	#sidebar{
		display: none;
	}
</style>
<link href="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/select2/select2-bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/flipclock/flipclock.css"/>
{/block}
{block name='body_classes'}class="login verificar"{/block}

{block name='custom_js'}
<script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/moment.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{assets_url('js/login.js')}"></script>
<script type="text/javascript">

		$(document).ready(function() {

		});

  	</script>
{/block}

{block name='custom_init'}
{/block}


{block name='content'}
	<!--<a class="float-btn btn-success btn" href="{site_url()}registro">CREAR UNA CUENTA</a>-->
    <div class="row">
	   <div class="col-md-12">
		   <div class="logo"></div>
	   </div>

	    <div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="login-box">
					<div class="inner text-center">
						 	<h3 class="text-center m-b-0 p-b-0 text-primary">
					       	<big>¡Genial!</big>
					        </h3>
					        <h5>Ya podés reservar tu turno</h5>
							<a class="btn btn-primary btn-block m-b-2" href="{site_url()}login">Iniciar sesión</a>
							<p>O descargate nuestra app</p>
					</div>
				</div>
			</div>
	    </div>
    </div>




{/block}
