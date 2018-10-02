import { Component } from '@angular/core';
import { NavController, NavParams, AlertController } from 'ionic-angular';

import { Login } from '../login/login';

import { Profesion } from '../../_models/profesion';
import { UserService } from '../../providers/user-service';
import { AuthService } from '../../providers/auth-service';

/*
  Generated class for the Registro page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-registro',
  templateUrl: 'registro.html'
})
export class Registro {

	profesiones : Profesion[]
	myDate: String  
	sexo: number
	profesion_id: number
	nombre: string
	email:string
	telefono: string
	password:string
	password2:string
	error:string
	login:Login;

	constructor(private auth: AuthService, public navParams: NavParams,
				public navCtrl: NavController,
				public userService:UserService, public alertCtrl: AlertController) {

		//this.myDate = new Date().toISOString().substring(0, 10);
		//this.sexo = 0;
		//this.profesion_id = 1;
		this.login = navParams.get("login");

		userService.loadProfesiones()  		
	  		.subscribe(profesiones => {
	  			this.profesiones = profesiones;
		      	//console.log(profesiones)
		    	},
                err => {
                    this.error = err;
                    alert(err);
                    
            })
	}

	doFbLogin(){
		console.log('asda');
		this.login.doFbLogin();
	}

	ionViewDidLoad() {
		console.log('Hello RegistroPage Page');
	}

	presentAlert(title, msj) {
      let alert = this.alertCtrl.create({
        title: title,
        subTitle: msj,
        buttons: ['Cerrar']
      });
      alert.present();
    }


	registroUser(user) {
  		//alert(JSON.stringify(user));
        this.auth.registroUser(user).then(
          (success) => {              
            //alert('Se actualizaron los datos');
            //this.navCtrl.setRoot(HomePage);
            //this.auth.user = user.nombre;
            this.navCtrl.setRoot(Login);
          },
          (err) => { this.presentAlert('Error', err);}
        );
    }


}
