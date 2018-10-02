<div id="modal-agregar-producto" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-producto-label" aria-hidden="true" data-backdrop='static'>
    <form id="frm-agregar-producto" action="{site_url()}admin/cobros/addProducto" method="post" class="formulario">
    <input type="hidden" name="pago-id" value="" />
    <input type="hidden" name="detallePago-id" value="" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Ingrese un producto para cobrar</h4>
            </div>
            <div class="modal-body">
                <div class="form-body">

                    {* 
                    <!--div class="form-group">
                        <label class="control-label">Seleccionar cliente</label>
                        <select class="form-control select2" name="cliente-id">
                            {foreach $clientes as $aCliente}
                            <option value="{$aCliente->id}">{$aCliente->nombre}</option>
                            {/foreach}
                        </select>
                    </div-->
                    *}    
                    <div class="form-group form-md-line-input">
                        <label class="control-label">Cliente</label>
                        <select class="form-control change_cliente select2" name="cliente-id" id="cliente" >
                            <option value=""></option>
                            <option value="0">Nuevo cliente</option>
                            {if $clientes}
                                {foreach $clientes as $sub}
                                    <option value="{$sub->id}"><span class="text-uppercase">{$sub->nombre}</span> - ({$sub->email}) </option>
                                {/foreach}
                            {/if}
                        </select>
                        <div id="cliente_nuevo_producto" class="form-group hidden wpr-cliente-nuevo" >
                            <input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente"  id="nombrecobro" name="nombrecobro" />                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Producto</label>
                        <select class="form-control select select2" name="producto-id">
                        {foreach $productosActivos as $aProducto}
                        	<option data-precio='{$aProducto->precio}' value="{$aProducto->id}">[{$aProducto->codigo}] {$aProducto->nombre} - ${$aProducto->precio|floatval|number_format:2:",":"."}</option>
                        {/foreach}
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <select class="form-control select" name="cantidad">
                                    {for $i = 1 to 10}
                                    <option value="{$i}">{$i}</option>
                                    {/for}
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Precio Unitario</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">$</span>
                                    <input type="text" class="form-control" readonly="readonly"  name="precio" placeholder="" value="" required="required">
                                </div>                            
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Seleccionar Coiffeur</label>
                        <select class="form-control select2" name="coiffeur-id" required="required">
                            <option value="">Selecciona Coiffeur</option>
                            {foreach $coiffeurs as $aCoiffeur}
                                <option value="{$aCoiffeur->id}">{$aCoiffeur->nombre}</option>
                            {/foreach}
                        </select>
                    </div>
                    
                    <div class="wpr-total text-right">
                        <h2>$<span>0.00</span></h2>
                    </div> 
            
				</div>            	
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button type="submit" class="btn btn-success btn-aceptar"><i class="fa fa-check"></i> Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->