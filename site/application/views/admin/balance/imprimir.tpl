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
  Cierre de Caja
  <br />
  Del {$fechas_start} al {$fechas_end}
  <br />
  ---
  <br />
  <br />
  DETALLE
  <br />
  {assign var="total" value=0}
  {assign var="comision" value=0}
  {foreach $aBalance as $aBal}
  {$aBal['nombre']}<br />
      Total: ${$aBal['total']|number_format:2:'.':','}<br />
      {assign var="total" value=$total+$aBal['total']}
      Comisión: ${$aBal['comision']|number_format:2:'.':','}<br />
      {assign var="comision" value=$comision+$aBal['comision']}
      <br />
  {/foreach}
  <br />
  ---
  <br />
  <br />
  TOTAL: ${$total|number_format:2:'.':','}
  <br />
  COMISIÃ“N: ${$comision|number_format:2:'.':','}
