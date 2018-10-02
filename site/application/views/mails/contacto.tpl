{extends file='mails/base.tpl'}
{block name='mailbody'}
<p style="padding:20px; font-size:24px; color:#00919e;">Contacto desde la web</p>
<p style="font-size:14px; line-height:1.5;"><b>Nombre:</b> {$name}</p>
<p style="font-size:14px; line-height:1.5;"><b>Email:</b> {$email}</p>
<p style="font-size:14px; line-height:1.5;"><b>Asunto:</b> {$asunto}</p>
<p style="font-size:14px; line-height:1.5;"><b>Mensaje:</b> {$mensaje}</p>

{/block}