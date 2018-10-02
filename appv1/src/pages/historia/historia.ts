import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { TurnosService } from '../../providers/turnos-service';
import { LoadingController } from 'ionic-angular';

/*
  Generated class for the Historia page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-historia',
  templateUrl: 'historia.html'
})
export class Historia {
	public turno_id  :  number;
	public turno   :  Array<{title: string, avatar: string, component: any}>;
  public loadingPopup:any;  
  public turnito: any;

  constructor(public navCtrl: NavController,
          public turnosService: TurnosService, public navParams: NavParams, 
              public loadingCtrl: LoadingController) {

  	this.turno_id = navParams.get("turno_id");

    // Create the popup
    this.loadingPopup = this.loadingCtrl.create({
      content: 'Cargando...'
    });

    this.loadingPopup.present();

  	turnosService.loadTurno(this.turno_id)
        .subscribe(turno => {
          this.turno = turno.turno;
          this.turnito = this.turno;
            this.loadingPopup.dismiss();
        })
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Historia');
  }


}
