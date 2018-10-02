<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
		  <a class="navbar-brand" href="{site_url()}">
		      <img src="{site_url()}assets/images/isologo.png" alt="logo" width="120" height="auto">
		  </a>
		</div>
        <div id="navbar-top" class="top-nav navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
		        <li><a href="{site_url()}turnos/nuevo_turno" class="text-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 NUEVO TURNO</a></li>
		        <li><a href="{site_url()}turnos" class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> TUS TURNOS</a></li>
		        <li><a href="{site_url()}profile/historial" class="text-primary"><i class="fa fa-user" aria-hidden="true"></i> TU HISTORIAL</a></li>
		        <li class="dropdown notificacion new">
		        	<!-- SI HAY NOTIFICACIONES NUEVAS SE AGREGA LA CLASE NEW -->
		        	<a href="#" id="bt_notificacion" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"></i></a>

		        	<span class="button_badge hidden"></span>

		        	 <ul class="dropdown-menu" id="dropdownMenu">

		        	 </ul>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		        		<img src="{ImagenManager::getInstance()->getUrl($usuarioActual->foto,'')}" width="30" height="30" class="img-circle" alt="Imagen de perfil"/>
						<!--img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="Imagen de perfil" width="30" height="30" class="img-circle"-->
				     </a>
				     <ul class="dropdown-menu">
					     <li><a href="{site_url()}profile">Mi perfil</a></li>
					     <li><a href="{site_url()}registro/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
				     </ul>
			    </li>
		    </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
