{extends file='base/base.tpl'}

{block name='custom_css'}
<style type="text/css">

    div.test { display:none }

</style>
{/block}

{block name='custom_js'}

    <script src="{site_url()}assets/js/historial.js"></script>

    <script type="text/javascript">
        $(function(){
            Historial.initNoti();
        });
    </script>

{/block}
{block name='custom_init'}
{/block}

{block name='header-container'}
{/block}

{block name='content'}
<div id="content" class="col-md-12 col-lg-9">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 row-title">
            <h2 class="pull-left"><small><strong>Notificaciones</strong></small></h2>
        </div>
    </div>
        <div class="panel panel-default ">
            <div class="notificaciones table">
                {foreach $notificacionesTodas as $noti name=foo}
        	            <div class="tr {if $smarty.foreach.foo.first} first {/if} pst">
        	                <div class="td uppercase w-100"><strong>{$noti->titulo}:</strong> {$noti->descripcion} <br>
        		                <span class="small txt-primary"><i class="fa fa-clock-o" aria-hidden="true"></i> {$noti->fecha|date_format:'Y-m-d H:i:s'|relative_date}</span>
        	                </div>
        	            </div>
                {/foreach}
            </div>
        </div>
        <a href="#" class="btn btn-sm btn-default align-center message">
                         
                    </a>
</div>
{/block}