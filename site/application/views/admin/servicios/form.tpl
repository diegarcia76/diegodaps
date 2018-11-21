{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>


	<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>

	<script type="text/javascript" src="{site_url()}assets/admin/js/servicios.js"></script>

	<script type="text/javascript">
    	$(function(){
			Servicios.initForm();

		});
    </script>

{/block}

{block name='custom_css'}

{/block}

{block name='content'}
<div class="row">

<div class="col-md-6">
							<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-pencil font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Servicio</span>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="{site_url()}admin/servicios/save" id="frmSaveServicios" method="post">
                                        	<input type="hidden" name="user_id" value="{$editUser->id}" />
											<div class="form-body">

												<div class="form-group">
													<label class="control-label">Nombre</label>
														<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{$editUser->nombre}" required="required">
												</div>
												
												
												<div class="form-group">
							<label class="control-label">Categoria</label>
								<select id="categoria" name="categoria" class="form-control select2 " placeholder='Seleccione Categoria' required="required">
										<option value="">Selecione Categoria</option>
										{foreach $categorias as $c}
                                    <option value="{$c->id}"   {if $editUser->categoria eq $c->id} selected="selected" {/if} >{$c->nombre}</option>
									{/foreach}
                                	
                                </select>
						</div>


												<div class="form-group">
													<label class="control-label">Precio Puntos</label>
														<input type="text" class="form-control" name="precio_puntos" placeholder="Precio Puntos" value="{$editUser->precio_puntos}" >
												</div>

						                        <div class="form-group">
													<label class="control-label">Puntos Premio</label>
														<input type="text" class="form-control" name="puntos_premio" placeholder="Puntos Premio" value="{$editUser->puntos_premio}" >
												</div>

												<div class="form-group">
													<label class="control-label">Duración Incial</label>
														<input type="text" class="form-control" name="duracion" placeholder="Duración Inicial" value="{$editUser->duracion}" >
												</div>

						                        <div class="form-group">
													<label class="control-label">Duración espera (Intervalo)</label>
														<input type="text" class="form-control" name="duracion_espera" placeholder="Duración espera" value="{$editUser->duracion_espera}" >
												</div>
												
												<div class="form-group">
													<label class="control-label">Duración Final</label>
														<input type="text" class="form-control" name="intervalo" placeholder="Duración Final" value="{$editUser->intervalo}" >
												</div>

												<div class="form-group">
					                                <label class="control-label">Precio Default</label>
					                                <div class="input-group">
					                                    <span class="input-group-addon" id="basic-addon1">$</span>
					                                    <input type="text" class="form-control" name="precio_default" placeholder="Precio Default" value="{$editUser->precio_default}">
					                                </div>                            
					                            </div>

												<div class="form-group">
					                                <label class="control-label">Precio Efectivo Default</label>
					                                <div class="input-group">
					                                    <span class="input-group-addon" id="basic-addon1">$</span>
					                                    <input type="text" class="form-control" name="precio_efectivo_default" placeholder="Precio Efectivo Default" value="{$editUser->precio_efectivo_default}">
					                                </div>                            
					                            </div>

												<div class="form-group">
					                                <label class="control-label">Comisión Default</label>
					                                <div class="input-group">
					                                    <span class="input-group-addon" id="basic-addon1">%</span>
					                                    <input type="text" class="form-control" name="comision_default" placeholder="Comisión Default" value="{$editUser->comision_default}">
					                                </div>                            
					                            </div>

					                            <div class="form-group">
													<label class="control-label">División Grilla (en minutos)</label>
														<input type="text" class="form-control" name="division_grilla" placeholder="División Grilla" value="{$editUser->division_grilla}" >
												</div>

					                            <div class="form-group">
						                            <label class="control-label">En App</label>
														<div class="checkbox-list">
						                                	<label><input name="servicioEnApp" type="checkbox" value="1" {if $editUser->servicioEnApp eq true}checked="checked"{/if} /></label>
														</div>
						                        </div>

												<div class="form-group">
						                            <label class="control-label">Activo</label>
														<div class="checkbox-list">
						                                	<label><input name="activo" type="checkbox" value="1" {if $editUser->activo eq true}checked="checked"{/if} /></label>
														</div>
						                        </div>

											</div>
											<div class="form-actions">
												<div class="row">
														<button type="submit" class="btn btn-lg green">Guardar</button>
														<a href="{site_url()}admin/servicios" class="btn default pull-right">Cancelar</a>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
</div>
</div>
{/block}

