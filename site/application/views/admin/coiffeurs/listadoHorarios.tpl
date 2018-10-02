{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}

    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="{site_url()}assets/admin/js/horarios.js"></script>

    <script type="text/javascript">
        $(function(){

            Horarios.init();

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

    <form action="/admin/coiffeurs/save_horarios" id="frmPremios" name="frmPremios" class="form-horizontal" method="POST">
                    <input type="hidden" id="coiffeur_id" name="coiffeur_id" value="{$coiffeur->id}" />
                    <table id="tblPremiosSorteo" class="table table-stripped table-responsive">
                    <thead>
                        <tr>
                            <th>Día de Semana</th>
                            <th>Horario Desde</th>
                            <th>Horario Hasta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="wpr-imagenes-carrusel">
                        {foreach $coiffeur->horariosDeAtencionXCoiffeur as $ha}
                            {include file='admin/coiffeurs/item-horario.tpl'}
                        {/foreach}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="5">
                                <div class="text-right">
                                    <a href="#" class="btn green btnAddPremio pull-left"><i class="icon-plus"></i> Agregar horario</a>
                                    <a href="{site_url()}admin/coiffeurs" class="btn"><i class="icon-angle-left"></i> Cancelar</a>
                                    <button type="submit" class="btn green btnGuardar"><i class="icon-check"></i> Guardar</button>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    </table>
            </form>

    <h1>Horarios especiales</h1>
    <a class="btn green" href="{site_url()}admin/coiffeurs/administrar_horarios_especiales/0/{$coiffeur->id}" data-toggle="tooltip" data-placement="top"  data-original-title="Administrar Horarios Especiales"><i class="fa fa-clock-o"></i> Definir Horarios Especiales para {$coiffeur->nombre}</a>

    <h1>Ausencias y Vacaciones</h1>
    <form action="/admin/coiffeurs/save_ausencias" id="frmAusencias" name="frmAusencias" class="form-horizontal" method="POST">
            <input type="hidden" id="coiffeur_id" name="coiffeur_id" value="{$coiffeur->id}" />
            <table id="tblAusencias" class="table table-stripped table-responsive">
            <thead>
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Motivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="wpr-ausencias-body">
                {foreach $coiffeur->ausencias as $ha}
                    {include file='admin/coiffeurs/item-ausencia.tpl'}
                {/foreach}
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="5">
                        <div class="text-right">
                            <a href="#" class="btn green btnAddAusencia pull-left"><i class="icon-plus"></i> Agregar Ausencia</a>
                            <a href="{site_url()}admin/coiffeurs" class="btn"><i class="icon-angle-left"></i> Cancelar</a>
                            <button type="submit" class="btn green btnGuardar"><i class="icon-check"></i> Guardar</button>
                        </div>
                    </td>
                </tr>
            </tfoot>
            </table>
    </form>



    {assign var=ha value=false}
    {include file='admin/coiffeurs/item-horario.tpl'}
    {include file='admin/coiffeurs/item-ausencia.tpl'}


{/block}
