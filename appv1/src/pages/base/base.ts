import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { UserService } from '../../providers/user-service';
import { LoadingController, ToastController } from 'ionic-angular';

import { Perfil } from '../perfil/perfil';

/*
  Generated class for the Calendario page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/

export class Base {
    
    telefono:any;

    constructor(public userService:UserService, public navCtrl: NavController,) {
      console.log('dentro de constructor base');
      console.log('tel: '+this.telefono);
      if((this.telefono === undefined) || (this.telefono == ''))
        this.check_telefono();
      
    }

    ionViewDidLoad() {
        console.log('ionViewDidLoad Calendario');
    }

    check_telefono() {
        
        console.log('dentro de check_telefono');
        this.userService.load()
          .subscribe(user => {
                console.log('trae user: '+user+ ' / '+user.nombre);
                this.telefono = user.telefono;                
                if((this.telefono === undefined) || (this.telefono == ''))
                  this.navCtrl.setRoot(Perfil);
          })

    }


}
