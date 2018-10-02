import { Component } from '@angular/core';
import { NavController, NavParams, AlertController } from 'ionic-angular';
import { Servicios } from '../servicios/servicios';
import { TurnosService } from '../../providers/turnos-service';
import { UserService } from '../../providers/user-service';
import { LoadingController } from 'ionic-angular';

import { Base } from '../base/base';
/*
  Generated class for the Misturnos page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-misturnos',
  templateUrl: 'misturnos.html'
})
export class MisTurnos extends Base {

	turnos: any[];
  loadingPopup:any;

  	constructor(public navCtrl: NavController,
  			  public turnosService: TurnosService, public navParams: NavParams, 
              public loadingCtrl: LoadingController, public alertCtrl: AlertController, public userService: UserService) {

          super(userService, navCtrl);
          // Create the popup
          this.loadingPopup = this.loadingCtrl.create({
            content: 'Cargando...'
          });

          this.loadingPopup.present();

      		this.turnosService.load()
              .subscribe(
                  data => {this.turnos = data.fechas;
                          this.loadingPopup.dismiss();
                        },
                  error => alert(error),
                  //() => console.log(this.turnos)
                );
  	}

  	ionViewDidLoad() {
    	console.log('ionViewDidLoad MisturnosPage');
  	}

  	goToServicios(canje = false, turno = 0) {
        this.navCtrl.push(Servicios, {canje:canje, turno:turno});
    }

    presentAlert(turno) {
      let alert = this.alertCtrl.create({
        title: 'Cancelar Turno',
        subTitle: '¿Está seguro que quiere cancelar el Turno?',
        buttons: [
          {
            text: 'cancelar',
            role: 'cancel',
            handler: () => {
              console.log('cancelar clicked');
            }
          },
          {
            text: 'Aceptar',
            handler: () => {
              this.cancelarTurno(turno);
            }
          }
        ]
      });
      alert.present();
    }

    cancelarTurnoPrevio(turno){

      this.presentAlert(turno);

    }

    cancelarTurno(turno) {
        //alert(turno.id);
        this.turnosService.cancelarTurno(turno).then(
          (success) => {
            this.navCtrl.setRoot(MisTurnos)
            //this.auth.user = user.nombre;
          },
          (err) => console.log(err)
        );
        /*this.turnosService.cancelarTurno(turno)
          .subscribe(
              data => this.auth.puntos = data.puntos,
              error => alert(error),
              () => this.navCtrl.setRoot(HomePage)
            );*/
    }

}