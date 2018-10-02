{extends file='base/base.tpl'}

{block name='custom_js'}

	<script src="{site_url()}assets/common/plugins/jquery-template-master/dist/jquery.loadTemplate.min.js"></script>  

{/block}

{block name='content'}


			<div id="step-1" class="step active">
				<div class="col-md-12 title text-center p-t-2">
					<h3 class="m-t-0 p-t-0">Editar el turno</h3>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default" id="confirmacion">
						<div class="list-group">
						  <button class="list-group-item nexterday" id="day">
						  	<i class="fa fa-calendar" aria-hidden="true"></i> {$aTurno->fecha_hora|date_format:"%e de %B de %Y"}
						  </button>
						  <button class="list-group-item nexterday" id="hour">
							<i class="fa fa-clock-o" aria-hidden="true"></i> {$aTurno->fecha_hora|date_format:"%k:%M"}						  	
						  </button>
						  <button class="list-group-item nexterservice" id="service">
							<i class="fa fa-scissors" aria-hidden="true"></i> {$aTurno->servicio->nombre}
						  </button>
						  <button class="list-group-item nextercoiffeur" id="coiffeur">
							<i class="fa fa-user" aria-hidden="true"></i> {$aTurno->coiffeur->nombre}
						  </button>
						</div>
					</div>
					<a href="{site_url()}turnos/editar_turno_paso_2/{$aTurno->id}" class="btn btn-success nexter m-0-a align-center">
						editar
					</a>
				</div>
			</div>

<!--
			<div id="step-2" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">EDITAR TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el servicio</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="list-group">
						  	{foreach $servicios as $serv}
							  <button class="list-group-item nexter" data-id-servicio="{$serv->id}" data-id-turno="{$aTurno->id}">
							  	{$serv->nombre}
							  	<div class="pull-right m-l-1">
							  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
							  	</div>
							  	<div class="pull-right">
								  	<i class="fa fa-clock-o" aria-hidden="true"></i> {$serv->duracion} min
							  	</div>
							  </button>
							{/foreach}
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div>

			<div id="step-3" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">EDITAR TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el coiffeur</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="list-group">
						  <button class="list-group-item nexter">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>
						  <button class="list-group-item nexter">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>
						  <button class="list-group-item nexter">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>
						  <button class="list-group-item nexter disabled" disabled="disabled">
						  	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="50" height="50" class="img-circle pull-left">
						  	<div class="pull-left m-l-1 name">
						  		Diego Dap's
						  	</div>
						  	<div class="pull-right m-l-1 arrow">
						  		<i class="fa fa-chevron-right" aria-hidden="true"></i>
						  	</div>
						  </button>

						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div>

			<div id="step-4" class="step">
				<div class="col-md-12 title text-center">
					<h6 class="text-primary">NUEVO TURNO</h6>
					<h3 class="m-t-0 p-t-0">Elegí el turno</h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<ul class="nav nav-tabs text-center">
						  <li role="presentation" class="active"><a href="#now" aria-controls="now" role="tab" data-toggle="tab">HOY</a></li>
						  <li role="presentation" class=""><a href="#tomorrow" aria-controls="tomorrow" role="tab" data-toggle="tab">MAÃ‘ANA</a></li>
						  <li role="presentation" class=""><a href="#other" aria-controls="other" role="tab" data-toggle="tab">OTRO DIA</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="now">
								<div class="list-group">
								  <div class="list-group-item p-t-1">
									<div class="line"></div>
								  	<span class="m-r-1 hour">9 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">10 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">11 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">12 AM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">1 PM</span>
								  	<button class="btn btn-sm label-danger btn-danger nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:30</button>
								  </div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="tomorrow">
								<div class="list-group">
								  <div class="list-group-item p-t-1">
									<div class="line"></div>
								  	<span class="m-r-1 hour">9 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">10 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">11 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">12 AM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">1 PM</span>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:00</button>
								  	<button class="btn btn-sm label-success btn-success nexter"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:30</button>
								  </div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="other">



								<div class="list-group">
								  <div class="list-group-item">
									  <div id="carousel-month" class="carousel slide" data-ride="carousel" data-interval="false">
										   <div class="carousel-inner" role="listbox">
											    <div class="item active">ENERO</div>
											    <div class="item">FEBRERO</div>
											    <div class="item">MARZO</div>
											    <div class="item">ABRIL</div>
											</div>
											<a class="left control" href="#carousel-month" role="button" data-slide="prev">
										    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="right control" href="#carousel-month" role="button" data-slide="next">
										    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
									  </div>
								  </div>
								  <div class="list-group-item" id="list-day">
									  <div id="carousel-day" class="carousel slide" data-ride="carousel" data-interval="false">
										   <div class="carousel-inner" role="listbox">
											    <div class="item active">
												    <button class="btn btn-default btn-circle">1</button>
												    <button class="btn btn-default btn-circle">2</button>
												    <button class="btn btn-default btn-circle">3</button>
												    <button class="btn btn-default btn-circle">4</button>
												    <button class="btn btn-default btn-circle">5</button>
												     <button class="btn btn-default btn-circle">6</button>
												    <button class="btn btn-default btn-circle">7</button>
												    <button class="btn btn-default btn-circle">8</button>
												    <button class="btn btn-default btn-circle">9</button>
												    <button class="btn btn-default btn-circle">10</button>
											    </div>
											    <div class="item">
												    <button class="btn btn-default btn-circle">11</button>
												    <button class="btn btn-default btn-circle">12</button>
												    <button class="btn btn-default btn-circle">13</button>
												    <button class="btn btn-default btn-circle">14</button>
												    <button class="btn btn-default btn-circle">15</button>
												    <button class="btn btn-default btn-circle">16</button>
												    <button class="btn btn-default btn-circle">17</button>
												    <button class="btn btn-default btn-circle">18</button>
												    <button class="btn btn-default btn-circle">19</button>
												    <button class="btn btn-default btn-circle">20</button>
											    </div>
											    <div class="item">
												    <button class="btn btn-default btn-circle">21</button>
												    <button class="btn btn-default btn-circle">22</button>
												    <button class="btn btn-default btn-circle">23</button>
												    <button class="btn btn-default btn-circle">24</button>
												    <button class="btn btn-default btn-circle">25</button>
												    <button class="btn btn-default btn-circle">26</button>
												    <button class="btn btn-default btn-circle">27</button>
												    <button class="btn btn-default btn-circle">28</button>
												    <button class="btn btn-default btn-circle">29</button>
												    <button class="btn btn-default btn-circle">30</button>
												</div>
											</div>
											<a class="left control" href="#carousel-day" role="button" data-slide="prev">
										    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="right control" href="#carousel-day" role="button" data-slide="next">
										    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
									  </div>
								  </div>

								  <div class="list-group-item p-t-1">
									<div class="line"></div>
								  	<span class="m-r-1 hour">9 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  9:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">10 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  10:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">11 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  11:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">12 AM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  12:30</button>
								  </div>
								  <div class="list-group-item">
									<div class="line"></div>
								  	<span class="m-r-1 hour">1 PM</span>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:00</button>
								  	<button class="btn btn-sm label-success btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i>  1:30</button>
								  </div>
								</div>

							</div>
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-primary prever">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
					</a>
				</div>
			</div>
-->
{/block}