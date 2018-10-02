{extends file='mails/base.tpl'}
{block name='mailbody'}
<h3 style="margin:0 auto; padding: 0 auto;">¡Hola {$usuario}! :)</h3>
   <p>No te olvides que tenés un turno {$cuando} a las {$fecha_hora} hs en nuestro salón.</p>
   <p><strong>En el caso de no poder asistir recordá cancelar el turno.</strong></p>
   <div style="margin-bottom:30px;"></div>
   <a href="{site_url()}turnos" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0; height: 35px;">
       VER MIS TURNOS
   </a>
{/block}
