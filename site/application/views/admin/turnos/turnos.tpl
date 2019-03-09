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
	
	
	
	
	<script type="text/javascript" src="{site_url()}assets/common/plugins/momento.js"></script>
	
	 <script type="text/javascript" src="{site_url()}assets/common/plugins/fullcalendarfull/fullcalendar.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/schu.min.js"></script>
<script type="text/javascript" src="{site_url()}assets/common/plugins/jsrender.js"></script>
	<script type="text/javascript" src="{site_url()}assets/admin/js/turnosNew.js?version=20180628"></script>
	<script type="text/javascript">
    	$(function(){
			TurnosNew.initForm();
			$('#cliente').select2();
			$('#servicio').select2();
			//TurnosNew.initFotoForm();
			$('#ocultar_coiffeur').show();
		});
 $(function() {
 var todayDate = moment().startOf('day');

 
 
  var TODAY = todayDate.format('YYYY-MM-DD');
 
     
    $('#calendar').fullCalendar({
	
	
           
     defaultView: 'agendaDay',

      groupByResource: true,
	  editable: true,
         selectable: true,
		 language: 'es',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNameShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
buttonText: {
today: 'hoy',
month: 'mes',
week: 'semana',
day: 'dia'

},
allDay : false ,
	
	 {$id = 1}
      resources: [
	    {foreach $aCoiffeurs as $co name=obj}
	 		
       		 	{ id: {$co->id}, title: "{$co->nombre}" },
			 {$id= $id +1}
       {/foreach}  
      ],
	   minTime: '09:00:00',
    maxTime: '20:00:00',
    slotDuration: '00:15:00',
    slotLabelInterval: 15,
    slotLabelFormat: 'h(:mm)a',
    slotMinutes: 15,
	 eventLimit: true,
	
  
	// events: "index.php?view=1",  // request to load current events
	
	
	events: 'getTurnosOcupadosNew',
	
	//alert(eventos);
	/*
		events: [
		
				{
					resourceId: 8,
					title: 'Test',
					start: '2018-11-16 16:00:00',
					end: '2018-11-16 17:00:00',
					color: 'green',
					allDay : false ,
					
				},
	{foreach $eventos['coiffeurs'] as $ev}
	
				{
					resourceId: 8,
					title: 'Test',
					start: '2018-11-16 13:00:00',
					end: '2018-11-16 14:00:00',
					color: 'green',
					allDay : false ,
					
				},
		
		
			
			
	
		
	
	
		{/foreach}
			], 
	
	 */
	 eventClick:  function(event, jsEvent, view) {  // when some one click on any event
              // alert(event.resourceId);
				endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },
			
	 select: function(start, end, jsEvent) {  // click on empty time slot
              //console.log(resources.id);
				//alert(resourceId);
				//console.log(jsEvent);
				endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
				fecha = $.fullCalendar.moment(start).format('Y-M-D');
                var mywhen = starttime + ' hasta ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
				 $('#createEventModal #fecha').val(fecha);
				  //$('#createEventModal #estilista').val(id);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
           },
           eventDrop: function(event, delta){ // event drag and drop
               $.ajax({
                   url: 'index.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   //alert(json);
                   }
               });
           },
		   
		 eventResize: function(event) {  // resize to increase or decrease time of event
               $.ajax({
                   url: 'index.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                       //alert(json);
                   }
               });
           }   
		   		
     
    });

  });



$(document).ready(function(){
                      
       $('#submitButton').on('click', function(e){ // add event submit
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit(); // send to form submit function
       });
       
       $('#deleteButton').on('click', function(e){ // delete event clicked
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete(); //send data to delete function
       });
       
       function doDelete(){  // delete event 
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: 'index.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   else
                        return false;
                    
                   
               }
           });
       }
       function doSubmit(){ // add event
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
		   
		    var servicio_id = $('#servicio').val();
			var cliente_id = $('#cliente').val();
			var coiffeur_id = 8;
			//var fecha = $('#fecha').val();
			var turno_id = $('#turno_id').val();
			var nombreturno = $('#nombreturno').val();
			var telefonoturno = $('#telefonoturno').val();
			var email = $('#emailturno').val();
		  
		 // alert(cliente_id);
		  if (cliente_id == ''){
		  	if (nombreturno == ''){
			 alert("Debe seleccionar un cliente o Generar un cliente nuevo");
			 return false;
			}
		  }
		  
		   WebDialogs.doLoading({
					message: 'Aguarde...',
					title: 'Estamos guardando el turno'

				});
           
           $.ajax({
               url: __SITEURL+'admin/turnos/saveNew',
               data:{
				servicio: servicio_id,
				coiffeur: coiffeur_id,
				cliente: cliente_id,
				desde: startTime,
				hasta: endTime,
				fecha: fecha,
				//turno_id: turno_id,
				nombreturno: nombreturno,
				telefonoturno: telefonoturno,
				email: email
			},
              type: 'post',
			  dataType: 'json',
			  
			  success: function (json){
       			WebDialogs.doCloseLoading();
				if (json.status == true){
					WebDialogs.doAlert({
						message: json.message,
						title: json.title,
						onConfirm: function(){
							window.location.href = __SITEURL+'admin/turnos/turnos';
						}
					});

				} else {
					WebDialogs.doAlertError({
						message: json.message,
						title: json.title,
						onConfirm: function(){
							$(form).find('fieldset').attr('disabled',false);
						}
					});
				}

			}
			/*
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                   },
                   true);
               }
			   */
           });
           
       }
    });

    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-datepicker/css/datepicker.css"/>
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/fullcalendarfull/fullcalendar.css"/>
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

	
{/block}

