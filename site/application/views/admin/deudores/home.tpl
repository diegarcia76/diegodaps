{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}

{block name='custom_js'}

	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.numeric.js"></script>
	<script type="text/javascript" src="{site_url()}assets/admin/js/deudores.js?version=20180712"></script>

	<script type="text/javascript">
    	$(function(){
			Deudores.init();
		});
    </script>

{/block}


{block name='custom_css'}
{/block}

{block name='content'}
<div class="row dashboard">
	<div class="col-lg-12">
        <div class="btn-group m-t-1 m-b-2">
	         <a class="btn green btn-agregar-item m-r-1"> <i class="fa fa-scissors" aria-hidden="true"></i> Agregar Item</a>
			 <a class="btn green btn-agregar-producto m-r-1"> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
 Agregar Producto</a>
 			 <a class="btn green btn-agregar-servicio m-r-3"> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
 Agregar Servicio</a>

        </div>

        <div class="mt-element-list">
            <div class="mt-list-head list-default dark">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="list-head-title-container">
                            <div class="list-date"><i class="fa fa-calendar" aria-hidden="true"></i> {$smarty.now|date_format:"%e de %B, %Y"|upper}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-list-container m-y-0  list-default">
							{if $pagosPendientes}
							<table class="table table-responsive table-striped" id="tblCobros">
									<thead>
										<tr>
											<th>Hora</th>
											<th>Cliente</th>
											<th>Comentario</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										{foreach $pagosPendientes as $aPago}
										<tr>
											<td>{($aPago->fecha)?$aPago->fecha->format('Y-m-d \a \l\a\s H:i:s'):'--'}</td>
											<td>{if $aPago->cliente}{$aPago->cliente->nombre}{else}{$aPago->nombre}{/if}</td>
											<td>{$aPago->comentario}</td>
											<td>{$th->servicio->nombre}</td>
											<td class="text-right">
												<button class="btn btn-default btn-agregar-item btn-xs" data-id-pago="{$aPago->id}" > <i class="fa fa-plus"></i>ITEM</button>
												<button class="btn btn-default btn-agregar-servicio btn-xs" data-id-pago="{$aPago->id}" > <i class="fa fa-plus"></i>SERVICIO</button>
												<button class="btn btn-default btn-agregar-producto btn-xs" data-id-pago="{$aPago->id}" > <i class="fa fa-plus"></i>PRODUCTO</button>
							                    <button class="btn btn-{if $aPago->total eq 0}warning canjear{else}success cobrar{/if}  btn-xs" data-id-pago="{$aPago->id}" data-total="{$aPago->total|floatval|number_format:2:".":""}" data-descuentos="{$aPago->total_descuentos|floatval|number_format:2:".":""}">{if $aPago->total eq 0}Canjear{else}Cobrar <span>${$aPago->total|floatval|number_format:2:",":"."}{/if}</span></button>
							                    <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#detalle-pago-{$aPago->id}" aria-expanded="false" aria-controls="detalle-pago-{$aPago->id}"><i class="fa fa-chevron-down"></i></button>
												
												<input type="checkbox" name="eliminarPago[]" class="eliminarPago" id="eliminarPago" rel="{$aPago->id}" value="{$aPago->id}"/>		
												
												
											</td>
											
											
										</tr>
											<tr>
										
												<td colspan="6">


												<div id="detalle-pago-{$aPago->id}" class="collapse">
																	<table class="table table-stripped">
																	<thead>
																			<tr>
																					<th>Fecha</th>
																					<th>Cantidad</th>
																					<th>Detalle</th>
																					<th>Precio Unitario</th>
																					<th>Costo</th>
																					<th></th>
																			</tr>
																	</thead>
																	<tbody>
																	{foreach $aPago->detallePago as $aDetallePago}
																			<tr>
																					<td>{$aDetallePago->fecha->format('Y-m-d')}</td>
																					<td>{$aDetallePago->cantidad}</td>
																					<td>{$aDetallePago->descripcion}</td>
																					<td>${$aDetallePago->precio|floatval|number_format:2:",":"."}</td>
																					<td>${($aDetallePago->precio * $aDetallePago->cantidad)|floatval|number_format:2:",":"."}</td>
																					<td>
																						{if $actualBackuser->perfil->id|in_array:array(1)}
																						<button class="btn btn-default btn-sm btn-eliminar-item" data-id-detalle="{$aDetallePago->id}" > <i class="fa fa-trash"></i></button>
																						{/if}
																						
																						
																						<button class="btn btn-default btn-sm btn-modificar-item" data-id-detalle="{$aDetallePago->id}" > <i class="fa fa-pencil"></i></button>
																						
																				<input type="checkbox" name="eliminar[]" class="eliminar_{$aPago->id}" id="eliminar_{$aPago->id}" rel="{$aDetallePago->id}" value="{$aDetallePago->id}"/>	
																					</td>
																			</tr>
																			
																	{/foreach}
																			<tr>
																					<td colspan="4" class="text-right">TOTAL</td>
																					<th>${$aPago->total|floatval|number_format:2:",":"."}</th>
																			</tr>
																			 <tr><td colspan="5"> <button class="btn red pull-right eliminar_todos" type="button" id="eliminar_todos" data-id-pago="{$aPago->id}">Eliminar Seleccionados</button>  </td></tr>
																	</tbody>
																	</table>
														</div>
														</td>
														</tr>
										{/foreach}
										
											<tr><td colspan="5"> <button class="btn red pull-right" type="button" id="eliminar_todos_pagos">Eliminar Seleccionados</button> </td></tr>
									</tbody>
								</table>
								{else}
									No hay pagos pendientes.
								{/if}



















								<!--<ul style="margin-top: 20px;">
                	{foreach $pagosPendientes as $aPago}
                        <li class="mt-list-item m-y-0 p-y-0">
							<div class="row">
								<div class="col-md-6">
								 	<h4 class="m-y-0 p-b-2 p-t-2 pull-left m-r-2">
									 	<i class="fa fa-clock-o" aria-hidden="true"></i>
									 	{($aPago->fecha)?$aPago->fecha->format('Y-m-d \a \l\a\s H:i:s'):'--'}
									 </h4>
									 <h4 class="m-y-0 p-b-2 p-t-2 pull-left"> <i class="fa fa-user" aria-hidden="true"></i> {$aPago->cliente->nombre}</h4>
								</div>
								<div class="col-lg-6 col-md-6 p-b-2 p-t-1">
									<div class="pull-right">
										<button class="btn btn-default btn-agregar-item" data-id-pago="{$aPago->id}" > <i class="fa fa-plus"></i> Agregar Item</button>
										<button class="btn btn-default btn-agregar-producto" data-id-pago="{$aPago->id}" > <i class="fa fa-plus"></i> Agregar Producto</button>
                            			<button class="btn btn-success cobrar" data-id-pago="{$aPago->id}" data-total="{$aPago->total|floatval|number_format:2}" data-descuentos="{$aPago->total_descuentos|floatval|number_format:2}"> Cobrar <span>${$aPago->total|floatval|number_format:2:",":"."}</span></button>
                            			<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#detalle-pago-{$aPago->id}" aria-expanded="false" aria-controls="detalle-pago-{$aPago->id}"><i class="fa fa-chevron-down"></i></button>
									</div>
								</div>
							</div>

							<div id="detalle-pago-{$aPago->id}" class="collapse">
			                    <hr />
		                        <table class="table table-stripped">
		                        <thead>
		                            <tr>
		                                <th>Fecha</th>
		                                <th>Cantidad</th>
		                                <th>Detalle</th>
		                                <th>Precio Unitario</th>
		                                <th class="text-right">Costo</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        {foreach $aPago->detallePago as $aDetallePago}
		                            <tr>
		                                <td>{$aDetallePago->fecha->format('Y-m-d')}</td>
		                                <td>{$aDetallePago->cantidad}</td>
		                                <td>{$aDetallePago->descripcion}</td>
		                                <td class="text-right">${$aDetallePago->precio|floatval|number_format:2:",":"."}</td>
		                                <td class="text-right">${($aDetallePago->precio * $aDetallePago->cantidad)|floatval|number_format:2:",":"."}</td>
		                            </tr>
		                        {/foreach}
		                            <tr>
		                                <td colspan="4" class="text-right">TOTAL</td>
		                                <th class="text-right">${$aPago->total|floatval|number_format:2:",":"."}</th>
		                            </tr>
		                        </tbody>
		                        </table>
		                	</div>




                        </li>
					 {foreachelse}
						No hay cobros pendientes
					{/foreach}
				</ul>-->
            </div>
        </div>
	</div>
