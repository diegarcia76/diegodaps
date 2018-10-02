import { Component } from '@angular/core';
import { NavController, AlertController, NavParams } from 'ionic-angular';
import { Coiffeurs } from '../coiffeurs/coiffeurs';
import { TurnosService } from '../../providers/turnos-service';
import { AuthService } from '../../providers/auth-service';
import { LoadingController } from 'ionic-angular';

/*
  Generated class for the Servicios page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-servicios',
  templateUrl: 'servicios.html'
})
export class Servicios {
  
  servicios: Array<{id:number, nombre: string, duracion: string, component: any}>;
  loadingPopup:any;

    constructor(public navCtrl: NavController, 
              public turnosServ: TurnosService, public navParams: NavParams,
              public auth:AuthService, 
              public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController) {

        	/*this.servicios = [
          { title: 'Corte', duracion:'45', component: Coiffeurs },
          { title: 'Lavado', duracion:'30', component: Coiffeurs },
          { title: 'Coloración', duracion:'30', component: Coiffeurs },
        ];*/

        this.turnosServ.canje = navParams.get("canje");
        this.turnosServ.turno_editar = navParams.get("turno");

        // Create the popup
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });

        this.loadingPopup.present();
        //console.log(turnosServ.canje);
        this.turnosServ.loadServicios()      
            .subscribe(servicios => {
              this.servicios = servicios;
              this.loadingPopup.dismiss();
                //console.log(profesiones)
            })

    }

    presentAlert() {
      let alert = this.alertCtrl.create({
        title: 'Servicios',
        subTitle: 'No le alcanzan los puntos',
        buttons: ['Cerrar']
      });
      alert.present();
    }

    ionViewDidLoad() {
        console.log('Hello Servicios Page');
    }

    goToOtherCoiffeur(repo) {
    	//console.log('goto coiffeurs: '+repo);
        if(!this.turnosServ.canje)
            this.navCtrl.push(Coiffeurs, {repo: repo.id, turno_editar: this.turnosServ.turno_editar});
        else{
                if(repo.puntos<=this.auth.puntos)
                    this.navCtrl.push(Coiffeurs, {repo: repo.id});
                else
                    this.presentAlert();//alert('no le alcanzan los puntos');
            }
    }

}
