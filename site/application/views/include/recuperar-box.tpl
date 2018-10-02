<div class="login-box">
	<div class="inner text-center">
        	<h3>Recuperá tu cuenta</h3>
					<hr/>
						<form action="{site_url()}registro/restablecer" method="post" id='reset_password' >

		          <div class="form-group">
		            <label class="text-left pull-left">Nueva Contraseña</label>
		            <div class="inner-addon left-addon">
		              <input class="form-control" type="password" placeholder="Contraseña" name="pass" id="pass" />
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="text-left pull-left">Repetí tu Contraseña</label>
		            <div class="inner-addon left-addon">
		              <input class="form-control" type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2" />
		            </div>
		          </div>
		          <input id="email_v" name="email_v" type="hidden" value="{$user->email}" />
		          <div class="form-group">
		            <button type="submit" class="btn btn-primary btn-block">CONFIRMAR</button>
		          </div>
		        </form>
    </div>
</div>
