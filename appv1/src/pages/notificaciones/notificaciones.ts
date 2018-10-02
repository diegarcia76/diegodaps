import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

import { UserService } from '../../providers/user-service';
import { LoadingController } from 'ionic-angular';

import { Base } from '../base/base';
/*
  Generated class for the Notificaciones page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-notificaciones',
  templateUrl: 'notificaciones.html'
})
export class Notificaciones extends Base {

	notificaciones: any[];
	loadingPopup:any;

	constructor(public navCtrl: NavController,
				public userService:UserService, 
              	public loadingCtrl: LoadingController) {

			super(userService, navCtrl);

			// Create the popup
	        this.loadingPopup = this.loadingCtrl.create({
	          content: 'Cargando...'
	        });

	        this.loadingPopup.present();

			userService.loadNotificaciones()
	  		.subscribe(notificaciones => {
	  			    this.notificaciones = notificaciones.notificaciones;
	  			    this.loadingPopup.dismiss();
		      	//console.log(user);
		    })
	}

	ionViewDidLoad() {
		console.log('Hello NotificacionesPage Page');
	}

}