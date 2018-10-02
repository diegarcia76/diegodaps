{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}

{block name='custom_css'}


{/block}

{block name='custom_js'}

	<script type="text/javascript" src="{site_url()}assets/admin/js/home.js"></script>

	<script type="text/javascript">
    	$(function(){
			Home.initNoti();
		});
    </script>

{/block}

{block name='content'}

<div class="row m-t-1">
				<div id="content" class="col-md-12 col-lg-9">


<div class="portlet light portlet-fit p-x-0 bordered">

                                        <div class="mt-element-list">

                                            <div class="mt-list-container list-news">
                                                <ul>
                            {foreach $notificacionesTodos as $noti name=foo}

                                                    <li class="mt-list-item">
                                                        <div class="list-datetime bold font-green"> {$noti->fecha|date_format:'Y-m-d H:i:s'|relative_date} </div>
                                                        <div class="list-item-content">
                                                            <h3 class="m-y-0 p-y-0">
                                                                <a href="javascript:;">{$noti->notificacion->titulo}</a>
                                                            </h3>
                                                            <p class="p-y-0 m-y-0">{$noti->notificacion->descripcion}</p>
                                                        </div>
                                                    </li>
                            {/foreach}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>



                </div>
</div>
{/block}