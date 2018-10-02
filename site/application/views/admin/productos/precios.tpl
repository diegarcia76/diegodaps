{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/admin/js/productos.js?rnd=20180313"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.number/jquery.number.js"></script>

	<script type="text/javascript">
    	$(function(){
			Productos.initListadoPrecios();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}
    <div class="portlet-title">
       <div class="table-toolbar">
            <form class="form" accept="" action="{site_url()}admin/productos/imprimir" target="_blank" method="post">
	        <div class="row">
                <div class="col-md-6">
                    <div class="btn-group w-100">
                        <select id="filtro-marca" name="filtro-marca[]" class="form-control select2 " placeholder='Imprimir todas o seleccione marcas' multiple>
                            {foreach $aMarcas as $aMa}
                                <option value="{$aMa->id}" {if $marca_id eq $aMa->id} selected="selected" {/if}>{$aMa->nombre}</option>
                            {/foreach}
                        </select>                
                    </div>
                </div> 
                <div class="col-md-3 text-left ">
                        <button type="submit" class="bt_imprimir btn default green" >Imprimir</button>
                </div> 
                <div class="col-md-3 text-right ">
                        <a class="btn default" href="{site_url()}admin/productos">Volver a Productos</a>
                </div>                
	        </div>
	    </div>
    </div>
<div class="row">
<div class="panel-body tabla-responsive">
 <table class="table table-stripped table-responsive" id="tblPrecioProductos">
    <thead>
    	<tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Línea</th>
            <th width="10%">Precio</th>
            <th width="15%">Precio Efectivo</th>
            <th>Acciones</th>
    	</tr>
    </thead>
    <tbody>
        {foreach $aProductos as $aProducto}        
        <tr class="tr-producto {if $aProducto->marca} marca_{$aProducto->marca->id}{/if}">
            <form class="form frmCambiarPrecioProducto" action="{site_url()}admin/productos/cambiarPrecio">
                <td>
                    <input type="hidden" name="producto_id" value="{$aProducto->id}">
                </td>
                <td>{$aProducto->nombre}</td>
                <td>
                    <select id="marca" name="marca" class="form-control select2 marca" placeholder='Seleccione Marca'>
                        <option value="0">Sin Marca</option>
                        {foreach $aMarcas as $aMa}
                            <option value="{$aMa->id}" {if $aProducto->marca->id eq $aMa->id} selected="selected" {/if}>{$aMa->nombre}</option>
                        {/foreach}
                    </select> 
                </td>
                <td>
                    <select id="submarca" name="submarca" class="form-control select2 submarca" placeholder='Seleccione SubMarca'>
                        <option value="0">Sin Línea</option>
                            {foreach $aProducto->marca->submarcas as $aSub}
                                <option value="{$aSub->id}" {if $aProducto->linea->id eq $aSub->id} selected="selected" {/if}>{$aSub->nombre}</option>
                            {/foreach}
                    </select> 
                </td>
                <td><input type="text" class="number form-control" name="producto_precio" value="{$aProducto->precio|number_format:2:'.':','}" data-default="{$aProducto->precio_default|number_format:2:'.':','}"></td>
                <td><input type="text" class="number form-control" name="producto_precio_efectivo" value="{$aProducto->precio_efectivo|number_format:2:'.':','}" data-default="{$aProducto->precio_efectivo_default|number_format:2:'.':','}"></td>
                <td><button class="btn blue" type="submit">Guardar</button></td>
            </form>
        </tr>        
        {/foreach}    
    </tbody>
    <tfoot>
        <tr><td colspan="6"> <button class="btn green pull-right" type="button" id="guardar_todos">Guardar Todos</button> </td></tr>
        
    </tfoot>
    </table>
    </div>
 </div>
{/block}
