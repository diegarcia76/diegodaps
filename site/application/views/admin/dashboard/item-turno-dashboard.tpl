<tr>
	<td>
		<div class="fc-title">

			<span class="label {$th->estadoTurno->className}">{$th->estadoTurno->nombre} &nbsp;
			{if $th->prioridad gt 0}
			<br>&nbsp;<strong>(sobreturno)</strong>
			{/if}
			</span>
			
		</div>
	</td>
	<td>{$th->fecha_hora|date_format:"%H:%M"} - {$th->fecha_hora_fin|date_format:"%H:%M"}</td>
	<td>{if $th->cliente}{$th->cliente->nombre}{else}{$th->nombre}{/if}</td>
	<td>{$th->coiffeur->nombre}</td>
	<td>{$th->servicio->nombre}</td>
	<td>
		<button class="btn btn-default pull-left cambioEstado" data-id-turno="{$th->id}" data-accion="{$th->estadoTurno->accion_siguiente->nombre}"> {$th->estadoTurno->accion_siguiente->accion} </button>
		<a class="btn btn-eliminar btn-icon-only btn-default pull-left m-l-2" href="{site_url()}admin/turnos/eliminar/{$th->id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

		<a class="btn btn-default btn-icon-only pull-left" href="{site_url()}admin/turnos/editar/{$th->id}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<div class="clearfix"></div>
		</div>
	</td>
</tr>