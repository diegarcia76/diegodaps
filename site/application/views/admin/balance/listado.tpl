{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/admin/js/balance.js?rnd=20180303"></script>
    <script type="text/javascript" src="{site_url()}assets/admin/js/balance-print.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/moment.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.js"></script>

    <style>
      #output-print, #output-print * {
        visibility: hidden;
        display:none;
      }
    @media print {
        body * {
            visibility: hidden;
          }
          #output-print, #output-print * {
            visibility: visible;
            display:block;
          }
          #output-print {
            position: absolute;
            left: 0;
            top: 0;
          }
        }
    </style>
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
                                    <label class="control-label m-b-1 ">COIFFEURS</label>
                                        <select id="filtro-coiffeur" name="filtro-coiffeur" class="form-control select2 " placeholder='Seleccione Coiffeur'>
                                            <option value="">Sin filtrar</option>
                                        {foreach $coiffeurs as $aCo}
                                            <option value="{$aCo->id}">{$aCo->nombre}</option>
                                        {/foreach}
                                        </select>
                                </div>
                            </div>
                            <form name="frmFechas" id="frmFechas" action="{site_url()}admin/balance/imprimir" method="POST" target="_blank">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label m-b-1">FECHAS</label>
                                            
                                                <input name="input-fecha" id="filtro-fecha"  class="form-control date-picker" size="16" type="text" value="{date('d/m/Y')}" />
                                            
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn green " style="margin-top:37px;"> <i class="icon-printer"></i> Cerrar caja</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
	
	
 <div id="busqueda_avanzada" class="">
                <div class="panel-body">

                    <div class="form-body form-bordered form-horizontal">
                        <div class="row">
                            <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">Servicio</label>
									
                                        <select id="filtro-servicio" name="filtro-servicio" class="form-control select2 " placeholder='Seleccione Servicio'>
                                            <option value="">Sin filtrar</option>
                                        {foreach $servicios as $aSe}
                                            <option value="{$aSe->id}">{$aSe->nombre}</option>
                                        {/foreach}
                                        </select>
                                </div>
                            </div>
							
							 
						  
						  
						  
                        </div>
                    </div>
                </div>
    </div>	

<div class="row">
<div class="panel-body">
 <table class="table table-stripped table-responsive table-hover dt-responsive" id="tblBalance">
    <thead>
    	<tr>
            <th>Pago</th>
            <th>Fecha Pago</th>
            <th>Coiffeur</th>
			 <th>Acción</th>
            <th>Cliente</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th class="dt-right">Importe</th>
            <th class="dt-right">Comisión</th>
			 <th class="dt-right">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
            <tr>
                <th colspan="6" style="text-align:right">Totales:</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>
<div id="output-print">
    
</div>


{/block}
