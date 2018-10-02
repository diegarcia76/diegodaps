import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { Historia } from '../historia/historia';
import { Servicios } from '../servicios/servicios';
import { TurnosService } from '../../providers/turnos-service';
import { UserService } from '../../providers/user-service';
import { LoadingController } from 'ionic-angular';

import { Base } from '../base/base';
/*
  Generated class for the Historial page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-historial',
  templateUrl: 'historial.html'
})
export class Historial extends Base {

  items = [];
  turnos: any[];
  loadingPopup:any;
  grid: any[]; //array of arrays

  constructor(public navCtrl: NavController,
          public turnosService: TurnosService, public navParams: NavParams, 
              public loadingCtrl: LoadingController, public userService: UserService,) {
    
        super(userService, navCtrl);
        // Create the popup
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });

        this.loadingPopup.present();

        this.turnosService.loadHistorial()
              .subscribe(
                  data => {this.turnos = data.turnos;
                          this.grid = Array.from(Array(Math.ceil(this.turnos.length / 2)).keys());
                          /*for (let i = 0; i < this.turnos.length; i++) {
                            let item = {
                              foto: this.turnos[i].foto,
                              fecha_hora: this.turnos[i].fecha_hora,
                              servicio: this.turnos[i].servicio,
                              coiffeur: this.turnos[i].coiffeur
                            };
                            this.items.push( item );
                          }*/
                          //this.grid = Array.from(Array(Math.ceil(this.items.length / 2)).keys());
                          this.loadingPopup.dismiss();},
                  error => alert(error),
                  () => console.log(this.grid)// this.grid =Array(Math.ceil(this.turnos.length/2))
                );

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Historial');

  }

  goToHistoria(tur) {
  	this.navCtrl.push(Historia, {turno_id: tur.id});
  }

  goToServicios() {
      this.navCtrl.push(Servicios);
  }

  /*doInfinite(infiniteScroll) {
    console.log('Begin async operation');
    //console.log(this.items);
    setTimeout(() => {
      for (let i = 8; i < this.turnos.length; i++) {
        this.items.push( this.turnos[i] );
      }
      //this.grid = Array.from(Array(Math.ceil(this.items.length / 2)).keys());
      console.log('Async operation has ended');
      infiniteScroll.complete();
    }, 500);
  }*/

}
