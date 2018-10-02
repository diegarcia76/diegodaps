{extends file='base/base.tpl'}

{block name='custom_js'}

	<script src="{site_url()}assets/js/turnos.js"></script>

	<script type="text/javascript">
    	$(function(){
			Turnos.init();
		});
    </script> 

{/block}

{block name='custom_css'}
<style type="text/css">
	
	div.test { display:none }

</style>
{/block}

{block name='steper'}
{/block}
{block name='content'}
			<div id="content" class="col-md-12 col-lg-9">
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 row-title">
						<h2 class="pull-left"><small><strong>Próximos turnos</strong></small></h2>
						<a href="{site_url()}turnos/nuevo_turno" class="btn btn-link pull-right">NUEVO TURNO</a>
					</div>
				</div>
				<div class="panel panel-default">
				    <div class="turnos table">
					    {foreach $turnosProximos as $turno name=foo}
                            <div class="tr {if $smarty.foreach.foo.first} first {/if} pst">
                                <div class="td text-primary turno">
                                    <span class="big">{$turno->fecha_hora|date_format:"%e"}</span>
                                    <span class="day">{$turno->fecha_hora|date_format:"%A"|upper}</span>
                                    <span class="month">{$turno->fecha_hora|date_format:"%B"|lower}</span>
                                </div>
                                <div class="td text-warning hour"><i class="fa fa-clock-o" aria-hidden="true"></i> {$turno->fecha_hora|date_format:"%k:%M"} hs</div>
                                <div class="td service">{$turno->servicio->nombre}</div>
                                <div class="td coiffeur">{$turno->coiffeur->nombre}</div>
                                {if $turno->prioridad neq 0}
                                    <div class="td state"><span class="label label-danger">lista de espera</span></div>
                                {/if}
                                <div class="td icon edit"><a href="{site_url()}turnos/editar_turno/{$turno->id}"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                <div class="td icon"><a href="{site_url()}turnos/eliminar/{$turno->id}" data-turnoId="{$turno->id}" class="btn-eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                            </div>
                        {/foreach}
					</div>
				</div>

				<a href="#" class="btn btn-sm btn-default align-center message">
                     <!--Ver más <i class="fa fa-chevron-down" aria-hidden="true"></i>-->
                </a>
            </div>
{/block}