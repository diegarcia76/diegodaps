<div id="sidebar" class="hidden-md col-lg-3 p-t-1 text-center">
    {*******
    <!--
    	Comentario, al div conclase group se le agregó el position relative para que el lapiz se ubique en función de este contenedor
        mediante el position absolute, me pareció bueno dejar en el perfil la opción de nuevo turno y mis puntos.
        Posiblemente tenemos que re-acomodarlo.
    -->
    *}
    <div class="group" style="position: relative;">
        <div class="perfil">
	        <div class="image">
	            <div class="bg-cover" name="imageThumb" id="imageThumb" style="background-image: url({ImagenManager::getInstance()->getUrl($usuarioActual->foto,'')})">

	            </div>
	        </div>
        </div>
		{if $editionInSidebar eq true}
            <form method="post" action="{site_url()}profile/guardar_imagen" enctype="multipart/form-data" id="frmSaveImagenPerfil">
                <input type="hidden" name="user_id" value="{$usuarioActual->id}">
                <input type="file" id="upload" name="upload" style="visibility: hidden; width: 1px; height: 1px"/>
                <a href="#" onclick="document.getElementById('upload').click(); return false" class="btn-circle btn bg-primary edit-image">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </form>
        {else}
        <h4 class="m-b-0">¡Hola {$usuarioActual->nombre}!</h4>
        <p class="p-b-0 m-b-0">¿Qué te gustaría hacerte hoy?</p>
        {/if}
    </div>
    <div class="group">
        <h6 class="text-primary">PUNTOS ACUMULADOS</h6>

        <div class="lead text-primary points">
            <strong>{if $usuarioActual->puntos_acumulados>0}{$usuarioActual->puntos_acumulados}{else}0{/if}</strong>
        </div>{if $usuarioActual->puntos_acumulados>0}<a href="{site_url()}turnos/nuevo_turno/true" class="btn btn-primary btn-sm m-t-0">CANJEALOS</a>{/if}
    </div>
    <div class="group">
    	<a href="{site_url()}turnos/nuevo_turno" class="btn btn-warning">+ NUEVO TURNO</a>
    </div>
</div>
