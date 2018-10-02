<script id="template_coiffeur" type="text/x-jsrender">
	{literal}
		<button class="list-group-item nexter {{if id == ~turno_id}} anterior {{/if}}" data-id-coiffeur="{{:id}}">
			<img src="{{:foto}}" alt="{{:nombre}}" width="50" height="50" class="img-circle pull-left"/>
			<div class="pull-left m-l-1 name">			
				<div>{{:nombre}}</div>			
			</div>
			<div class="pull-right m-l-1 arrow">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
		</button>
	{/literal}
</script>