</div>











{foreach $pagosPendientes as $aPago}

<div id="confirmarCobro_{$aPago->id}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content modal-warning">
            <div class="modal-body">
	            <div class="wpr">
		            <p>Está por cobrar el pago! <br>¿Está Seguro?<br><a href="#" class="text-info btn-mostrar-importe-efectivo">Modificar monto efectivo</a><br/>
		            </p>
		           
		            <p class="wpr-efectivo form-inline hidden">
		            	Puede modificar el importe para pago en efectivo:<br/>
						<input type="text" class="form-control numeric monto-efectivo" value="" disabled="disabled" ><br />
						Reemplazar por este valor:<br />
		            	<input type="text" name="monto_efectivo_des_{$aPago->id}" class="form-control numeric monto_efectivo_des_{$aPago->id}" id="monto_efectivo_des_{$aPago->id}" value="" data-id-pago="{$aPago->id}">
						
						
						<button class="btn btn-success green btn-confirm-no-descuento" id="btn-confirm-no-descuento" data-id-pago="{$aPago->id}">Cobrar este monto</button>
		            </p>
		            <p>	<label><input type="checkbox" name="cb_modificar_fecha" class="cb_modificar_fecha" value="1"> Modificar Fecha de Cobro</label><br></p>
		            <p class="wpr-fecha-cobro form-inline hidden">
		            	Fecha de Cobro:<br/>
			            <input type="text" class="form-control fecha_cobro" id="fecha_cobro_{$aPago->id}" name="fecha_cobro_{$aPago->id}">
						    
		            </p>
					
					<p class="wpr-tarjeta-cobro form-inline ">
		            	Si realiza el pago con tarjeta (Interés):<br/>
			            <select id="t_{$aPago->id}"  name="t" class="form-control select2 t" placeholder='tarjeta' data-id-pago="{$aPago->id}">
                                    <option value="{$t->cuota1}">{$t->cuota1} % 1 cuota  de {$aPago->total}</option>
									{$to = $aPago->total + ($aPago->total * $t->cuota2 / 100) }
									{$tf = $to / 2}
									  <option value="{$t->cuota2}">{$t->cuota2} %  2 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
									  
									  {$to = $aPago->total + ($aPago->total * $t->cuota3 / 100) }
									{$tf = $to / 3}
									    <option value="{$t->cuota3}">{$t->cuota3} %  3 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
										
										{$to = $aPago->total + ($aPago->total * $t->cuota4 / 100) }
									{$tf = $to / 4}
										  <option value="{$t->cuota4}">{$t->cuota4} %  4 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
										  
										  {$to = $aPago->total + ($aPago->total * $t->cuota5 / 100) }
									{$tf = $to / 5}
										    <option value="{$t->cuota5}">{$t->cuota5} %  5 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
											
											{$to = $aPago->total + ($aPago->total * $t->cuota6 / 100) }
									{$tf = $to / 6}
											  <option value="{$t->cuota6}">{$t->cuota6} %  6 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
											  
											  {$to = $aPago->total + ($aPago->total * $t->cuota7 / 100) }
									{$tf = $to / 7}
											    <option value="{$t->cuota7}">{$t->cuota7} %  7 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
												
												{$to = $aPago->total + ($aPago->total * $t->cuota8 / 100) }
									{$tf = $to / 8}
												  <option value="{$t->cuota8}">{$t->cuota8} %  8 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
												  
												  {$to = $aPago->total + ($aPago->total * $t->cuota9 / 100) }
									{$tf = $to / 9}
												    <option value="{$t->cuota9}">{$t->cuota9} %  9 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
													
													{$to = $aPago->total + ($aPago->total * $t->cuota10 / 100) }
									{$tf = $to / 10}
													  <option value="{$t->cuota10}">{$t->cuota10} %  10 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
													  
													  {$to = $aPago->total + ($aPago->total * $t->cuota11 / 100) }
									{$tf = $to / 11}
													    <option value="{$t->cuota11}">{$t->cuota11} %  11 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
														
														{$to = $aPago->total + ($aPago->total * $t->cuota12 / 100) }
									{$tf = $to / 12}
														  <option value="{$t->cuota12}">{$t->cuota12} %  12 cuotas de {$tf|floatval|number_format:2:".":""} c/u</option>
                                	
                                   
                                </select>
						
						
						    
		            </p>
					
		        </div>    
            </div>
			
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button class="btn btn-success green btn-confirm-efectivo" data-id-pago="{$aPago->id}"></button>
              	<button class="btn btn-success green btn-confirm-no-efectivo" data-id-pago="{$aPago->id}"></button>
				<button class="btn btn-success blue cobrarCombinando" data-id-pago="{$aPago->id}">Combinar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</div>
{/foreach}

