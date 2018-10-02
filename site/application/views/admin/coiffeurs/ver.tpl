{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/admin/js/coiffeurs.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(function(){
            Coiffeurs.initVer();
        });
    </script>
{/block}

{block name='custom_css'}
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
{/block}

{block name='content'}
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-user font-green-sharp"></i>
            <span class="caption-subject bold uppercase">{$coiffeur->nombre}</span>
            <span class="caption-helper">Información del Coiffeur</span>
        </div>
        <div class="actions">
            <a href="{site_url()}admin/coiffeurs/editar/{$coiffeur->id}" class="btn btn-circle btn-default btn-sm">
                 <i class="fa fa-edit"></i> Editar </a>
            <a href="{site_url()}admin/coiffeurs/eliminar/{$coiffeur->id}" class="btn btn-circle btn-default btn-sm btn-eliminar-coiffeur">
                <i class="fa fa-trash"></i> Eliminar </a>

        </div>
    </div>
    <div class="portlet-body">
	    <div class="row">
		    <div class="col-md-3">
			    {if count($coiffeur->foto) gt 0}
	                <img src="{ImagenManager::getInstance()->getUrl($coiffeur->foto,'120x120')}" class="img-preview">
	        {else}
	        <img src="{site_url()}uploads/sin-imagen120.jpg">
	        {/if}
		    </div>
		    <div class="col-md-9">
			    <table class="table">
			        <tr><th>Nombre</th><td>{$coiffeur->nombre}</td></tr>
			        <!--tr><th>E-mail</th><td>{$coiffeur->email}</td></tr-->
			        <tr><th>Descripción</th><td>{$coiffeur->descripcion}</td></tr>			        
		        </table>
		    </div>
	    </div>

    </div>
</div>





{/block}

{block name='custom-css'}
{/block}
