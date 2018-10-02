{extends file='base/base.tpl'}

{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script> 
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script> 
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script> 
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script> 
	<script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
	<script src="{site_url()}assets/js/profile.js"></script>

	<script type="text/javascript">
    	$(function(){
			Profile.init();
		});
    </script> 
{/block}

{block name='custom_css'}
<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-datepicker/css/datepicker.css"/>
{/block}

{block name='steper'}
{/block}

{block name='content'}
			<div id="content" class="col-md-12 col-lg-9 p-t-2">
				<div class="panel panel-default">
					<div class="row">
						<form id="frmSaveProfile" class="p-x-2 p-y-2" method="post" action="{site_url()}profile/save">
						<input type="hidden" name="user_id" value="{$usuarioActual->id}">
						<div class="col-md-6">
						 <div class="form-group">
						    <label for="name">NOMBRE</label>
						    <input type="text" class="form-control" id="name" name="nombre" value="{$usuarioActual->nombre}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="email">EMAIL</label>
						    <input type="email" class="form-control" id="email" name="email" value="{$usuarioActual->email}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="fecha-nacimiento">FECHA DE NACIMIENTO</label>
							<input type="text" class="form-control date-picker" data-mask="99-99-9999" name="fecha_nacimiento" value="{$usuarioActual->fecha_nacimiento|date_format:"%d-%m-%Y"}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="phone">TELÉFONO</label>
						    <input type="phone" class="form-control" id="phone" name="telefono" value="{$usuarioActual->telefono}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="profesion">PROFESIÓN</label>
						    <select name="profesion" class="form-control">
						    	{foreach $aProfesiones as $pro}
									<option value="{$pro->id}" {if $pro->id==$usuarioActual->profesion->id} selected {/if}>{$pro->nombre}</option>
								{/foreach}
							</select>
						  </div>
				<a href="/" class="btn btn-sm btn-primary">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
							</a>						</div>
						<div class="col-md-6">
						  
						  <div class="form-group">
						    <label for="whatsapp">WHATSAPP</label>
						    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{$usuarioActual->whatsapp}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="facebook">FACEBOOK</label>
							<input type="text" class="form-control" name="facebook" value="{$usuarioActual->facebook}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="twitter">TWITTER</label>
						    <input type="text" class="form-control" id="twitter" name="twitter" value="{$usuarioActual->twitter}">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="password">CONTRASEÑA</label>
						    <input type="password" class="form-control" id="password" name="password" value="">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <div class="form-group">
						    <label for="password2">REPETIR CONTRASEÑA</label>
						    <input type="password" class="form-control" id="password2" name="password2" value="">
						    <i class="fa fa-pencil form-control-feedback p-t-2" aria-hidden="true"></i>
						  </div>
						  <button type="submit" name="" class="btn btn-success btn-lg pull-right">confirmar</button>

						</div>
						<div class="clearfix"></div>

						</form>
					</div>
				</div>			
            </div>
{/block}