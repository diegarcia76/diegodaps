{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/admin/js/clientes.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(function(){
            Clientes.initVer();
        });
    </script>
{/block}

{block name='custom_css'}
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}


<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-user font-green-sharp"></i>
            <span class="caption-subject bold uppercase">{$cliente->nombre}</span>
            <span class="caption-helper">Editar perfil</span>
        </div>
        <div class="actions">
            <a href="{site_url()}admin/clientes/editar/{$cliente->id}" class="btn btn-circle btn-default btn-sm">
                 <i class="fa fa-edit"></i> Editar </a>
            <a href="{site_url()}admin/clientes/eliminar/{$cliente->id}" class="btn btn-circle btn-default btn-sm">
                <i class="fa fa-trash"></i> Eliminar </a>

        </div>
    </div>
    <div class="portlet-body">
	    <div class="row">
		    <div class="col-md-3">
			    {if count($cliente->foto) gt 0}
	                <img src="{ImagenManager::getInstance()->getUrl($cliente->foto,'120x120')}" class="img-preview">
	        {else}
	        <img src="{site_url()}uploads/sin-imagen120.jpg">
	        {/if}
		    </div>
		    <div class="col-md-9">
			    <table class="table">
			        <tr><th>Nombre</th><td>{$cliente->nombre}</td></tr>
			        <tr><th>E-mail</th><td>{$cliente->email}</td></tr>
                    <tr><th>Teléfono</th><td>{if $cliente->telefono}{$cliente->telefono}{/if}</td></tr>
			        <tr><th>Fecha Nacimiento</th><td>{if $cliente->fecha_nacimiento}{$cliente->fecha_nacimiento->format('d-m-Y')}{else}No Definido{/if}</td></tr>
			        <tr><th>Fecha Alta</th><td>{$cliente->fecha_alta->format('d-m-Y')}</td></tr>
			        <tr><th>Puntos Acumulados</th><td>{$cliente->puntos_acumulados}</td></tr>
		        </table>
		    </div>
	    </div>

    </div>
</div>

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-list font-green-sharp"></i>
            <span class="caption-subject bold uppercase">ÃšLTIMOS TURNOS</span>
            <span class="caption-helper"></span>
        </div>
        <div class="portlet-body">
	        <table class="table table-advance table-hover">
		        {foreach $cliente->turnos as $tu name=foo}
		            <tr {if $smarty.foreach.foo.iteration gt 5} hidden {/if}>
			            <td><i class="fa fa-calendar" aria-hidden="true"></i>
                         {$tu->fecha_hora->format('d-m-Y')}</td>
                         <td> <i class="fa fa-clock-o" aria-hidden="true"></i>
                         {$tu->fecha_hora->format('H:i')}</td>
			            <td>{$tu->servicio->nombre} </td>
			            <td>{$tu->coiffeur->nombre} </td>
						<td>
			            	<a href="{site_url()}admin/turnos/editar/{$tu->id}" class="btn btn-outline btn-circle btn-sm purple">
                            <i class="fa fa-edit"></i> Editar </a>
			            </td>
		            </tr>
	            {/foreach}                
	        </table>
            <div class="row">
                <tr class="col-md-12">
                    <button class="btn btn-circle btn-default btn-vermas "><i class="fa fa-edit"></i> Ver más </button>
                </tr>
            </div>
        </div>
    </div>
</div>





{/block}

{block name='custom-css'}
{/block}
