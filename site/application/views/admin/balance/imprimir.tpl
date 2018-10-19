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
 
    {assign var="totalFinal" value=0}
	{assign var="comisionFinal" value=0}
{foreach $aPeluquero as $aPel}
	{$aPel->nombre}<br />
	{assign var="total" value=0}
  	{assign var="comision" value=0}
  		{foreach $aBalance2 as $aBal}
		
			{if $aPel->id eq $aBal['id']}	
      			
		
				 {assign var="subt" value=$aBal['total'] - $aBal['descuento'] }
		 		 {$aBal['cantidad']} -  {$aBal['descripcion']} - ${$subt}<br />
		 		 {assign var="total" value=$total+$subt}
				 {assign var="comision" value=$comision+$aBal['comision']}
				 	
	  	    {/if}
		 		
  	{/foreach}
	<br />
	Total: ${$total|number_format:2:'.':','}<br />
	Comisión: ${$comision|number_format:2:'.':','}<br />
	 {assign var="comisionFinal" value=$comisionFinal+$comision}
	 {assign var="totalFinal" value=$totalFinal+$total}
	 ---
	<br /><br />
{/foreach}  
  
  <!--
  {assign var="total" value=0}
  {assign var="comision" value=0}
  {foreach $aBalance as $aBal}
  {$aBal['nombre']}<br />
  	  {assign var="subt" value=$aBal['total'] - $aBal['descuento'] }		
      Total: ${$subt|number_format:2:'.':','}<br />
      {assign var="total" value=$total+$subt}
      Comisión: ${$aBal['comision']|number_format:2:'.':','}<br />
      {assign var="comision" value=$comision+$aBal['comision']}
      <br />
  {/foreach}
  <br />
  ---
  -->
 DETALLE FINAL
  <br />
  TOTAL: ${$totalFinal|number_format:2:'.':','} <br />
   
   COMISION: ${$comisionFinal|number_format:2:'.':','} <br />
