{extends file='base/base.tpl'}

{block name='custom_css'}
{/block}

{block name='custom_js'}

    <!--script type="text/javascript" src="{assets_url('js/login.js')}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
          Login.init();
        });

    </script-->

{/block}

{block name='custom_init'}
{/block}

{block name='body_classes'}class="login"{/block}

{block name='header-container'}
{/block}

{block name='content'}
	<a class="float-btn btn-success btn" href="{site_url()}registro">CREAR UNA CUENTA</a>
    <div class="row">
	   <div class="col-md-12">
		   <div class="logo text-center" style="margin-bottom: -65px; z-index: 1; position: relative;">
				 <a href="{site_url()}"><img src="{site_url()}assets/images/isologo_4.svg" width="230" height="auto"/></a>
		   </div>
	   </div>

	    <div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default p-t-3" style="border: 4px solid #be9e54;">
				{include file='include/login-box.tpl'}
			</div>
	    </div>
    </div>




{/block}
