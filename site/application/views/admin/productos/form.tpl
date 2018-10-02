{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/admin/js/productos.js"></script>
<script type="text/javascript">
	$(function(){
		Productos.initForm();

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
                    <span class="caption-subject font-green-sharp bold uppercase">Edita los datos del Producto</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{site_url()}admin/productos/save" id="frmSaveProductos" method="post">
                	<input type="hidden" name="user_id" value="{$editUser->id}" />
					<div class="form-body">

						<div class="form-group">
							<label class="control-label">Código</label>
								<input type="text" class="form-control" name="codigo" placeholder="Código" value="{$editUser->codigo}">
						</div> 

						<div class="form-group">
							<label class="control-label">Nombre</label>
								<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{$editUser->nombre}" required="required">
						</div>

						<div class="form-group">
							<label class="control-label">Descripción</label>
								<textarea rows="3" class="form-control" name="descripcion" placeholder="Descripción" >{$editUser->descripcion}</textarea>
						</div>

                        <div class="form-group">
							<label class="control-label">Precio</label>
								<input type="text" class="form-control" name="precio" placeholder="Precio" value="{$editUser->precio}" >
						</div>

                        <div class="form-group">
							<label class="control-label">Precio Efectivo</label>
								<input type="text" class="form-control" name="precio_efectivo" placeholder="Precio" value="{$editUser->precio_efectivo}" >
						</div>

						<div class="form-group">
							<label class="control-label">Marca</label>
								<select id="filtro-marca" name="filtro-marca" class="form-control select2 " placeholder='Seleccione Marca'>
                                    <option value="">Sin Marca</option>
                                	{foreach $aMarcas as $aMa}
                                    	<option value="{$aMa->id}" {if $editUser->marca->id eq $aMa->id} selected="selected" {/if}>{$aMa->nombre}</option>
                                    {/foreach}
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
								<a href="{site_url()}admin/productos" class="btn default pull-right">Cancelar</a>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
{/block}
