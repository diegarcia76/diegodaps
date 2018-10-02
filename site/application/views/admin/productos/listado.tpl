{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/admin/js/productos.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

	<script type="text/javascript">
    	$(function(){
			Productos.initListado();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}
<!--<div class="panel panel-default">


    <div class="panel panel-heading-custom">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-success pull-right" href="{site_url()}admin/productos/add"> <i class="icon-plus"></i> Agregar Producto</a>
            </div>
        </div>
    </div>-->
    <div class="portlet-title">
       <div class="table-toolbar">
	        <div class="row">
	            <div class="col-md-6">
                    <a class="btn green" href="{site_url()}admin/productos/add"> <i class="icon-plus"></i> Agregar Producto</a>
                    <a class="btn green" href="{site_url()}admin/productos/listar_marcas"> <i class="icon-plus"></i> Administrar Marcas</a>
	            </div>                
                <div class="col-md-6 text-right">
                    <a class="btn default" href="{site_url()}admin/productos/precios"> <i class="fa fa-dollar"></i> Listado de Precios</a>
                </div>
	        </div>
	    </div>
    </div>
<div class="row">
<div class="panel-body tabla-responsive">
 <table class="table table-stripped table-responsive" id="tblProductos">
    <thead>
    	<tr>
            <th>Código</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
	        <th>Acciones</th>
    	</tr>
    </thead>
    <tbody>
    </tbody>
    </table>
    </div>
 </div>
{/block}
