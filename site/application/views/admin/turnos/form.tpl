{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

	<script src="{site_url()}assets/common/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>

	<script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="{site_url()}assets/common/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>


	<script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>
	<script type="text/javascript" src="{site_url()}assets/common/plugins/jsrender.js"></script>
	<script type="text/javascript" src="{site_url()}assets/admin/js/turnos.js?version=20180628"></script>

	<script type="text/javascript">
    	$(function(){
			Turnos.initForm();
			$('#cliente').select2();
			$('#servicio').select2();
			Turnos.initFotoForm();
			$('#ocultar_coiffeur').show();
		});
    </script>

{/block}

{block name='custom_css'}

	<!-- ******* css para multile files uploads ******* -->
	<link rel="stylesheet" href="{site_url()}assets/common/plugins/jquery-file-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="{site_url()}assets/common/plugins/jquery-file-upload/css/jquery.fileupload-ui.css">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="{site_url()}assets/common/plugins/jquery-file-upload/css/jquery.fileupload-noscript.css"></noscript>
	<noscript><link rel="stylesheet" href="{site_url()}assets/common/plugins/jquery-file-upload/css/jquery.fileupload-ui-noscript.css"></noscript>

	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

{/block}

{block name='content'}
	{if $editUser}
<!--<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#turno" aria-expanded="false" aria-controls="turno">
  <i class="fa fa-pencil" aria-hidden="true"></i> Editar el turno
</button>-->

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#fotos" aria-expanded="false" aria-controls="fotos">
  <i class="fa fa-photo" aria-hidden="true"></i> Agregar fotos
</button>
	{/if}
<div class="clearfix" style="margin-top: 30px;"></div>

{if $editUser}
	<!--   FOTOSSSSSS    -->
	<div class="col-md-6 collapse" id="fotos">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Agrega y Edita las Fotos</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="{site_url()}admin/turnos/guardar_foto" id="frmSaveTurnosFotos" method="post" class="form" enctype="multipart/form-data">
                    	<input type="hidden" name="turno_id" value="{$editUser->id}" />


                    		<!--      Imagen      -->
							<div class="form-group">

                                <!-- The container for the uploaded files -->
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <span>Elegir fotos para subir</span>
                                    <!-- The file input field used as target for the file upload widget -->
                                    <input id="fileupload" type="file" name="files[]" multiple>
                                </span>

                                <div id="files-container" class="files">
                                	{foreach $editUser->fotos as $aFoto}
                                        <div class="wpr-image">
                                        	<p>
                                            	<img src="{ImagenManager::getInstance()->getUrl($aFoto, '120x120')}" class="img-preview pull-left" />
                                                <span>Imagen actual</span>
                                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button><br />
                                                <input type="hidden" name="images[]" value="{$aFoto->id}" />
                                          	</p>
                                    	</div>
                                    {/foreach}
                                </div>

                                <div class="form-actions text-right">
                                    <div class="controls">
                                        <button type="submit" name="btn-publicar" value="1" class="btn btn-circle blue">Publicar</button>
                                    </div>
                                </div>

	                        </div>


    				</form>
    			</div>
    </div>
    {/if}

<!--<div class="clearfix" style="margin-top: 30px;"></div>-->


<div class="row" id="turno">
	<form action="{site_url()}admin/turnos/save" id="frmSaveTurnos" class="formulario" method="post">
	<div class="col-md-3">
		<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil font-green-sharp"></i>
        		<span class="caption-subject font-green-sharp bold uppercase">Datos del Turno</span>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->

                    	<input type="hidden" name="turno_id" id="turno_id" value="{$editUser->id}" />
                    	<input type="hidden" name="fecha" id="fecha" value="" />
                    	<input type="hidden" name="fecha_sola" id="fecha_sola" value="{$editUser->fecha_hora|date_format:'Y-m-d'}" />
                    	<input type="hidden" name="hora_sola" id="hora_sola" value="{$editUser->fecha_hora|date_format:'H:i'}" />

                    	<input type="hidden" name="coiffeur" id="coiffeur" value="" />

						<div class="form-body">

							<div class="form-group  form-md-line-input">
				                <select class="form-control change_cliente" {if (($editUser->cliente) || ($editUser->nombre neq ''))} disabled="disabled" {/if} required="required" name="cliente" id="cliente" >
				                	<option value=""></option>
					                <option value="0"  {if $editUser->nombre neq ''} selected="selected" {/if}>Nuevo cliente</option>
					                {if $clientes}
					                	{foreach $clientes as $sub}
					                    	<option value="{$sub->id}" {if $editUser->cliente->id eq $sub->id} selected="selected" {/if}><span class="text-uppercase">{$sub->nombre}</span> - ({$sub->email}) </option>
					                    {/foreach}
					                {/if}
				                </select>
				                <div id="cliente_nuevo" class="form-group {if $editUser->nombre eq ''} hidden {/if}" >
									<input type="text" class="form-control cliente_nuevo" placeholder="escribe el nombre del nuevo cliente" value="{$editUser->nombre}" id="nombreturno" {if $editUser->nombre neq ''} disabled="disabled" {/if}/>
									<input type="text" class="form-control cliente_nuevo " placeholder="escribe el teléfono del nuevo cliente" value="{$editUser->telefono}" id="telefonoturno" {if $editUser->telefono neq ''} disabled="disabled" {/if}/>
								</div>
							</div>




							<div class="form-group form-md-line-input">
				                <select class="form-control change_calendar" required="required" name="servicio" id="servicio">
					                <option value=""></option>
					                {if $servicios}
					                	{foreach $servicios as $sub}
					                    	<option value="{$sub->id}" {if $editUser->servicio->id eq $sub->id} selected="selected" {/if}>{$sub->nombre} </option>
					                    {/foreach}
					                {/if}
				                </select>
				                <label for="servicio" class="control-label">Seleccioná el servicio</label>
							</div>

							<!--div class="form-group  form-md-line-input">
				                <select class="form-control" required="required" name="coiffeur" id="coiffeur">
					                <option value=""></option>
					                {if $coiffeurs}
					                	{foreach $coiffeurs as $sub}
					                    	<option value="{$sub->id}" {if $editUser->coiffeur->id eq $sub->id} selected="selected" {/if}>{$sub->nombre} </option>
					                    {/foreach}
					                {/if}
				                </select>
				                <label for="coiffeur" class="control-label">Seleccioná el coiffeur</label>
							</div-->
							{if $editUser}
								<div class="form-group form-md-line-input">
					                <select class="form-control" required="required" name="estado" id="estado">
						                <option value=""></option>
						                {if $estados}
						                	{foreach $estados as $sub}
						                    	<option value="{$sub->id}" {if $editUser->estadoTurno->id eq $sub->id} selected="selected" {/if}>{$sub->nombre} </option>
						                    {/foreach}
						                {/if}

					                </select>
					                <label for="estado" class="control-label">Estado del turno</label>
								</div>
							{/if}
							<!--{if $editUser->fecha_hora}-->

							<!--{/if}-->


							<div class="form-group form-md-line-input">
								<label class="control-label">Fecha del Turno</label>
									<div class="input-group date" >
									    <input type="text change_calendar" class="form-control" id="Adatepicker">
									    <div class="input-group-addon">
									        <span class="glyphicon glyphicon-th"></span>
									    </div>
									</div>
							</div>
							<!--div class="form-group">
                                <div id="Adatepicker" class="date-picker"></div>
                            </div-->

							<!--<div class="form-group">
	                            <label class="control-label col-md-3">Activo</label>
	                            <div class="col-md-9">
									<div class="checkbox-list">
	                                	<label><input name="activo" type="checkbox" value="1" {if $editUser->activo eq true}checked="checked"{/if} /></label>
									</div>
	                            </div>
	                        </div-->

						</div>
						<!--div class="form-actions">
                            <button type="submit" class="btn green btn-lg">Guardar</button>
                            <a href="{site_url()}admin/turnos" class="btn btn-link btn-lg pull-right">Cancelar</a>
						</div-->
					<!-- END FORM-->
				</div>
		</div>
	</div>
		<div class="col-md-9">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Rango de horas</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
			 <div class="form-group" >
				 <!--OCULTAR CUANDO CORRESPONDA -->
				 <div class="alert alert-danger" id="ocultar_coiffeur" role="alert">Seleccioná el coiffeur</div>
                    <div class="list-group" id="listado_horario">
					</div>
				</div>
				</div>
			</div>
		</div>
		</form>

	</div>









{include file='admin/turnos/item-horario-add.tpl'}
{/block}
