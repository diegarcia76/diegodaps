{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/admin/js/marcas.js"></script>
<script type="text/javascript">
	$(function(){
		Marcas.initForm();

	});
</script>
{/block}

{block name='custom_css'}

{/block}

{block name='content'}
<div class="row">
	<div class="col-md-8">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-pencil font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Marca</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{site_url()}admin/productos/save_marca" id="frmSaveMarcas" method="post">
                	<input type="hidden" name="marca_id" value="{$editUser->id}" />
					<div class="form-body">						

						<div class="form-group">
							<label class="control-label">Nombre</label>
								<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{$editUser->nombre}" required="required">
						</div>

						<div class="form-group">
							<label class="control-label">Descripción</label>
								<textarea rows="3" class="form-control" name="descripcion" placeholder="Descripción" >{$editUser->descripcion}</textarea>
						</div>                      

						<div class="form-group">
                            <label class="control-label col-md-3">Submarcas</label>
                            <div class="col-md-9">

			                    <table id="tblPremiosSorteo" class="table table-stripped table-responsive">
			                    <thead>
			                    	<tr>
			                        	<th width="20"></th>
			                        	<th>Nombre</th>
			                        	<th>Descripción</th>
									
			                        	<th>Acciones</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	{foreach $editUser->submarcas as $sub}
			                        <tr>
			                        	<td><i class="icon-fullscreen"></i><input type="hidden" class="submarca_id" name="submarca_id[]" value="{$sub->id}" /></td>
			                        	<td><input type="text" id="premio-titulo-{$sub->id}" name="nombreS[]" value="{$sub->nombre}" required="required" class="required form-control nombreS" /></td>
			                        	<td><input type="text" id="premio-description-{$sub->id}" name="descripcionS[]" value="{$sub->descripcion}" class="form-control descripcionS" /></td>
			                        	<td><a class="btn mini red btnEliminarPremio" href="#"><i class="fa fa-times"></i></a></td>
			                        </tr>
			                        {/foreach}
			                    </tbody>
			                    <tfoot>
			                    	<tr>
			                        	<td class="text-right" colspan="6">
			                        		<div class="text-right">
			                                    <a href="#" class="btn green btnAddPremio pull-left"><i class="icon-plus"></i> Agregar SubMarca</a>
			                           		</div>
			                            </td>
			                        </tr>
			                    </tfoot>
			                    </table>

			                </div>
                        </div> 

					</div>
					<div class="form-actions">
						<div class="row">
								<button type="submit" class="btn green btn-lg">Guardar</button>
								<a href="{site_url()}admin/productos/listar_marcas" class="btn default pull-right">Cancelar</a>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
{/block}