{foreach $pagosPendientes as $aPago}

<div id="confirmarCobroCombinado_{$aPago->id}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content modal-warning">
            <div class="modal-body">
	            <div class="wpr">
					 <p class="wpr-efectivo form-inline">
		            	Monto a Cobrar (Tarjeta saldo en 1 cuota)<br/>
						<div class="success green btn-confirm-no-efectivo"></div>
		            	
		            </p>
					
		           	           
		            <p class="wpr-efectivo form-inline">
		            	Monto en Efectivo:<br/>
		            	<input type="text" class="form-control numeric monto-efectivo2" name="monto-efectivoc"  value="0" >
		            </p>
					 <p class="wpr-efectivo form-inline">
		            	Monto con Tarjeta:<br/>
		            	<input type="text" class="form-control numeric monto-tarjeta2" name="monto-tarjetac" value="0" >
		            </p>
		           	         
						<input type="hidden" name="idc" value="{$aPago->id}" >
						<input type="hidden" name="totalc" value="{$aPago->total}" >
						
					 
					
		        </div>    
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
               	<button class="btn btn-success green finalizar">FINALIZAR</button>
				
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</div>

{/foreach}





<!-- modales de la pantalla -->
{include file='admin/deudores/modal-agregar-producto.tpl'}
{include file='admin/deudores/modal-agregar-servicio.tpl'}
{include file='admin/deudores/modal-agregar-item.tpl'}
{/block}
