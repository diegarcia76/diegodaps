{extends file='mails/base.tpl'}
{block name='mailbody'}
<h3 style="margin:0 auto; padding: 0 auto;">¡Feliz cumpleaños {$usuario}! :)</h3>
   <p>Te regalamos un 20% de descuento en cualquier servicio para que salgas genial en las fotos.</p>
   <p><strong>¡Reservá ya tu turno!</strong></p>
   <div style="margin-bottom:30px;"></div>
   <a href="{site_url()}turnos/nuevo_turno" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0; height: 35px;">
       RESERVAR TURNO
   </a>
{/block}
