{extends file='base/base.tpl'}
{block name='steper'}
{/block}

{block name='content'}
			<div class="col-md-3 p-t-2" id="sidebar">
				<div class="panel panel-default">
					<div class="list-group">
					  <div class="list-group-item">
					  	<i class="fa fa-calendar" aria-hidden="true"></i> {$aTurno->fecha_hora|date_format:"%e de %B de %Y"}
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-clock-o" aria-hidden="true"></i> {$aTurno->fecha_hora|date_format:"%k:%M"}
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-scissors" aria-hidden="true"></i> {$aTurno->servicio->nombre}
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-user" aria-hidden="true"></i> {$aTurno->coiffeur->nombre}
					  </div>
					 {*
					  <div class="list-group-item">
						<i class="fa fa-commenting-o" aria-hidden="true"></i> Corte completo, retoque de puntas
					  </div>
					  <div class="list-group-item">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i> Shampoo Wella
					  </div>
					  *}
					</div>
				</div>
				<a href="{site_url()}profile/historial" class="btn btn-sm btn-primary">
					<i class="fa fa-arrow-left" aria-hidden="true"></i> volver
				</a>
			</div>
			<div class="col-md-9 p-t-2" id="content">

				<div id="historial-carousel">
					<div class="wrap">
						<div id="fotos-slide" class="slider">
							<ul class="row">
					            {if count($aTurno->fotos) gt 0}
									{foreach $aTurno->fotos as $foto name=foo}
					                <li>
					                    <img src="{ImagenManager::getInstance()->getUrl($foto,'full')}" height="400" width="auto" alt=".." />
					                </li>
					             {/foreach}
								{else}
									<li>
										<img src="{site_url()}assets/images/default-historial.jpg" alt="..." class="img-responsive">
								    </li>
								{/if}
				        	</ul>
				    	</div>
				    	<div class="controls">
							<a href="#" class="prev-slide">
								<div class="control left"></div>
							</a>
							<a href="#" class="next-slide">
								<div class="control right"></div>
							</a>
						</div>
					</div>
				</div>



			</div>
{/block}

{block name='custom_js'}
	<script src="{site_url()}assets/js/vendor/lemmon-slider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#fotos-slide').lemmonSlider();
		});
	</script>
{/block}
