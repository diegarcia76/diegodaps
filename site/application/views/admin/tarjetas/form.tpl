{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>


	<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>

	<script type="text/javascript" src="{site_url()}assets/admin/js/servicios.js"></script>

	

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
                                            <span class="caption-subject font-green-sharp bold uppercase">Edita % de tarjetas</span>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="{site_url()}admin/tarjetas/save" id="" method="post">
                                        	
											<div class="form-body">

												<div class="form-group">
													<label class="control-label">1 Cuota</label>
														<input type="text" class="form-control" name="c1" value="{$aTarjetas->cuota1}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">2 Cuotas</label>
														<input type="text" class="form-control" name="c2"  value="{$aTarjetas->cuota2}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">3 Cuotas</label>
														<input type="text" class="form-control" name="c3" value="{$aTarjetas->cuota3}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">4 Cuotas</label>
														<input type="text" class="form-control" name="c4"  value="{$aTarjetas->cuota4}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">5 Cuotas</label>
														<input type="text" class="form-control" name="c5" value="{$aTarjetas->cuota5}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">6 Cuotas</label>
														<input type="text" class="form-control" name="c6"  value="{$aTarjetas->cuota6}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">7 Cuotas</label>
														<input type="text" class="form-control" name="c7" value="{$aTarjetas->cuota7}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">8 Cuotas</label>
														<input type="text" class="form-control" name="c8"  value="{$aTarjetas->cuota8}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">9 Cuotas</label>
														<input type="text" class="form-control" name="c9" value="{$aTarjetas->cuota9}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">10 Cuotas</label>
														<input type="text" class="form-control" name="c10"  value="{$aTarjetas->cuota10}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">11 Cuotas</label>
														<input type="text" class="form-control" name="c11" value="{$aTarjetas->cuota11}" required="required">
												</div>
												
												<div class="form-group">
													<label class="control-label">12 Cuotas</label>
														<input type="text" class="form-control" name="c12"  value="{$aTarjetas->cuota12}" required="required">
												</div>
												
												
						                      



											</div>
											<div class="form-actions">
												<div class="row">
														<button type="submit" class="btn btn-lg green">Guardar</button>
														
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
</div>
</div>
{/block}

