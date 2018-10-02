{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/admin/js/usuarios.js"></script>
    
    <script type="text/javascript" src="{site_url()}assets/backend/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/backend/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/backend/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/backend/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/backend/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(function(){
            Usuarios.initVer();
        });
    </script>
{/block}

{block name='custom_css'}
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/backend/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}
	<h4>Información del Usuario</h4>
    <table class="table table-striped">
    	<tr><th><h2>Código</h2></th><td><h2><strong>{$usuario->id}</strong></h2></td></tr>
        <tr><th>Nombre</th><td>{$usuario->nombre}</td></tr>
        <tr><th>E-mail</th><td>{$usuario->email}</td></tr>
        <tr><th>Perfil</th><td>{$usuario->perfil->nombre}</td></tr>
       	<tr><th>Fecha Alta</th><td>{if $usuario->fecha_alta}{$usuario->fecha_alta->format('d/m/Y H:i:s')}{/if}</td></tr>
        <tr><th>Activo</th><td>{if $usuario->activo eq true}Si{else}No{/if}</td></tr>
        </table>
    <hr />
    <div class="text-right">
    	<a href="{site_url()}admin/usuarios/editar/{$usuario->id}" class="btn yellow"><i class="fa fa-pencil"></i> Editor</a>
    	<a href="{site_url()}admin/usuarios/eliminar/{$usuario->id}" class="btn red btn-eliminar-usuario" title="{$usuario->nombre}"><i class="fa fa-times"></i> Eliminar</a>
    </div>
{/block}

{block name='custom-css'}
{/block}
