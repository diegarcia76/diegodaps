{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/admin/js/marcas.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

	<script type="text/javascript">
    	$(function(){
			Marcas.initListado();
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
                <a class="btn btn-success pull-right" href="{site_url()}admin/marcas/add"> <i class="icon-plus"></i> Agregar Marca</a>
            </div>
        </div>
    </div>-->
    <div class="portlet-title">
       <div class="table-toolbar">
	        <div class="row">
	            <div class="col-md-6">
	                <div class="btn-group">
	                    <a class="btn green pull-left" href="{site_url()}admin/productos/add_marca"> <i class="icon-plus"></i> Agregar Marca</a>                       
	                </div>
	            </div>    
                <div class="col-md-6 text-right">
                        <a class="btn default" href="{site_url()}admin/productos">Volver a Productos</a>
                </div>            
	        </div>
	    </div>
    </div>
<div class="row">
<div class="panel-body tabla-responsive">
 <table class="table table-stripped table-responsive" id="tblMarcas">
    <thead>
    	<tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Descripción</th>
	        <th>Acciones</th>
    	</tr>
    </thead>
    <tbody>
    </tbody>
    </table>
    </div>
 </div>
{/block}
