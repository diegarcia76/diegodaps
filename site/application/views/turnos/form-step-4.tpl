<div id="step-4" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Confirmar el turno</h3>
					{if $canje}
						<!--<h5>Tus Puntos: {$usuarioActual->puntos_acumulados}</h5>-->
						<!--<h5>Canjeando Servicio de <span id="puntos_servicio_canjear_4"></span></h5>-->
					{/if}
				</div>
				<div class="col-md-4 col-md-offset-4 panel_confirmacion hidden">
					<div class="alert alert-danger lista message" style="display: none;" role="alert">
						TU TURNO ESTÃ EN LISTA DE ESPERA<br>
						En el caso de que otra persona cancele te avisamos.
					</div>
					{if $canje}
						<div class="alert alert-warning" role="alert">
							SE RESTARÃN <i class="fa fa-money text-primary" aria-hidden="true"></i> <strong><span id="puntos_servicio_canjear_4" class="text-primary"></span></strong> PUNTOS DE TUS ACUMULADOS.
						</div>
					{/if}
					<div class="panel panel-default" id="confirmacion">
						<div class="list-group" id="confirmacion_turno">

						</div>
					</div>
					<div class="panel panel-default animated" id="ok-panel">
						<div class="ok"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div>
						<div class="ok-text">Ya reservaste tu turno. ¡Te esperamos!</div>
					</div>
					<div class="panel panel-default animated hidden" id="nok-panel">
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text">Perdón :(, no pudimos reservar tu turno. Intentá nuevamente más tarde.</div>
					</div>					
					<a href="#" class="btn btn-success nexter m-0-a pull-right">
						confirmar
					</a>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_no_reserva hidden">
					<div class="panel panel-default">
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text"><strong>Ya tenés un turno para hoy con ese servicio.</strong><br>
						<small>Por favor, elegí otro día para que podamos atenderte.</small></div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_no_edicion hidden">
					<div class="panel panel-default" >
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text">NO PUEDES EDITAR NUEVAMENTE EL TURNO<br>
						No podés editar el turno mas de una vez por día!.</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_bloqueado hidden">
					<div class="panel panel-default" >
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text"></div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

				<div class="col-md-4 col-md-offset-4 panel_no_sobreturno hidden">
					<div class="panel panel-default">
						<div class="error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
						<div class="error-text"><strong>Ya hay tomado un turno para hoy con ese servicio.</strong><br>
						<small>Por favor, elegí otro horario para que podamos atenderte.</small></div>
					</div>
					<a href="#" class="btn btn-sm btn-primary pull-left prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>

			</div>

{block name='content'}
	{include file='turnos/item-confirmacion-turno.tpl'}
{/block}
