<script id="template_horario" type="text/x-jsrender">
	{literal}
		<div class="list-group-item p-t-1">
			<div class="line"></div>
			<div class="m-r-1 hour col-md-1">{{:Hora}} HS</div>
			<div class="dates col-md-11">
				{{for Turnos}}
					<a href="turnos/editar/{{:id}}" class="fc-bg nexter pull-left {{:className}}" style="padding:5px 10px; margin:5px" data-fecha="{{:fecha_turno}}">
						<div class="fc-title">
							<strong><i class="fa fa-clock-o" aria-hidden="true"></i> {{:start}} HS</strong><br>
							{{:cliente}} / {{:servicio}}
						</div>
					</a>
					<!--button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button-->
				{{/for}}
			</div>
			<div class="clearfix"></div>
		</div>
	{/literal}
</script>
