{extends file='base/base.tpl'}

{block name='custom_js'}
	<script src="{site_url()}assets/common/plugins/calendarPicker/test/jquery.mousewheel.js"></script>
	<script src="{site_url()}assets/common/plugins/jsrender.js"></script>
	<script src="{site_url()}assets/common/plugins/calendarPicker/jquery.calendarPicker.js"></script>

	<script src="{site_url()}assets/js/turnosAdd.js"></script>
{/block}

{block name='custom_css'}

<link rel="stylesheet" href="{site_url()}assets/common/plugins/calendarPicker/jquery.calendarPicker.css">

<style type="text/css">

    .anterior { background-color: #CCCCCC; }

</style>

{/block}
{block name='steper'}
<input type="hidden" id="servicio_id">
<input type="hidden" id="turno_id" value="{$aTurno->id}">
<input type="hidden" id="coiffeur_id">
<input type="hidden" id="fecha_turno">
{if $canje}
	<input type="hidden" id="puntos_servicio">
{/if}
	<div class="steper">
		<div class="step-container">
			<div class="step-count active" id="step-count-1">
				<div class="number">1</div>
				<div class="text">SERVICIO</div>
			</div>
			<div class="separator count-2">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
			<div class="step-count count-2" id="step-count-2">
				<div class="number">2</div>
				<div class="text">COIFFEUR</div>
			</div>
			<div class="separator count-3">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
			<div class="step-count count-3" id="step-count-3">
				<div class="number">3</div>
				<div class="text">TURNO</div>
			</div>
			<div class="separator count-4">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
			<div class="step-count count-4" id="step-count-4">
				<div class="number">4</div>
				<div class="text">CONFIRMAR</div>
			</div>
			<div class="clearfix"></div>
		</div>
    </div>
{/block}

{block name='content'}
	{include file='turnos/form-step-1.tpl'}
	{include file='turnos/form-step-2.tpl'}
	{include file='turnos/form-step-3.tpl'}
	{include file='turnos/form-step-4.tpl'}
	{include file='turnos/item-coifffeur.tpl'}
{/block}