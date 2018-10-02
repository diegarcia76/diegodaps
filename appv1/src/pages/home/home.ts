import { Component } from '@angular/core';
import { NavController, AlertController } from 'ionic-angular';
import { Servicios } from '../servicios/servicios';

import { Login } from '../login/login';
import { AuthService } from '../../providers/auth-service';
import { TurnosService } from '../../providers/turnos-service';
import { UserService } from '../../providers/user-service';
import { LoadingController } from 'ionic-angular';

import { Base } from '../base/base';

/*
  Generated class for the Home page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-home',
  templateUrl: 'home.html',
})

export class HomePage extends Base {

    users: any[] = [];
    turnos: any[];
    loadingPopup:any;
    backgroundImg:any;

    constructor(public auth: AuthService,
              public navCtrl: NavController,
              public turnosService: TurnosService,
              public userService: UserService,
              public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController) {

                 super(userService, navCtrl);
    }

    ionViewDidLoad() {
      console.log('Hello HomePage Page');

      // Create the popup
      this.loadingPopup = this.loadingCtrl.create({
        content: 'Cargando...'
      });
      
      this.turnosService.load()
        .subscribe(
            data => this.turnos = data.fechas,
            error => alert(error),
            () => this.loadingPopup.dismiss()
          );

      this.userService.updatePlayerId({'playerId' : localStorage.getItem('playerId')}).then(
        (success) => {              
          //alert('Se actualizaron los datos');
          //this.navCtrl.setRoot(HomePage);
        },
        (err) => console.log(err)
      );


      setInterval(() => {
        //this.refreshData();
        this.turnosService.load()
        .subscribe(
            data => this.turnos = data.fechas,
            error => alert(error),
            () => this.loadingPopup.dismiss()
          );
      }, 300000);

    }

    logout() {
        this.auth.logout();
        this.navCtrl.setRoot(Login);
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
            this.navCtrl.setRoot(HomePage)
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
