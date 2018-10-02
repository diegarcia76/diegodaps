<script id="template_horario" type="text/x-jsrender">
	{literal}
		<table class="table">
			<thead>
				<th></th>
			
			{{for coiffeurs}}
				<th>{{:nombre}}</th>
			{{/for}}
			
			</thead>
		</table>

		<div class="list-group-item p-t-1">
			<div class="line"></div>
			<span class="m-r-1 hour">{{:Hora}} hs</span>
			{{for Turnos}}
				<button type="button" class="btn btn-sm {{:className}} bt_reserva" data-fecha="{{:fecha_turno}}"><i class="fa fa-clock-o" aria-hidden="true"></i> {{:start}} </button>
				<!--button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button-->
			{{/for}}
		</div>
	{/literal}
</script>