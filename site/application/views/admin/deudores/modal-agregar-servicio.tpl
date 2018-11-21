<div id="modal-agregar-servicio" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-servicio-label" aria-hidden="true" data-backdrop='static'>
    <form id="frm-agregar-servicio" action="{site_url()}admin/deudores/addServicio" method="post" class="formulario">
    <input type="hidden" name="pago-id" value="" />
    <input type="hidden" name="detallePago-id" value="" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Ingrese un servicio para cobrar</h4>
            </div>
            <div class="modal-body">
                <div class="form-body">

                    <!--div class="form-group">
                        <label class="control-label">Seleccionar cliente</label>
                        <select class="form-control select2" style="width: 100%;" name="cliente-id">
                            {foreach $clientes as $aCliente}
                            <option value="{$aCliente->id}">{$aCliente->nombre}</option>
                            {/foreach}
                        </select>
                    </div-->
                    <div class="form-group  form-md-line-input">
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
                        <div id="cliente_nuevo_servicio" class="form-group hidden wpr-cliente-nuevo" >
                            <input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente"  id="nombrecobro" name="nombrecobro" />                        
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Seleccionar Coiffeur</label>
                        <select class="form-control select2" style="width: 100%;" name="coiffeur-id" id="coiffeur-id" required="required">
                            <option value="">Selecciona Coiffeur</option>
                            {foreach $coiffeurs as $aCoiffeur}
                                <option value="{$aCoiffeur->id}">{$aCoiffeur->nombre}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Servicio</label>
                        <select class="form-control select2" name="servicio-id" id="servicio-id" style="width: 100%;">
                        {* foreach $serviciosActivos as $aServicio}
                        	<option data-precio='{$aServicio->precio_default}' value="{$aServicio->id}">{$aServicio->nombre} - ${$aServicio->precio_default|floatval|number_format:2:",":"."}</option>
                        {/foreach *}
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <select class="form-control" name="cantidad">
                                    {for $i = 1 to 10}
                                    <option value="{$i}">{$i}</option>
                                    {/for}
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label class="control-label">Precio a Cobrar c/u</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">$</span>
                                    <input type="text" class="form-control"  name="precio" placeholder="" value="" required="required">
                                </div>                            
                            </div>
                        </div>
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