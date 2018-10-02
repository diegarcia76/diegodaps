<div id="step-2" class="step">
	<div class="col-md-12 title text-center">
		<h6 class="text-primary">NUEVO TURNO</h6>
		<h3 class="m-t-0 p-t-0">Elegí el coiffeur</h3>
		{if $canje}
			<!--<h5>Tus Puntos: {$usuarioActual->puntos_acumulados}</h5>-->
			<!--<h5>Canjeando Servicio de <span id="puntos_servicio_canjear"></span></h5>-->
		{/if}
	</div>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="list-group" id="listado_coiffeurs">

			</div>
		</div>
		<a href="#" class="btn btn-sm btn-primary prever">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
		</a>
	</div>
</div>