{block name='content'}
    <div class="portlet-title">
       <div class="table-toolbar">
		        <div class="row">
		            <div class="col-sm-6">
	                    <a class="btn green" href="{site_url()}admin/clientes/add"> <i class="icon-plus"></i> Agregar Cliente</a>
		            </div>
		            <div class="col-sm-6 hidden-xs text-right">
					{if $aCategorias}
		            	<ul class="list-unstyled list-inline list-estados">
	                    	
							{foreach $aCategorias as $cat}
							<li><span class="label" style={if $cat->color eq violeta}"background:violet"{/if}{if $cat->color eq negro}"background:black"{/if}{if $cat->color eq blanco}"background:white"{/if}{if $cat->color eq rojo}"background:red"{/if}{if $cat->color eq amarillo}"background:yellow"{/if}{if $cat->color eq azul}"background:blue"{/if}{if $cat->color eq verde}"background:green"{else}"background:green"{/if}"> {$cat->nombre}</span></li>
	                    	{/foreach}	
	                    </ul>
					{/if}	
		            </div>
		        </div>
	    </div>
    </div>

    <div class="dahsboard">
    	<div class='page-content__container container'>
      <div class='sidebar-layout' style='padding-top:1em'>
        <div class='sidebar-layout__main' style='font-size:14px'>
          <div id='calendar'></div>
       
        </div>
       
      </div>
     
    </div>
    </div>

	{include file='admin/turnos/item-horario.tpl'}
	
	
	<!-- Modal  to Add Event -->
<div id="createEventModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Agregar Turno</h4>
 </div>
 <div class="modal-body">
 <div class="control-group">
 <form action="{site_url()}admin/turnos/saveNew" id="frmSaveTurnos" class="formulario" method="post">
 <input type="hidden" name="turno_id" value="{$editUser->id}" />
 <label class="control-label" for="inputPatient">Seleccione Cliente</label>
 
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
									<input type="text" class="form-control cliente_nuevo" placeholder="Escribe el nombre del nuevo cliente" value="{$editUser->nombre}" id="nombreturno" {if $editUser->nombre neq ''} disabled="disabled" {/if}/>
									<input type="text" class="form-control cliente_nuevo " placeholder="Escribe el teléfono del nuevo cliente" value="{$editUser->telefono}" id="telefonoturno" {if $editUser->telefono neq ''} disabled="disabled" {/if}/>
									<input type="text" class="form-control cliente_nuevo " placeholder="Escribe el email del nuevo cliente" value="{$editUser->email}" id="emailturno" {if $editUser->email neq ''} disabled="disabled" {/if}/>
									{if $accion eq 'add'}
									<a href="#" class="nocliente" id="nocliente" >Guardar</a>
									{/if}
								</div></div>	
	<label class="control-label" for="inputPatient">Seleccione Servicio</label>							
				<div class="field desc">
 <div class="form-group  form-md-line-input">
				                <select class="form-control change_calendar" required="required" name="servicio" id="servicio">
					                <option value=""></option>
					                {if $servicios}
					                	{foreach $servicios as $sub}
					                    	<option value="{$sub->id}" {if $editUser->servicio->id eq $sub->id} selected="selected" {/if}>{$sub->nombre} </option>
					                    {/foreach}
					                {/if}
				                </select>
								</div>				
								
							
							
 </div>
 </div>
 
 <input type="hidden" id="startTime"/>
 <input type="hidden" id="endTime"/>
 <input type="hidden" id="fecha"/>
	</form>
<div class="control-group">
 <label class="control-label" for="when">Cuando:</label>
 <div class="controls controls-row" id="when" style="margin-top:5px;">
 </div>
 </div>
 
 </div>
 <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button type="submit" class="btn btn-primary" id="submitButton">Guardar</button>
 </div>
 </div>

 </div>
</div>

<!-- Modal to Event Details -->
<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Detalle del Servicio</h4>
 </div>
 <div id="modalBody" class="modal-body">
 <h4 id="modalTitle" class="modal-title"></h4>
 <div id="modalWhen" style="margin-top:5px;"></div>
 </div>
 <input type="hidden" id="eventID"/>
 <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
 <button type="submit" class="btn btn-succes" id="editButton">Editar</button>
 <button type="submit" class="btn btn-danger" id="deleteButton">Eliminar</button>
 </div>
 </div>
</div>
</div>
<!--Modal-->

	
	

{/block}
