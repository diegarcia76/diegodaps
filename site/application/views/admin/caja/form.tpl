{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/admin/js/caja.js"></script>
<script type="text/javascript">
	$(function(){
		Caja.initListado();

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
                    <span class="caption-subject font-green-sharp bold uppercase">Extraccion de caja</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{site_url()}admin/caja/extraccionSave" id="frmSaveProductos" method="post">
                	
					<div class="form-body">

						

						<div class="form-group">
							<label class="control-label">Monto</label>
								<input type="text" class="form-control" name="monto" placeholder="Monto a Extraer" value="" required="required">
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
								<a href="{site_url()}admin/caja" class="btn default pull-right">Cancelar</a>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
{/block}