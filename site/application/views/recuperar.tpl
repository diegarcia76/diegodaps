{extends file='base/base.tpl'}

{block name='custom_css'}
<style type="text/css">

    div.test { display:none }

</style>
{/block}

{block name='custom_js'}

    <script src="{site_url()}assets/js/registro.js"></script>

    <script type="text/javascript">
        $(function(){
            Registro.initRecuperar();
        });
    </script>

{/block}

{block name='custom_init'}
{/block}

{block name='body_classes'}class="login recuperar"{/block}

{block name='header-container'}
{/block}

{block name='content'}

<div class="row">
 <div class="col-md-12">
   <div class="logo text-center" style="margin-bottom: -65px; z-index: 1; position: relative;">
     <a href="{site_url()}"><img src="{site_url()}assets/images/isologo_4.svg" width="230" height="auto"/></a>
   </div>
 </div>

  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default p-t-3" style="border: 4px solid #be9e54;">
    {include file='include/recuperar-box.tpl'}
  </div>
  </div>
</div>

<!--<div class="background">
  <div class="container">
    <div class="row row-registro">
      <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 animated bounceInRight login-box">
        <h2>Recuperar contraseña</h2>
        <form action="{site_url()}registro/restablecer" method="post" id='reset_password' >

          <!--
          <div class="form-group">

            <label>Correo electrónico</label>
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input type="text" class="form-control" placeholder="Su Email" name="email_reset" id="email_reset" />
            </div>
          </div>
          -->
          <!--<div class="form-group">
            <label>Nueva Contraseña</label>
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input class="form-control" type="password" placeholder="Contraseña" name="pass" id="pass" />
            </div>
          </div>
          <div class="form-group">
            <label>Repita Contraseña</label>
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input class="form-control" type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2" />
            </div>
          </div>
          <input id="email_v" name="email_v" type="hidden" value="{$user->email}" />
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block btn-naranja pull-right">CONFIRMAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>-->

<!--

<div class="container margin-top-40 margin-bottom-40">
  <div class="row">
    <div class="col-md-6 margin-top-40">
      <h1 class="margin-bottom-30 color-white">¿Olvidaste tu clave?<br/>
        <small class="color-white">Reestablece tu contraseña y recupera tu cuenta</small></h1>
    </div>
  </div>
</div>
<div class="bkg-gris padding-top-40 padding-bottom-40">
  <div class="container row-registro">
    <div class="col-md-6 margin-top-40">
      <p class="fontsize-20 color-gris"></p>
    </div>
    <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 col-registro animated bounceInRight">
      <form action="{site_url()}registro/restablecer" method="post" id='reset_password' >
        <div class="form-group">
          <label>Correo electrónico</label>
          <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
            <input type="text" class="form-control" placeholder="Su Email" name="email_reset" id="email_reset" />
         </div>
        </div>

		 <div class="form-group">
          <label>Nueva Contraseña</label>
          <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
            <input class="form-control" type="password" placeholder="Contraseña" name="pass" id="pass" />
         </div>
        </div>

		 <div class="form-group">
          <label>Repita Contaseña</label>
          <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
            <input class="form-control" type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2" />
         </div>
        </div>

		<input id="email_v" name="email_v" type="hidden" value="{$user->email}" />


	    <div class="form-group">
          <button type="submit" class="btn btn-naranja pull-right">Recuperar <i class="fa fa-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
-->
<!-- MODAL PASS -->
<div class="modal fade " id="modal-olvido-pass-ok">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">Cerrar<span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title">Recuperar Contraseña</h4>
      </div>
      <div class="modal-body">
        <p>La operación se ha realizado con éxito</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
      <div class="modal-footer"> </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade " id="modal-olvido-passw-error">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">Cerrar<span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title">Recuperar Contraseña</h4>
      </div>
      <div class="modal-body">
        <p>Se ha producido un error. Complete los datos e intente nuevamente</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
      <div class="modal-footer"> </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{/block}
