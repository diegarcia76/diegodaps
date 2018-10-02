import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { Calendario } from '../calendario/calendario';
import { TurnosService } from '../../providers/turnos-service';
import { LoadingController } from 'ionic-angular';

/*
  Generated class for the Coiffeurs page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-coiffeurs',
  templateUrl: 'coiffeurs.html'
})
export class Coiffeurs {
  servicioId  :  number;
  turno_editar  :  number;
  coiffeurs   :  Array<{title: string, avatar: string, component: any}>;
  loadingPopup:any;

  constructor(public navCtrl: NavController, 
              turnosServ: TurnosService, public navParams: NavParams, 
              public loadingCtrl: LoadingController) {

  	/*this.coiffeurs = [
      { title: 'Diego Daps', avatar:'../../assets/img/default.png', component: Calendario },
      { title: 'Nacho Albanex', avatar:'../../assets/img/default.png', component: Calendario },
    ];*/
    this.servicioId = navParams.get("repo");
    this.turno_editar = navParams.get("turno_editar");    

    // Create the popup
    this.loadingPopup = this.loadingCtrl.create({
      content: 'Cargando...'
    });

    this.loadingPopup.present();

    //console.log(this.servicioId);
    turnosServ.loadCoiffeurs(this.servicioId)
        .subscribe(coiffeurs => {
          this.coiffeurs = coiffeurs.coiffeurs;
          this.loadingPopup.dismiss();
            //console.log(profesiones)
        })

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Coiffeurs');
  }

  goToCalendar(repo) {
  	//console.log('goto Calendario');
  	this.navCtrl.push(Calendario, {coiffeur: repo.id, servicio : repo.servicio, turno_editar: this.turno_editar});
  }

}
