{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/admin/js/categorias.js"></script>
<script type="text/javascript">
	$(function(){
		Categorias.initForm();

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
                    <span class="caption-subject font-green-sharp bold uppercase">Edita los datos de la Categoría</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{site_url()}admin/categorias/save" id="frmSaveProductos" method="post">
                	<input type="hidden" name="user_id" value="{$editUser->id}" />
					<div class="form-body">

						

						<div class="form-group">
							<label class="control-label">Nombre</label>
								<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{$editUser->nombre}" required="required">
						</div>

						                      
                      

						<div class="form-group">
							<label class="control-label">Color</label>
								<select id="color" name="color" class="form-control select2 " placeholder='Seleccione Color'>
                                    <option value="verde"   {if $editUser->nombre eq 'verde'} selected="selected" {/if} >Verde</option>
									<option value="azul" {if $editUser->nombre eq 'azul'} selected="selected" {/if}>Azul</option>
									<option value="rojo" {if $editUser->nombre eq 'rojo'} selected="selected" {/if}>Rojo</option>
									<option value="amarillo" {if $editUser->nombre eq 'amarillo'} selected="selected" {/if}>Amarillo</option>
									<option value="violeta" {if $editUser->nombre eq 'violeta'} selected="selected" {/if}>Violeta</option>
									<option value="negro" {if $editUser->nombre eq 'negro'} selected="selected" {/if}>Negro</option>
                                	
                                </select>
						</div>

						<!--<div class="form-group">
                            <label class="control-label col-md-3">Activo</label>
                            <div class="col-md-9">
								<div class="checkbox-list">
                                	<label><input name="activo" type="checkbox" value="1" {if $editUser->activo eq true}checked="checked"{/if} /></label>
								</div>
                            </div>
                        </div-->

					</div>
					<div class="form-actions">
						<div class="row">
								<button type="submit" class="btn green btn-lg">Guardar</button>
								<a href="{site_url()}admin/categorias" class="btn default pull-right">Cancelar</a>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
{/block}
