import { Component } from '@angular/core';
import { NavController, AlertController, MenuController } from 'ionic-angular';
import { Login } from '../login/login';
import { AuthService } from '../../providers/auth-service';
import { LoadingController } from 'ionic-angular';

/*
  Generated class for the Olvido page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-olvido',
  templateUrl: 'olvido.html'
})
export class Olvido {

	error: string;

  constructor(public navCtrl: NavController,
  				public auth: AuthService,
  				public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController,
                      public menuCtrl: MenuController) {}

  ionViewDidEnter() {
    console.log('Hello OlvidoPage Page');
    this.menuCtrl.enable(false,'MyMenu');
  }

  ionViewWillLeave() {
        this.menuCtrl.enable(true, 'MyMenu');
    }

  presentAlert() {
      let alert = this.alertCtrl.create({
        title: 'Login',
        subTitle: this.error,
        buttons: [          
          {
            text: 'Aceptar',
            handler: () => {
              console.log('Buy clicked');
              this.navCtrl.setRoot(Login);
            }
          }
        ]
      });
      alert.present();
    }

  olvidoPass(credentials) {
  		//alert(JSON.stringify(credentials));
        this.auth.olvidoPass(credentials).then(
          (success) => {
            //alert('sdf');
            
          },
          (err) => {this.error = err; this.presentAlert();} //console.log(err)
        );
    }

    goToLogin() {
        //this.navCtrl.setRoot(Registro);
        this.navCtrl.push(Login);
    }

}
