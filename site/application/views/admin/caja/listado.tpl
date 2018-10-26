{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/admin/js/caja.js?rnd=20180302"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

	<script type="text/javascript">
    	$(function(){
			Caja.initListado();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}

<div id="busqueda_avanzada" class="">
                <div class="panel-body">

                    <div class="form-body form-bordered form-horizontal">
                        <div class="row">
                            <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">BUSQUEDA CLIENTES </label>
                                        <select id="filtro-cliente" name="filtro-cliente" class="form-control select2 " placeholder='Seleccione Cliente'>
                                            <option value="">Sin filtrar</option>
                                        {foreach $clientes as $aCo}
                                            <option value="{$aCo->id}">{$aCo->nombre}</option>
                                        {/foreach}
                                        </select>
                                </div>
                            </div>
							
							
							 <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">BUSQUEDA FORMA DE PAGO </label>
                                        <select id="filtro-forma" name="filtro-forma" class="form-control select2 " placeholder='Seleccione Forma'>
                                            <option value="">Sin filtrar</option>
                                        
                                            <option value="1">EFECTIVO</option>
											 <option value="2">TARJETA</option>
											  <option value="3">CANJE</option>
											   <option value="4">EFECTIVO / TARJETA</option>
                                     
                                        </select>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
    </div>

<div class="row">
    <div class="panel-body">
        <table class="table table-stripped table-responsive table-hover dt-responsive" id="tblTickets">
            <thead>
            	<tr>
                    <th>Nro</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Total</th>
					<th>Total Efect</th>
					<th>Total Tarj</th>
                    <th class="dt-right">Forma de Pago</th>
            	</tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
{/block}
