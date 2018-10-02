{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/admin/js/reportes.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/moment.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.js"></script>

	<script type="text/javascript">
    	$(function(){
			Reportes.initListado();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <link href="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
{/block}

{block name='content'}

   <div id="busqueda_avanzada" class="">
                <div class="panel-body">

                    <div class="form-body form-bordered form-horizontal">
                        <div class="row">
                            <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">CLIENTES</label>
                                        <select id="filtro-coiffeur" name="filtro-coiffeur" class="form-control select2 " placeholder='Seleccione Cliente'>
                                            <option value="">Sin filtrar</option>
                                        {foreach $clientes as $aCo}
                                            <option value="{$aCo->id}">{$aCo->nombre}</option>
                                        {/foreach}
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">ESTADOS</label>
                                        <select id="filtro-estados" name="filtro-estados" class="form-control select2 " placeholder='Seleccione Estado'>
                                            <option value="">Sin filtrar</option>
                                        {foreach $estados as $aEs}
                                            <option value="{$aEs->id}">{$aEs->nombre}</option>
                                        {/foreach}
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label m-b-1">FECHAS</label>
                                         <input name="input-fecha" id="filtro-fecha"  class="form-control date-picker" size="16" type="text" value="{date('d/m/Y')}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

<div class="row">
<div class="panel-body">
 <table class="table table-stripped table-responsive table-hover dt-responsive" id="tblReportes">
    <thead>
    	<tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Cliente</th>
	        <th>Servicio</th>
            <th class="dt-right">Estado</th>
            <th class="dt-right">Comisión</th>
    	</tr>
    </thead>
    <tbody>
    </tbody>
    
    </table>
    </div>
</div>
{/block}
