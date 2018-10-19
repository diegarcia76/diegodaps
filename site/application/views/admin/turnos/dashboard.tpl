{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jsrender.js"></script>
	<script type="text/javascript" src="{site_url()}assets/admin/js/turnos.js?version=20180425"></script>

	<script type="text/javascript">
    	$(function(){
			Turnos.init();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-datepicker/css/datepicker.css"/>
{/block}

{block name='content'}
    <div class="portlet-title">
       <div class="table-toolbar">
		        <div class="row">
		            <div class="col-sm-6">
	                    <a class="btn green" href="{site_url()}admin/turnos/add"> <i class="icon-plus"></i> Agregar Turno</a>
						<a class="btn green" href="{site_url()}admin/clientes/add"> <i class="icon-plus"></i> Agregar Cliente</a>
		            </div>
		            <div class="col-sm-6 hidden-xs text-right">
		            	<ul class="list-unstyled list-inline list-estados">
	                    	<li><span class="label reservado "> Reservado</span></li>
	                    	<li><span class="label recepcionado"> Recepcionado</span></li>
	                    	<li><span class="label enservicio"> En Servicio</span></li>
	                    	<li><span class="label cancelado"> Cancelado</span></li>
	                    	<li><span class="label terminado"> Terminado</span></li>
	                    	<li><span class="label cobrado"> Cobrado</span></li>
	                    </ul>
		            </div>
		        </div>
	    </div>
    </div>

    <div class="dahsboard-turnos">
    	<div class="wpr-datepicker">
        	<div id="Adatepicker" class="date-picker"></div>
        </div>
        <div class="table-responsive" id="tab-turnos">
            <ul class="nav nav-tabs text-center">
                {foreach $aCoiffeurs as $co name=obj}
                    <li role="presentation" {if $smarty.foreach.obj.first } class="active" {/if}>
                        <a href="#{$co->id}" data-id-coiffeur="{$co->id}" aria-controls="now" role="tab" data-toggle="tab">{$co->nombre}</a>
                    </li>
                {/foreach}
            </ul>
            <div class="tab-content">
                {foreach $aCoiffeurs as $co name=obje}
				 <div role="tabpanel" class="tab-pane {if $smarty.foreach.obje.first } active {/if}" id="{$co->id}">
                        <div class="list-group" id="listado_horario_{$co->id}">
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>

	{include file='admin/turnos/item-horario.tpl'}

{/block}
