<div id="step-3" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el turno</h3>
					{if $canje}
						<!--<h5>Tus Puntos: {$usuarioActual->puntos_acumulados}</h5>
						<h5>Canjeando Servicio de <span id="puntos_servicio_canjear_3"></span></h5>-->
					{/if}
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<ul class="nav nav-tabs text-center">
						  <li role="presentation" class="active"><a href="#now" aria-controls="now" role="tab" data-toggle="tab">HOY</a></li>
						  <li role="presentation" class="">
						  <a href="#tomorrow" aria-controls="tomorrow" role="tab" data-toggle="tab">
						  	{if "+1 days"|date_format:"%w" eq 0}
						  		{"+2 days"|date_format:"%A"|upper}
						  	{else}
						  		{"+1 days"|date_format:"%A"|upper}
						  	{/if}
						  </a></li>
						  <li role="presentation" class=""><a href="#other" aria-controls="other" role="tab" data-toggle="tab">OTRO DIA</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="now">
								<div class="list-group" id="listado_horario_hoy">

								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="tomorrow">
								<div class="list-group" id="listado_horario_manana">

								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="other">

								<div class="list-group">

									<div class="list-group-item p-x-0">
										<div id="dsel1" style="width:540px"></div>
									</div>
									<div class="list-group" id="listado_horario_otro">

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

<div class="modal modal-viaturno" id="modal-loading" data-backdrop="static">
  <div class="modal-dialog">
    <div class="text-center"> 
    <div class="col-md-2 col-md-offset-5">
    	<i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color:#fff;" aria-hidden="true"></i>
    </div>
  
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->

{block name='content'}
	{include file='turnos/item-horario.tpl'}
{/block}