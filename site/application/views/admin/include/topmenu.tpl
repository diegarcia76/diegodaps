<div class="page-logo">
                        <a href="{site_url()}admin">
	                        <img src="{site_url()}assets/images/logo.png" alt="logo" class="logo-default" style="margin-top:10px;" width="100">
 						</a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right hidden-xs">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="#" id="bt_notificacion" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-bell"></i>
                                        <span class="badge badge-default hidden">  </span>
                                </a>

                                <ul class="dropdown-menu" id="dropdownMenu">


                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->


                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<img src="{ImagenManager::getInstance()->getUrl($federacionActual->imagen_id,'55x55')}" class="img-circle">
                                    <span class="username username-hide-on-mobile"> ¡Hola {$actualBackuser->nombre|capitalize}!  </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                   <li>
                                       <a href="{site_url()}admin/perfil"> <i class="icon-user"></i> Mi Perfil</a>
                                    </li>
                                    <li>
                                        <a href="{site_url()}admin/login/logout">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--<li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li-->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->






<div id="Navmenu" class="offcanvas navmenu-fixed-right">
  <div class="button-collapse default-bg cerrar" id="cerrar-nav"  data-toggle="offcanvas" data-target="#Navmenu" data-canvas="body"> <i class="fa fa-chevron-circle-right"></i> </div>
  <ul class="nav">
    <li>
    <a href="{site_url()}admin/usuarios/perfil"> <i class="icon-user"></i> Mi Perfil</a>
    </li>
    <li class="divider"> </li>
    <li>
    <a href="{site_url()}admin/logout"> <i class="icon-key"></i> Salir</a>
    </li>
  </ul>
</div>
