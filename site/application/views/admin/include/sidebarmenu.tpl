<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <li class="{if $menuactive eq 'Dashboard'}active{/if}">
        <a href="{site_url()}admin">
            <i class="icon-custom icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    {if $actualBackuser->perfil->id|in_array:array(1,2,3)}
	<li class="{if $menuactive eq 'turnos'}active{/if}">
        <a href="{site_url()}admin/turnos"> <i class="fa fa-calendar"></i> <span class="title">Turnos</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1,2,3)}
    <li class="{if $menuactive eq 'clientes'}active{/if}">
        <a href="{site_url()}admin/clientes"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Clientes</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'productos'}active{/if}">
        <a href="{site_url()}admin/productos"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> <span class="title">Productos</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1,2,3)}
    <li class="{if $menuactive eq 'notificaciones'}active{/if}">
        <a href="{site_url()}admin/admin/notificaciones"> <i class="fa fa-bell" aria-hidden="true"></i> <span class="title">Notificaciones</span></a>
    </li>
    {/if}
	
	{if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'categorias'}active{/if}">
        <a href="{site_url()}admin/categorias"> <i class="fa fa-scissors" aria-hidden="true"></i> <span class="title">Categorias</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'servicios'}active{/if}">
        <a href="{site_url()}admin/servicios"> <i class="fa fa-scissors" aria-hidden="true"></i> <span class="title">Servicios</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'coiffeurs'}active{/if}">
        <a href="{site_url()}admin/coiffeurs"> <i class="fa fa-user"></i> <span class="title">Coiffeurs</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'balance'}active{/if}">
        <a href="{site_url()}admin/balance"> <i class="fa fa-bar-chart" aria-hidden="true"></i> <span class="title">Balance</span></a>
    </li>
    {/if}
	
	{if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'caja'}active{/if}">
        <a href="{site_url()}admin/caja"> <i class="fa fa-bar-chart" aria-hidden="true"></i> <span class="title">Caja</span></a>
    </li>
    {/if}
	

    {if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'tickets'}active{/if}">
        <a href="{site_url()}admin/tickets"> <i class="fa fa-money" aria-hidden="true"></i> <span class="title">Tickets y Pagos</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'cobros'}active{/if}">
        <a href="{site_url()}admin/cobros"> <i class="fa fa-money"></i> <span class="title">Cobros</span></a>
    </li>
    {/if}
	{if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'deudores'}active{/if}">
        <a href="{site_url()}admin/deudores"> <i class="fa fa-money" aria-hidden="true"></i> <span class="title">Deudores</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'configuracion'}active{/if}">
        <a href="{site_url()}admin/configuracion"> <i class="fa fa-money"></i> <span class="title">Configuración</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'comentarios'}active{/if}">
        <a href="{site_url()}admin/comentarios"> <i class="fa fa-comments"></i> <span class="title">Comentarios</span></a>
    </li>
    {/if}
	
	{if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'comments'}active{/if}">
        <a href="{site_url()}admin/comments"> <i class="fa fa-comments"></i> <span class="title">Observaciones clientes</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'reportes'}active{/if}"> <a href="javascript:;"> <i class="icon-settings"></i> <span class="title">Reportes</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li class="{if $menuactive eq 'reportes' && $submenuactive eq 'turnos'}active{/if}"> 
            <a href="{site_url()}admin/reportes"> <i class="fa fa-calendar"></i> <span class="title">Turnos</span></a> 
          </li>
        </ul>
    </li>  
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'broadcast'}active{/if}">
        <a href="{site_url()}admin/broadcast"> <i class="fa fa-wifi"></i> <span class="title">Broadcast</span></a>
    </li>
    {/if}

    {if $actualBackuser->perfil->id|in_array:array(1)}
    <li class="{if $menuactive eq 'usuarios'}active{/if}">
        <a href="{site_url()}admin/usuarios"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Usuarios</span></a>
    </li>
    {/if}
	  {if $actualBackuser->perfil->id|in_array:array(1,2)}
    <li class="{if $menuactive eq 'tarjetas'}active{/if}">
        <a href="{site_url()}admin/tarjetas"> <i class="fa fa-money" aria-hidden="true"></i> <span class="title">Configurar Cuotas T/C</span></a>
    </li>
    {/if}

</ul>
