{extends file='mails/base.tpl'}
{block name='mailbody'}
<h3 style="margin:0 auto; padding: 0 auto;">¡Hola {$usuario}! :)</h3>
<p><strong>Gracias por visitarnos.</strong></p>
<p>Para poder seguir mejorando, te pedimos que puntues el servicio que te dimos.</p>
<div style="margin-bottom:30px;"></div>
	<a href="{$verificar_link}" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0;">
    PUNTUAR EL SERVICIO: {$servicio}
  </a>
<p style="margin-top: 60px;">
	<small>Si el link no abre correctamente, prueba copiandolo y pegandolo en tu navegador. <br> <br>{$verificar_link}</small>
</p>
{/block}
