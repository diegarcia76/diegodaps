{extends file='base/base.tpl'}

{block name='custom_js'}

	<script src="{site_url()}assets/js/historial.js"></script>

	<script type="text/javascript">
    	$(function(){
			Historial.init();
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

				<div class="row">
					<div class="col-md-12 row-title">
						<h2 class="pull-left"><small><strong>Historial</strong></small></h2>
					</div>
				</div>
				<div class="panel panel-default">
				    <div class="historial table">
					    	                        {if $turnosVencidos}

                    	{foreach $turnosVencidos as $turno name=faa}
                            <div class="tr {if $smarty.foreach.faa.first} first {/if} pst">
                                <div class="td text-primary date">
                                    {$turno->fecha_hora|date_format:"%e de %B de %Y"}
                                </div>
                                <div class="td service">{$turno->servicio->nombre}</div>
                                <div class="td coiffeur">{$turno->coiffeur->nombre}</div>
                                <div class="td icon"><a href="{site_url()}turnos/ver/{$turno->id}"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                {if count($turno->fotos) gt 0}
                                    <a href="{site_url()}turnos/ver/{$turno->id}">
	                                    <div class="images">
	                                        {foreach $turno->fotos as $foto}
	                                                <img src="{ImagenManager::getInstance()->getUrl($foto,'180x180')}" alt="..." width="auto" height="60" class="pull-left">
	                                        {/foreach}

	                                    </div>
                                    </a>
                                    <div class="clearfix"></div>
                                {/if}

                            </div>
                        {/foreach}

                        {else}
                            <div class="tr">
	                            	<div class="td">
		                            <div class="clearfix m-t-1"></div>
                                		No hay turnos en tu historial.
	                            	</div>
                            </div>

                        {/if}


					</div>
				</div>
				<a href="#" class="btn btn-sm btn-default align-center message"></a>
			</div>
{/block}