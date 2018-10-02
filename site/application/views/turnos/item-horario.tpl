<script id="template_horario" type="text/x-jsrender">
	{literal}
		<div class="list-group-item p-t-1">
			<div class="line"></div>
			<span class="m-r-1 hour">{{:Hora}} hs</span>
			{{for Turnos}}
				<button class="btn btn-sm {{:className}} {{if className != 'nodisponible'}} nexter {{/if}} " data-fecha="{{:fecha_turno}}" {{if className == 'nodisponible'}} disabled {{/if}}>
					<i class="fa fa-clock-o" aria-hidden="true"></i> {{:start}}
				</button>
			{{/for}}
		</div>
	{/literal}
</script>