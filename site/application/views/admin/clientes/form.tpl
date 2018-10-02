{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

	<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>

	<script type="text/javascript" src="{site_url()}assets/admin/js/clientes.js"></script>

	<script type="text/javascript">
    	$(function(){
			Clientes.initForm();
			Clientes.initBloqueo();

		});
    </script>

{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

{/block}

{block name='content'}
<div class="row">
	<div class="col-md-6">
							<!--<div class="portlet light">-->
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-pencil font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Cliente</span>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="{site_url()}admin/clientes/save" id="frmSaveClientes" method="post" enctype="multipart/form-data">
                                        	<input type="hidden" name="user_id" value="{$editUser->id}" />
											<div class="form-body">

												<div class="form-group">
													<label class="control-label">Nombre</label>
														<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{$editUser->nombre}" required="required">
												</div>
												<div class="form-group">
                                                    <label class="control-label">Fecha de Nacimiento</label>
                                                        <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                            <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{if $editUser->fecha_nacimiento}{$editUser->fecha_nacimiento->format('d/m/Y')}{/if}">
                                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                        <!-- /input-group -->
                                                        <span class="help-block">
                                                        Ingrese una fecha </span>
                                                </div>
                                                <div class="form-group">
													<label class="control-label">Teléfono</label>
														<input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="{$editUser->telefono}">
												</div>
												<!--      Imagen      -->
												<div class="form-group">
						                            <label class="control-label">Foto</label>
						                                <div class="checkbox-list">
						                                    <label><input name="imagen" id="imagen" type="file" /></label>
						                                    {if $editUser->foto }
						                                    <img name="imageThumb" id="imageThumb" src="{ImagenManager::getInstance()->getUrl($editUser->foto,'')}" class="img-responsive">
						                                    <label><input name="borrar_imagen" type="checkbox" value="1" >Borrar Foto </label>
						                                    {else}
						                                    <img name="imageThumb" id="imageThumb" src="{site_url()}uploads/sin-imagen120.jpg" class="img-responsive">
						                                    {/if}
						                                </div>
						                        </div>

						                        <div class="form-group">
													<label class=" control-label">Puntos Acumulados</label>
														<input type="text" class="form-control" name="puntos_acumulados" placeholder="Puntos Acumulados" value="{$editUser->puntos_acumulados}" >
												</div>

												<div class="form-group">
													<label class="control-label">Correo electrónico</label>
														<div class="input-group">
															<span class="input-group-addon">
															<i class="fa fa-envelope"></i>
															</span>
															<input type="email" class="form-control required email" placeholder="Correo electrónico" name="email" value="{$editUser->email}">
														</div>
												</div>

												<div class="form-group">
													<label class="control-label">Contraseña</label>
														<div class="input-group">
															<input type="password" class="form-control " placeholder="Contraseña" name="password" id="password">
															<span class="input-group-addon">
															<i class="fa fa-user"></i>
															</span>
														</div>
                                                        <span class="help-block"><i class="fa fa-exclamation"></i> Si no quieres cambiar la contraseña deja los campos en blanco</span>
												</div>

												<div class="form-group">
													<label class="control-label">Repetir Contraseña</label>
														<div class="input-group">
															<input type="password" class="form-control " placeholder="Repetir contraseña" name="password2" id="password2">
															<span class="input-group-addon">
															<i class="fa fa-user"></i>
															</span>
														</div>
												</div>

												<div class="form-group">
						                            <label class="control-label col-md-3">Activo</label>
						                            <div class="col-md-9">
														<div class="checkbox-list">
						                                	<label><input name="activo" type="checkbox" value="1" {if $editUser->activo eq true}checked="checked"{/if} /></label>
														</div>
						                            </div>
						                        </div>

						                        <div class="form-group">
						                            <label class="control-label col-md-3">Bloqueado</label>
						                            <div class="col-md-9">
														<div class="checkbox-list">
						                                	<label><input name="bloqueado" type="checkbox" value="1" {if $editUser->bloqueado eq true}checked="checked"{/if} /></label>
														</div>
						                            </div>						                            
						                        </div>

						                        <div class="form-group panel_bloqueo {if $editUser->bloqueado eq false}hidden{/if}">
						                        	<div class="col-md-9">
	                                                    <label class="control-label">Fecha de DesBloqueo</label>
                                                        <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                            <input type="text" class="form-control" name="fecha_desbloqueo" id="fecha_desbloqueo" value="{if $editUser->fecha_desbloqueo}{$editUser->fecha_desbloqueo->format('d/m/Y')}{else}{$fecha_desbloqueo->format('d/m/Y')}{/if}">
                                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                        <!-- /input-group -->
                                                        <span class="help-block">
                                                        Ingrese una fecha </span>
	                                                </div>
                                                </div>

						                        <br><br><br>
											</div>
											<div class="form-actions">
                                                <button type="submit" class="btn green btn-lg">Guardar</button>
                                                <a href="{site_url()}admin/clientes" class="btn btn-link btn-lg pull-right">Cancelar</a>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
<!--</div>-->
</div>
{/block}

