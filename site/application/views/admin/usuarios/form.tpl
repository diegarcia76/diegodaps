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

	<script type="text/javascript" src="{site_url()}assets/admin/js/usuarios.js"></script>

	<script type="text/javascript">
    	$(function(){
			Usuarios.initForm();
		});
    </script>

{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/backend/plugins/bootstrap-datepicker/css/datepicker.css"/>

{/block}

{block name='content'}
<div class="row">
	<div class="col-md-6">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-pencil font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Usuario</span>
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
			</div>
		</div>
		<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="{site_url()}admin/usuarios/save" id="frmSaveUsuarios" method="post">
                                        	<input type="hidden" name="usuario_id" value="{$editAdministrador->id}" />
											<div class="form-body">
												<div class="form-group">
													<label class="control-label">Nombre y Apellido</label>
													
														<input type="text" class="form-control " name="nombre" placeholder="Nombre y apellido" value="{$editAdministrador->nombre}" required="required">
													
												</div>
												<div class="form-group">
													<label class="control-label">Correo electrónico</label>
														<div class="input-group">
															<span class="input-group-addon">
															<i class="fa fa-envelope"></i>
															</span>
															<input type="email" class="form-control required email" placeholder="Correo electrónico" name="email" value="{$editAdministrador->email}">
														</div>
												</div>
                                                <div class="form-group">
													<label class="control-label">Perfil</label>
														<select id="perfil" name="perfil" class="form-control select2 " placeholder='Seleccione Perfil'>
						                                    <option value="">Sin Perfil</option>
						                                	{foreach $aPerfiles as $aPer}
						                                    	<option value="{$aPer->id}" {if $editAdministrador->perfil->id eq $aPer->id} selected="selected" {/if}>{$aPer->nombre}</option>
						                                    {/foreach}
						                                </select>
												</div>
												<div class="form-group">
													<label class="control-label">Contraseña</label>
														<div class="input-group">
															<input type="password" class="form-control " placeholder="Contraseña" name="password" id="password">
															<span class="input-group-addon ">
															<i class="fa fa-user"></i>
															</span>
														</div>
                                                        <span class="help-block"><i class="fa fa-exclamation"></i> Si no quieres cambiar la contraseña deja los campos en blanco</span>
												</div>

												<div class="form-group">
													<label class="control-label">Repetir Contraseña</label>
														<div class="input-group">
															<input type="password" class="form-control input-circle-left" placeholder="Repetir contraseña" name="password2" id="password2">
															<span class="input-group-addon input-circle-right">
															<i class="fa fa-user"></i>
															</span>
														</div>
												</div>
												<div class="form-group">
						                            <label class="control-label">Activo</label>
														<div class="checkbox-list">
						                                	<label><input name="activo" type="checkbox" value="1" {if $editAdministrador->activo eq true}checked="checked"{/if} /></label>
														</div>
						                        </div>

											</div>
											<div class="form-actions">
												<div class="row">
														<button type="submit" class="btn green btn-lg">Guardar</button>
														<a href="{site_url()}admin/usuarios" class="btn pull-right default">Cancelar</a>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
			</div>
{/block}

