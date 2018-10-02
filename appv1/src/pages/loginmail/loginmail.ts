import { Component } from '@angular/core';
import { NavController, AlertController, LoadingController, MenuController } from 'ionic-angular';
import { AuthService } from '../../providers/auth-service';
import { HomePage } from '../home/home';
import { Registro } from '../registro/registro';
import { Olvido } from '../olvido/olvido';
import { Facebook, FacebookLoginResponse } from '@ionic-native/facebook';
import { UserService } from '../../providers/user-service';

import { JwtHelper, tokenNotExpired} from 'angular2-jwt';

/*
  Generated class for the Login page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-loginmail',
  templateUrl: 'loginmail.html'
})

export class LoginMail {

	authType: string = "loginmail";
  error: string;
  loadingPopup:any;
  public username: string;
  public password: string;
  public FB_APP_ID: number = 1712182102430519;
  jwtHelper: JwtHelper = new JwtHelper();

  	constructor(public auth: AuthService, public navCtrl: NavController, public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController, private fb: Facebook, public userService:UserService,
                      public menuCtrl: MenuController) {

        fb.browserInit(this.FB_APP_ID, "v2.8");

    }

  	ionViewDidEnter() {
    	console.log('Hello LoginPage Page');
      this.menuCtrl.enable(false,'MyMenu');
  	}

    ionViewWillLeave() {
        this.menuCtrl.enable(true, 'MyMenu');
    }

    presentAlertFacebook(msg) {
      let alert = this.alertCtrl.create({
        title: 'Error',
        subTitle: msg,
        buttons: ['Cerrar']
      });
      alert.present();
    }

    /*doFbLogin(){
      let permissions = new Array();
      let nav = this.navCtrl;
      let auth = this.auth;
      let fb = this.fb;
      let userService = this.userService;

      let jwtHelper = this.jwtHelper;

      //the permissions your facebook app needs from the user
      permissions = ["public_profile", "email"];
      console.log('1');

      // Create the popup
      this.loadingPopup = this.loadingCtrl.create({
        content: 'Cargando...'
      });

      let popup = this.loadingPopup;

      popup.present();

      fb.login(permissions)
      .then(function(response){
        let userId = response.authResponse.userID;
        let params = new Array();
        //localStorage.setItem('id_token', response.authResponse.accessToken);

        let accessToken = response.authResponse.accessToken;

        //this.loginConFacebook(accessToken);
        console.log('dentro de fb.login');
        //console.log('response: '+response);
        //Getting name and gender properties
        fb.api("/me?fields=name,first_name,last_name,website,gender,email,picture.type(large)", params)
        .then(function(user) {
          //user.picture = "https://graph.facebook.com/" + userId + "/picture?type=large";

          let email = user.email;
          let name = user.name;
          let first_name = user.first_name;
          let last_name = user.last_name;
          let website = user.website;
          let picture = user.picture.data.url;
          console.log('2 picture: '+picture);
          console.log('2.5: '+JSON.stringify(user));

          //this.loginConFacebook(accessToken);
          userService.getByFacebookId( {'email': email, 'accessToken':userId, 'name':name, 'foto':picture}).then(
            (success) => {
              //console.log('ir al homepage');
              popup.dismiss();
              //auth.foto = user.picture.data.url;
              nav.setRoot(HomePage);
              //this.presentAlert();
              //this.navCtrl.setRoot(HomePage);

            },
            (err) => { console.log(err);
                        popup.dismiss();
                        this.presentAlertFacebook('No pudimos ingresar con Facebook. Intentá nuevamente más tarde o creá tu cuenta con tu email');
                      }
          );


        }, function(error){
          popup.dismiss();
          this.presentAlertFacebook('No pudimos ingresar con Facebook. Intentá nuevamente más tarde o creá tu cuenta con tu email');
          console.log('error o cancel de facebook');
        });


      }, function(error){
        popup.dismiss();
        this.presentAlertFacebook('No pudimos ingresar con Facebook. Intentá nuevamente más tarde o creá tu cuenta con tu email');
        console.log('error o cancel de facebook');
      });

    }*/

  	login(credentials) {
  		//alert(JSON.stringify(credentials));
        this.auth.login(credentials).then(
          (success) => {
            //alert('sdf');
            this.navCtrl.setRoot(HomePage);
          },
          (err) => {this.error = err; this.presentAlert(err);} //console.log(err)
        );
    }

    presentAlert(error) {
      let alert = this.alertCtrl.create({
        title: 'Login',
        subTitle: 'Error de Conexión: \n'+error,
        buttons: [
          {
            text: 'Reestablecer',
            handler: () => {
              console.log('reestablecer clicked');
              this.navCtrl.push(Registro);
            }
          },
          {
            text: 'Aceptar',
            handler: () => {
              console.log('Buy clicked');
            }
          }
        ]
      });
      alert.present();
    }

    goToRegistro() {
        //this.navCtrl.setRoot(Registro);
        this.navCtrl.push(Registro);
    }

    goToOlvido() {
        //this.navCtrl.setRoot(Registro);
        this.navCtrl.push(Olvido);
    }
    //goToLogin() {
        //this.navCtrl.setRoot(LoginMail);
      //  this.navCtrl.push(LoginMail);
    //}

    /*signup(credentials) {
        this.auth.signup(credentials).then(
          (success) => {
            this.navCtrl.setRoot(HomePage);
          },
          (err) => console.log(err)
        );
    }*/

}
