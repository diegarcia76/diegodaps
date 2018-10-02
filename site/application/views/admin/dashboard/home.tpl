{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}

{block name='custom_css'}


{/block}

{block name='custom_js'}

	<script type="text/javascript" src="{site_url()}assets/admin/js/home.js"></script>

	<script type="text/javascript">
    	$(function(){
			Home.init();
		});
    </script>

{/block}

{block name='content'}


<div class="row dashboard">
	<div class="col-lg-12">

	                <div class="btn-group m-t-1 m-b-2">
	                    <a class="btn green pull-left m-r-1" href="{site_url()}admin/turnos/add"> <i class="icon-plus"></i> Agregar Turno</a>
	                     <a class="btn green pull-left" href="{site_url()}admin/clientes/add"> <i class="icon-plus"></i> Agregar Cliente</a>
	                </div>

                    <div class="mt-element-list">
                        <div class="mt-list-head list-default dark">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="list-head-title-container">
                                        <!--<h3 class="list-title uppercase sbold">Turnos del día</h3>-->
                                        <div class="list-date"><i class="fa fa-calendar" aria-hidden="true"></i> {$smarty.now|date_format:"%e de %B, %Y"|upper}</div>
                                    </div>
                                </div>
                                <!--<div class="col-xs-4">
                                    <div class="list-head-summary-container">
                                        <div class="list-pending">
                                            <div class="badge badge-default list-count">3</div>
                                            <div class="list-label">Pending</div>
                                        </div>
                                        <div class="list-done">
                                            <div class="list-count badge badge-default last">2</div>
                                            <div class="list-label">Completed</div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="mt-list-container m-y-0  list-default">
													{if $turnosHoy}

													<table class="table table-stripped table-responsive tabla-responsive" id="tblDashboard">
															<thead>
																<tr>
																	<th>Estado</th>
																	<th>Hora</th>
																	<th>Cliente</th>
																	<th>Coiffeur</th>
																	<th>Sevicio</th>
																	<th>Acción</th>
																</tr>
															</thead>
															<tbody id="turnosHoyDash">
																{foreach $turnosHoy as $th}
																<tr>
																	<td>
																		<div class="fc-title">

																			<span class="label {$th->estadoTurno->className}">{$th->estadoTurno->nombre} &nbsp;
																			{if $th->prioridad gt 0}
																			<br>&nbsp;<strong>(sobreturno)</strong>
																			{/if}
																			</span>
																			
																		</div>
																	</td>
																	<td>{$th->fecha_hora|date_format:"%H:%M"} - {$th->fecha_hora_fin|date_format:"%H:%M"}</td>
																	<td>{if $th->cliente}{$th->cliente->nombre}{else}{$th->nombre}{/if}</td>
																	<td>{$th->coiffeur->nombre}</td>
																	<td>{$th->servicio->nombre}</td>
																	<td>
																		<button class="btn btn-default cambioEstado" data-id-turno="{$th->id}" data-accion="{$th->estadoTurno->accion_siguiente->nombre}"> {$th->estadoTurno->accion_siguiente->accion} </button>
																		<a class="btn btn-eliminar btn-icon-only btn-default" href="{site_url()}admin/turnos/eliminar/{$th->id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

																		<a class="btn btn-default btn-icon-only" href="{site_url()}admin/turnos/editar/{$th->id}">
																			<i class="fa fa-pencil" aria-hidden="true"></i>
																		</a>
																		<div class="clearfix"></div>
																		</div>
																	</td>
																</tr>
																{/foreach}

															</tbody>
														</table>
														{else}
															No hay turnos el día de hoy.
														{/if}
														<!--<ul style="margin-top: 20px;">




															{if $turnosHoy}
	                                {foreach $turnosHoy as $th}
	                                <li class="mt-list-item m-y-0 p-y-0">
										<div class="row">
											<div class="col-lg-3 col-md-6">
												<div class="row">
													<div class="col-md-5">
													 	<h4 class="m-y-0 p-b-2 p-t-1"><span class="label {$th->estadoTurno->className}">{$th->estadoTurno->nombre}</span></h4>
													</div>
													<div class="col-md-7">
													 	<h4 class="m-y-0 p-b-2 p-t-2"><i class="fa fa-clock-o" aria-hidden="true"></i> {$th->fecha_hora|date_format:"%H:%M"} - {$th->fecha_hora_fin|date_format:"%H:%M"}</h4>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-md-6 p-b-2 p-t-2">
												 <h4 class="m-y-0">
												 <a href="#">{$th->cliente->nombre}</a>
												</h4>
											</div>
											<div class="col-lg-4 col-md-6 p-b-2 p-t-2">
												<div class="row">
													<div class="col-md-6">
												<h5 class="m-y-0 p-y-0 pull-left text-uppercase"><i class="fa fa-user" aria-hidden="true"></i>
	 {$th->coiffeur->nombre}</h5>
													</div>
													<div class="col-md-6">
	 											<h5 class="m-y-0 p-y-0 p-l-1 pull-left text-uppercase"><i class="fa fa-scissors" aria-hidden="true"></i>
	 {$th->servicio->nombre}</h5></div>
												</div>

											</div>
											<div class="col-lg-3 col-md-6 p-b-2 p-t-1">
												<button class="btn btn-default pull-right cambioEstado" data-id-turno="{$th->id}" data-accion="{$th->estadoTurno->accion_siguiente->nombre}"> {$th->estadoTurno->accion_siguiente->accion} </button>
												<a class="btn btn-eliminar btn-icon-only btn-default pull-right m-r-2" href="{site_url()}admin/turnos/eliminar/{$th->id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												<!--<a class="btn btn-sm btn-eliminar" href="{site_url()}turnos/eliminar/{$th->id}">-->
												<!--<a class="btn btn-sm btn-eliminar" href="{site_url()}admin/turnos/eliminar/{$th->id}">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>-->
												<!--<a class="btn btn-default btn-icon-only pull-right m-r-2" href="{site_url()}admin/turnos/editar/{$th->id}">
													<i class="fa fa-pencil" aria-hidden="true"></i>
												</a>
												<div class="clearfix"></div>
											</div>
										</div>

	                                </li>
									{/foreach}
								{else}
									No hay turnos el día de hoy.
								{/if}







							</ul>-->
                        </div>
                    </div>
	</div>
</div>
{include file='admin/dashboard/modal-agregar-comentario.tpl'}
{/block}
