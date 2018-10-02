import { Component } from '@angular/core';
import { NavController, AlertController, NavParams } from 'ionic-angular';
import { TurnosService } from '../../providers/turnos-service';
import { AuthService } from '../../providers/auth-service';
import { HomePage } from '../home/home';
import { LoadingController } from 'ionic-angular';

/*
  Generated class for the Confirmacion page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-confirmacion',
  templateUrl: 'confirmacion.html'
})
export class Confirmacion {

	public servicioId  :  number;
  public coiffeurId  :  number;
  public fechaString :  string;
  loadingPopup:any;
  
  public turno   :  Array<{servicio: string, 
  						servicio_id: string, 
  						coiffeur: string, 
  						coiffeur_id: string, 
  						fecha_turno: string, 
  						fecha: string, 
              espera: string, 
  						fecha_sola: string, 
  						hora_sola: string, 
  						turno_id: string, 
  						puntos_servicio: string}>;
  //public turno : Turno[] = [];
  public turnito: any;
  turno_editar  :  number;
  
   // public turno : Array<any> = new Array<any>();

  	constructor(public navCtrl: NavController, 
              public turnosServ: TurnosService, public navParams: NavParams,
                      public auth: AuthService, public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController) {

	  	this.coiffeurId = navParams.get("coiffeur");
	    this.servicioId = navParams.get("servicio"); 
	    this.fechaString = navParams.get("fecha"); 
      this.turno_editar = navParams.get("turno_editar");

      // Create the popup
      this.loadingPopup = this.loadingCtrl.create({
        content: 'Cargando...'
      });      

      this.loadingPopup.present();

	    this.turnosServ.loadConfirmacionTurno(this.servicioId, this.coiffeurId, this.fechaString, this.turno_editar)
	        .subscribe(
	              data => {this.turno = data.turno;
                        this.turnito = this.turno;
                        this.loadingPopup.dismiss();
                      },
	              error => alert(error),
	              //() => console.log(this.turno)
	            );
      
	}

  presentAlert() {
    let alert = this.alertCtrl.create({
      title: 'Reserva',
      subTitle: 'Turno Reservado',
      buttons: ['Cerrar']
    });
    alert.present();
  }

	ionViewDidLoad() {
		console.log('ionViewDidLoad Confirmacion');
	}

	saveTurno() {
  		
        if(!this.turnosServ.canje){
            delete this.turnito['puntos'];
        }
        //this.loadingPopup.present();
        this.turno['turno_id'] = this.turnosServ.turno_editar;

        //alert(JSON.stringify(this.turno));
        this.turnosServ.saveTurno(this.turnito).then(
          (success) => {              
            //this.loadingPopup.dismiss();
            //alert('Turno Reservado');
            
            this.presentAlert();
            this.navCtrl.setRoot(HomePage);
            //this.auth.user = user.nombre;
          },
          (err) => console.log(err)
        );
    }

}
