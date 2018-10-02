<div class="text-right">	
	{if $aPago->cobrado eq true}
     	<a class="btn btn-icon-only yellow" href="{site_url()}admin/tickets/imprimir/{$aPago->id}" data-toggle="tooltip" data-placement="top" target="_blank"  data-original-title="Imprimir"><i class="fa fa-print"></i></a>
	{/if}
</div>