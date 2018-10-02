{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/admin/js/servicios.js"></script>
    
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(function(){
            Servicios.initVer();
        });
    </script>
{/block}

{block name='custom_css'}
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}
<div class="panel panel-default">
  <div class="panel panel-heading-custom">
    <div class="row">
      <div class="col-md-9">
        <h4 class="color-verde"><i class="icon-star"></i> Información del Servicio <small> </small></h4>
      </div>
      <div class="col-md-3 text-right"> 
      <a href="{site_url()}admin/servicios/editar/{$servicio->id}" class="btn btn-default"><i class="fa fa-pencil"></i> Editar</a>
    	<a href="{site_url()}admin/servicios/eliminar/{$servicio->id}" class="btn btn-default btn-eliminar-servicio" title="{$servicio->nombre}">Eliminar</a>
        
      </div>
    </div>
  </div>
  <div class="panel-body">
    <table class="table table-striped">
    
    	<tr><th><h2>Código</h2></th><td><h2>{$servicio->codigo}</h2></td></tr>        
        <tr><th>Nombre</th><td>{$servicio->nombre}</td></tr>      
        <tr><th>Descripción</th><td>{$servicio->descripcion}</td></tr>
        <tr><th>Precio</th><td>{$servicio->precio}</td></tr>        
        </table>
   </div>
   </div>
    
{/block}

{block name='custom-css'}
{/block}
