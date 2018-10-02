{extends file='mails/base.tpl'}
{block name='mailbody'}
<h3 style="margin: 0 0 30px; padding: 0;">¡Parece que olvidaste tu clave de Diego Dap's! :O</h3>

	<a href="{$verificar_link}" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0;">
       RECUPERALA YA MISMO
   	</a>

<p style="margin-top: 60px;">
	<small>Si el link no abre correctamente, prueba copiandolo y pegandolo en tu navegador. <br> <br>{$verificar_link}</small>

</p>
{/block}
