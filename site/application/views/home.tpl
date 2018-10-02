{extends file='base/base.tpl'}

{block name='custom_css'}
<style type="text/css">

    div.test { display:none }

</style>
{/block}

{block name='custom_js'}

    <script src="{site_url()}assets/js/turnos.js"></script>
    <script src="{site_url()}assets/js/historial.js"></script>

    <script type="text/javascript">
        $(function(){
            Turnos.init();
            Historial.init();
        });
    </script>

{/block}
{block name='custom_init'}
{/block}

{block name='body_classes'}home{/block}

{block name='header-container'}
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
                            {if $turnosProximos}
                                {foreach $turnosProximos as $turno name=foo}


                                <div class="tr {if $smarty.foreach.foo.first} first {/if}">
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
                            {else}
                            	<div class="tr">
	                            	<div class="td">
		                            <div class="clearfix m-t-1"></div>
                                		No tenés turnos reservados. ¿Qué esperás?.
	                            	</div>
                            	</div>
                            {/if}
                            <!--<div class="tr">
                                <div class="td text-primary turno">
                                    <span class="big">25</span>
                                    <span class="day">MIERCOLES</span>
                                    <span class="month">septiembre</span>
                                </div>
                                <div class="td text-warning hour"><i class="fa fa-clock-o" aria-hidden="true"></i> 9:30 PM</div>
                                <div class="td service">Peinado / Planchita</div>
                                <div class="td coiffeur">Ezequiel Montero</div>
                                <div class="td icon"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                <div class="td icon"><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                            </div>
                            -->
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 row-title">
                            <h2 class="pull-left"><small><strong>Historial</strong></small></h2>
                            <a href="{site_url()}profile/historial" class="btn btn-link pull-right">VER TODO</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="historial table">
	                        {if $turnosVencidos}
                            {foreach $turnosVencidos as $turno name=faa}
                                <div class="tr {if $smarty.foreach.faa.first} first {/if}">
                                    <div class="td text-primary date">
                                        {$turno->fecha_hora|date_format:"%e de %B de %Y"}
                                    </div>
                                    <div class="td service">{$turno->servicio->nombre}</div>
                                    <div class="td coiffeur">{$turno->coiffeur->nombre}</div>
                                    <div class="td icon"><a href="{site_url()}turnos/ver/{$turno->id}"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                    {if count($turno->fotos) gt 0}
                                        <div class="images">
                                            {foreach $turno->fotos as $foto}
                                                    <img src="{ImagenManager::getInstance()->getUrl($foto,'180x180')}" alt="..." class="img-responsive pull-left">
                                            {/foreach}
                                            <!--a href="historia.php">
                                                <img src="http://placehold.it/90x60" alt="..." class="img-responsive pull-left">
                                            </a-->
                                        </div>
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
                </div>

{/block}
