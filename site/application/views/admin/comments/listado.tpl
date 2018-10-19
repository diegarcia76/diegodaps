{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
	<script type="text/javascript" src="{site_url()}assets/admin/js/comments.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/moment.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.js"></script>

	<script type="text/javascript">
    	$(function(){
			Comments.initListado();
		});
    </script>
{/block}

{block name='custom_css'}
	<link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <link href="{site_url()}assets/common/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
{/block}

{block name='content'}

  

<div class="row">
<div class="panel-body">
 <table class="table table-stripped table-responsive table-hover dt-responsive" id="tblComentarios">
    <thead>
    	<tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Comentario</th>
    	</tr>
    </thead>
    <tbody>
    </tbody>    
    </table>
    </div>
</div>
{/block}
