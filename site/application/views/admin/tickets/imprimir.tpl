{block name='custom_js'}
<script type="text/javascript">
window.onload = function(){
  //window.setTimeout(history.back(), 100);
  window.print();
  window.close();
};
</script>

{/block}
  DIEGO DAP'S<br />
  Estilista unisex & barbería <br /><br />
  San Luis 2608 - 491-7396<br />
  ---
  <br />
  {$aPago->fecha->format('d/m/Y')}
  <br />
  # {$aPago->nroFormateado}
  <br />
  Cliente: {if $aPago->cliente}{$aPago->cliente->nombre}{else}{$aPago->nombre}{/if}
  <br />
  ---
  <br />
  <br />
  DETALLE
  <br />
  {assign var="total" value=0}
  {foreach $aPago->detallePago as $aDetalle}
  {$aDetalle->cantidad} {$aDetalle->descripcion} - {$aDetalle->coiffeur->nombre} -
    ${($aDetalle->precio*$aDetalle->cantidad)|number_format:2:'.':','}
    {assign var="total" value=$total+($aDetalle->precio*$aDetalle->cantidad)}
      <br />
  {/foreach}
  <br />
  ---
  <br />
  <br />
  TOTAL: ${$total|number_format:2:'.':','}
