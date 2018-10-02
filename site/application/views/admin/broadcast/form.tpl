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

	<script type="text/javascript" src="{site_url()}assets/admin/js/broadcast.js"></script>

	<script type="text/javascript">
    	$(function(){
			Broadcast.initForm();

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
                                            <span class="caption-subject font-green-sharp bold uppercase">Enviar Notificación Broadcast</span>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="{site_url()}admin/broadcast/save" id="frmSaveBroadcast" method="post">
                                        	<input type="hidden" name="user_id" value="{$editUser->id}" />
											<div class="form-body">

												<div class="form-group">
													<label class="control-label">Título</label>
														<input type="text" class="form-control" name="titulo" placeholder="Título" value="" required="required">
												</div>												

												<div class="form-group">
													<label class="control-label">Descripción</label>
														<textarea rows="3" class="form-control" name="descripcion" placeholder="Descripción" ></textarea>
												</div>

											</div>
											<div class="form-actions">
                                                <button type="submit" class="btn green btn-lg">Enviar Notificación Broadcast</button>
                                                <a href="{site_url()}admin/broadcast" class="btn btn-link btn-lg pull-right">Cancelar</a>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
<!--</div>-->
</div>
{/block}

