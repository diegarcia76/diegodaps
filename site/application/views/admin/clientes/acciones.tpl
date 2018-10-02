{if $actualBackuser->perfil->id|in_array:array(1,2)}
<div class="text-right">
    <a class="btn btn-icon-only yellow" href="{site_url()}admin/clientes/ver/{$edit_user->id}" data-toggle="tooltip" data-placement="top"  data-original-title="Ver"><i class="fa fa-eye"></i></a>
    <a class="btn btn-icon-only yellow" href="{site_url()}admin/clientes/editar/{$edit_user->id}" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="{site_url()}admin/clientes/eliminar/{$edit_user->id}"  data-toggle="tooltip" data-placement="top"  data-original-title="Eliminar"><i class="fa fa-times"></i></a>
</div>
{else}
<div class="text-right">
	<span class="text-info">Sin acceso</span>
</div>
{/if}
