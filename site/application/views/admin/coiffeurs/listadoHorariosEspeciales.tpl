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

    <div id="busqueda_avanzada" class="">
                <div class="panel-body">

                    <div class="form-body form-bordered form-horizontal">
                        <div class="row">
                            <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">FECHA ESPECIAL</label>
                                        <select id="filtro-fecha" name="filtro-fecha" class="form-control select2 filtros" placeholder='Seleccione Fecha Especial'>
                                            <option value="">Sin fecha</option>   
                                            {foreach $aHorariosEspeciales as $aHor}
                                                <option value="{$aHor->id}" {if $aHor->id eq $aHorarioEspecial->id} selected="selected" {/if}>{$aHor->fecha_desde|date_format:'Y-m-d'} al {$aHor->fecha_hasta|date_format:'Y-m-d'}</option>
                                            {/foreach}
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3 m-r-2">
                                <div class="form-group">
                                    <label class="control-label m-b-1 ">COIFFEURS</label>
                                        <select id="filtro-coiffeur" name="filtro-coiffeur" class="form-control select2 filtros" placeholder='Seleccione Coiffeur'>   
                                            <option value="">Sin Coiffeur</option>                                        
                                            {foreach $aCoiffeurs as $aCo}
                                                <option value="{$aCo->id}" {if ($coiffeur->id gt 0) && ($aCo->id eq $coiffeur->id)} selected="selected" {/if}>{$aCo->nombre}</option>
                                            {/foreach}
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

    <form action="/admin/coiffeurs/save_horarios_especiales" id="frmPremios" name="frmPremios" class="form-horizontal {$mostrar}" method="POST">
                    <input type="hidden" id="coiffeur_id" name="coiffeur_id" value="{$coiffeur->id}" />
                    <input type="hidden" id="horario_especial_id" name="horario_especial_id" value="{$aHorarioEspecial->id}" />
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
                        {foreach $coiffeur->horariosDeAtencionEspecialXCoiffeur as $ha}
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

   
    {assign var=ha value=false}
    {include file='admin/coiffeurs/item-horario.tpl'}


{/block}
