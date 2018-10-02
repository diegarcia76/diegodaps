{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/admin/js/servicios.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.number/jquery.number.js"></script>

	<script type="text/javascript">
    	$(function(){
			Servicios.initListadoPrecios();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}
    <div class="portlet-title">
       <div class="table-toolbar">
	        <div class="row">
                <div class="col-md-6">
                    <a class="bt_imprimir btn default green" href="{site_url()}admin/servicios/imprimir"><i class="fa fa-print"></i> IMPRIMIR</a>
                </div>
                <div class="col-md-6 text-right">
                        <a class="btn default" href="{site_url()}admin/servicios">Volver a Servicios</a>
                </div>                
	        </div>
	    </div>
    </div>
<div class="row">
<div class="panel-body tabla-responsive">
 <table class="table table-stripped table-responsive" id="tblPrecioServicios">
    <thead>
    	<tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Precio Efectivo</th>
            <th>Acciones</th>
    	</tr>
    </thead>
    <tbody>
        {foreach $aServicios as $aServicio}
            
            <tr>
                <form class="form frmCambiarPrecioServicio" action="{site_url()}admin/servicios/cambiarPrecio">
                    <td>{$aServicio->id}
                        <input type="hidden" name="servicio_id" value="{$aServicio->id}">
                    </td>
                    <td>{$aServicio->nombre}</td>
                    <td><input type="text" class="number form-control" name="servicio_precio_default" value="{$aServicio->precio_default|number_format:2:'.':','}" data-default="{$aServicio->precio_default|number_format:2:'.':','}"></td>
                    <td><input type="text" class="number form-control" name="servicio_precio_efectivo_default" value="{$aServicio->precio_efectivo_default|number_format:2:'.':','}" data-default="{$aServicio->precio_efectivo_default|number_format:2:'.':','}"></td>
                    <td><button class="btn blue" type="submit">Guardar</button></td>
                </form>
            </tr>
            
        {/foreach}    
    </tbody>
    <tfoot>
        <tr><td colspan="5"> <button class="btn green pull-right" type="button" id="guardar_todos">Guardar Todos</button> </td></tr>
        
    </tfoot>
    </table>
    </div>
 </div>
{/block}
