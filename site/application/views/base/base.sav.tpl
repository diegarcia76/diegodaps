<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>TITULO</title>

    {if $page_nocache eq true}
    <meta http-equiv="Cache-Control" content="no-cache"/>
    {/if}

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Latest compiled and minified CSS -->
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,900,200,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type='text/css' href="{assets_url('css/animate.css')}">
    {if $federacionActual->favicon}
    <link rel='shortcut icon' type='image/x-icon' href='{ImagenManager::getInstance()->getUrl($federacionActual->favicon,'full')}' />
    {else}
    <link rel='shortcut icon' type='image/x-icon' href='{assets_url('img/fav-icon.png')}' />
	{/if}
	
	{block name='custom_css'}

	{/block}

    {include file='include/custom-css.tpl'}
	
</head>
<body class="{block name='body_classes'}{/block} {if $usuarioActual}islogged{/if}">
	<div id="header-container" class="padding-top-30">
	    {include file='include/top-header.tpl'}
    	{block name='header-container'}{/block}
	</div>    
	<div id="main-container">
	    {block name='content'}{/block}
    	{include file='include/bottom-footer.tpl'}
	    {include file="include/post-bottom-footer.tpl"}
		{include file='include/js.tpl'}
		{include file='include/dialogs.tpl'}
    </div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <!-- Plugins -->
    <script type="text/javascript" src="{site_url()}assets/common/plugins/dialogs.js"></script>
	<script src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.js" type="text/javascript"></script>
	<script type="text/javascript" src="{assets_url('js/login.js')}"></script>
	<script src="{site_url()}assets/common/plugins/jquery.form.js" type="text/javascript"></script>
	<script src="{assets_url('js/custom.js')}" type="text/javascript"></script>


    {include file="include/js.tpl"}
    
	{block name='custom_js'}{/block}
    
	<script>
	jQuery(document).ready(function() {    
		//App.init(); // init metronic core components
		Login.init(); // init current layout
		{block name='custom_init'}{/block}
	});
</script>

</body>
</html>