<div id="step-1" class="step active">
				<div class="col-md-12 title text-center">

					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el servicio</h3>

				</div>
				<div class="col-md-6 col-md-offset-3">
					{if $canje}
						<div class="puntos-acumulados">
							Tus Puntos
							<span class="puntos"> <i class="fa fa-money" aria-hidden="true"></i> {$usuarioActual->puntos_acumulados}</span>
						</div>
					{/if}
					<div class="panel panel-default">
						<div class="list-group">
						{foreach $servicios as $serv}
							{if !$canje}
							  <button class="list-group-item nexter {if $serv->id eq $aTurno->servicio->id} anterior bg-success {/if}" data-id-servicio="{$serv->id}" data-puntos-servicio="{$serv->precio_puntos}" >
							  	{if $serv->id eq $aTurno->servicio->id}<i class="fa fa-check txt-success" aria-hidden="true"> </i> {/if} {$serv->nombre}
							  	<div class="pull-right m-l-1">
							  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
							  	</div>
							  	<div class="pull-right">
								  	<i class="fa fa-clock-o" aria-hidden="true"></i> {$serv->duracion} min
							  	</div>
							  	
							  </button>
							{else}
								{if $serv->precio_puntos>0}	
									<button class="list-group-item nexter {if $serv->id eq $aTurno->servicio->id} anterior bg-success {/if}" data-id-servicio="{$serv->id}" data-puntos-servicio="{$serv->precio_puntos}" {if ($usuarioActual->puntos_acumulados<$serv->precio_puntos) && ($canje)} disabled style="background-color:#f5f5f5;" {/if}>
								  	{if $serv->id eq $aTurno->servicio->id}<i class="fa fa-check txt-success" aria-hidden="true"> </i> {/if} {$serv->nombre}
								  	<div class="pull-right m-l-1">
								  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
								  	</div>
								  	<div class="pull-right">
									  	<i class="fa fa-clock-o" aria-hidden="true"></i> {$serv->duracion} min
								  	</div>
								  	{if $canje}
									  	<div class="pull-right" style="margin-right: 20px; color: #AA9259; font-weight: bold;">
										  	<i class="fa fa-money" aria-hidden="true"></i>
		 {$serv->precio_puntos}
									  	</div>
								  	{/if}
								  </button>
								{/if}
							{/if}
						{/foreach}
						  <!--button class="list-group-item nexter">
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
						  </button-->
						</div>
					</div>
					<a href="{site_url()}" class="btn btn-sm btn-primary">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div>