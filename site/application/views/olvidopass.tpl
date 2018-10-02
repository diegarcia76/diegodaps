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

{block name='body_classes'}class="login olvidopass"{/block}

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
    {include file='include/olvido-box.tpl'}
  </div>
  </div>
</div>




<!--<div class="background">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 animated bounceInRight login-box">
        <h2>¿Olvidaste tu clave?</h2>
        <h4>Ingresá tu correo electrónico</h4>
        <form action="{site_url()}registro/olvidopass" method="post" id='form_forgot' >
          <div class="form-group">
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-verde btn-block btn-lg">Recuperar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>-->

<!-- MODAL PASS -->
<div class="modal fade modal-verde modal-viaturno" id="modal-olvido-pass">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span></button>
      <div class="text-center">
        <h1 class="modal-title color-verde">Recuperar Contraseña</h1>
        <p>Te hemos enviado un mail a tu correo electrónico para recuperar tu contraseña.</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade modal-verde modal-viaturno" id="modal-olvido-pass-error">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span></button>
      <div class="text-center">
        <h1 class="modal-title">Recuperar Contraseña</h1>
        <p>El correo no existe en nuestra base de datos.</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<!-- /.modal -->

{/block}
