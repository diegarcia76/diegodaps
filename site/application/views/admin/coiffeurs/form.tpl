{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>


	<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>

	<script type="text/javascript" src="{site_url()}assets/admin/js/coiffeurs.js"></script>

	<script type="text/javascript">
    	$(function(){
			Coiffeurs.initForm();

		});
    </script>

{/block}

{block name='custom_css'}

{/block}

{block name='content'}
<div class="row">
	<div class="col-md-6">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-pencil font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Coiffeur</span>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="{site_url()}admin/coiffeurs/save" id="frmSaveCoiffeurs" method="post">
                                        	<input type="hidden" name="user_id" value="{$editUser->id}" />
											<div class="form-body">

												<div class="form-group">
													<label class="control-label">Nombre</label>
														<input type="text" class="form-control " name="nombre" placeholder="Nombre" value="{$editUser->nombre}" required="required">
												</div>

												<div class="form-group">
													<label class="control-label">Descripción</label>
														<textarea rows="3" class="form-control" name="descripcion" placeholder="Descripción" >{$editUser->descripcion}</textarea>
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

						                        {if !$editUser}
							                        <div class="form-group">
							                            <label class="control-label">Servicios a los cuales se les pondrá el precio por defecto.</label>
														<div class="checkbox-list">
															{foreach $servicios as $aServ}
						                                		<label><input name="servicios[]" type="checkbox" value="{$aServ->id}" />{$aServ->nombre}</label>
															{/foreach}
														</div>
							                        </div>
							                    {/if}

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
														<a href="{site_url()}admin/coiffeurs" class="btn default pull-right">Cancelar</a>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
</div>
{/block}

