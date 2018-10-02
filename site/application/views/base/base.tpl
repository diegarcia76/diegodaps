<!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Diego Dap's</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {if $page_nocache eq true}
        <meta http-equiv="Cache-Control" content="no-cache"/>
        {/if}

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="{site_url()}assets/stylesheets/bootstrap.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href="{site_url()}home/cssEstados.css" rel="stylesheet" type="text/css"/>

        <style>
            body {
                padding-top: 68px;
                padding-bottom: 20px;
            }
            .modal-dialog{
                z-index: 1041;
            }
        </style>

        {literal}        
        <!-- Facebook Pixel Code -->
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '344165956080294');
          fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=344165956080294&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
        {/literal}        


        {block name='custom_css'}{/block}

    </head>
    <body {block name='body_classes'}{/block}>


        <!--[if lt IE 8]>
            <p class="browserupgrade">Tu explorador está <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualizalo</a> para ver todas las funcionalidades del sitio.</p>
        <![endif]-->

		<!--<div class="app">
			<img src="{site_url()}assets/images/splash.jpg" width="90%" height="auto">
			<div class="m-t-1 m-l-2 m-r-2">
				<div class="col-xs-6 text-center">
					<img src="{site_url()}assets/images/app-store.png" alt="app-store" style="margin:0 auto;" width="150" height="auto">
				</div>
				<div class="col-xs-6 text-center">
					<img src="{site_url()}assets/images/googleplay.png" alt="googleplay" style="margin:0 auto;" width="150" height="auto">
				</div>
			</div>
		</div>-->


		{if $usuarioActual}
       		 {include file='include/top-header.tpl'}
	   	{/if}
        {block name='steper'}{/block}

        <section id="{$mainSecctionId|default:'main'}">
            <div class="container">
            	{if $hideSidebar neq true}
                	{include file='include/sidebar.tpl'}
                {/if}
                {block name='content'}{/block}
            </div>
        </section>




        <!-- Modal -->
        <div class="modal fade" id="cancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Cancelar</h4>
              ¿Estás seguro que querés cancelar?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm cancelar pull-left" data-dismiss="modal">Cerrar</button>

                <button type="button" class="btn btn-danger cancelar" data-dismiss="modal">Si, quiero cancelar</button>
              </div>
            </div>
          </div>
        </div>

        {include file='include/js.tpl'}
        {include file='include/dialogs.tpl'}

        {include file='include/bottom-footer.tpl'}


        <script src="{site_url()}assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{site_url()}assets/js/vendor/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/830a1bbed5.js"></script>

        <!-- Plugins -->
        <script type="text/javascript" src="{site_url()}assets/common/plugins/dialogs.js"></script>
        <script src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.js" type="text/javascript"></script>

        <script type="text/javascript" src="{assets_url('js/login.js')}"></script>
        <script src="{site_url()}assets/common/plugins/jquery.form.js" type="text/javascript"></script>

		<script src="{site_url()}assets/js/plugins.js"></script>

        {block name='custom_js'}{/block}
        <script>
            jQuery(document).ready(function() {
                //App.init(); // init metronic core components
                Login.init(); // init current layout
                {block name='custom_init'}{/block}
            });
        </script>

        {literal}
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-88963860-1','auto');ga('send','pageview');
        </script>
        {/literal}

    </body>
</html>
