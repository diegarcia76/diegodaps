{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>    
    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="{site_url()}assets/admin/js/precios.js"></script>

    <script type="text/javascript">
        $(function(){
                        
            Precios.init();
            
        });
    </script>
{/block}

{block name='custom_css'}
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css"/>
    
    <style type="text/css">
        #tblPremiosSorteo tr.ui-sortable-placeholder{
            height: 40px;
            background: #f5f5f5; 
            border: 2px dashed #999;
        }

        #tblPremiosSorteo tr.ui-sortable-helper{
            height: 40px;
            background: #f5f5f5; 
            border: 1px dashed #f0f0f0;
        }

        input.timepicker{
            width: 100px !important;
        }

        .input-group-addon{
            width: 0% !important;
        }

    </style>
{/block}

{block name='content'}
    <form action="/admin/coiffeurs/save_precios" id="frmPremios" name="frmPremios" class="form-horizontal" method="POST">
                    <input type="hidden" id="coiffeur_id" name="coiffeur_id" value="{$coiffeur->id}" />                    
                    <table id="tblPremiosSorteo" class="table table-stripped table-responsive">
                    <thead>
                        <tr>
                            <th>Servicios</th>
                            <th>Precio</th>
                            <th>Precio Efectivo</th>
                            <th>Comisión</th>
                            <th>Especial</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="wpr-imagenes-carrusel">
                        {foreach $coiffeur->serviciosXCoiffeur as $ha}
                            {include file='admin/coiffeurs/item-precio.tpl'}
                        {/foreach}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="5">
                                <div class="text-right">
                                    <a href="#" class="btn green btnAddPremio pull-left"><i class="icon-plus"></i> Agregar Precio</a>
                                    <a href="{site_url()}admin/coiffeurs" class="btn"><i class="icon-angle-left"></i> Cancelar</a>
                                    <button type="submit" class="btn green btnGuardar"><i class="icon-check"></i> Guardar</button>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    </table>   
            </form>

    {assign var=ha value=false}
    {include file='admin/coiffeurs/item-precio.tpl'}

{/block}
