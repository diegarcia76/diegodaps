{extends file='mails/base.tpl'}
{block name='mailbody'}
<h3 style="margin:0 auto; padding: 0 auto;">¡Gracias por Registrarte en Diego Dap's! :)</h3>
   <p>Nos queda solo un paso para que puedas usar nuestro sistema</p>
   <div style="margin-bottom:30px;"></div>
   <a href="{$verificar_link}" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0; height: 35px;">
       VERIFICA TU EMAIL
   </a>
   <p style="margin-top: 60px;">
	   <small>Si el link no abre correctamente, probá copiándolo y pegandolo en tu navegador.
	   {$verificar_link}
	   </small>
   </p>

{/block}