import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { Confirmacion } from '../confirmacion/confirmacion';
import { TurnosService } from '../../providers/turnos-service';
import { LoadingController, ToastController } from 'ionic-angular';

/*
  Generated class for the Calendario page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-calendario',
  templateUrl: 'calendario.html'
})
export class Calendario {
    servicioId  :  number;
    coiffeurId  :  number;
    turno_editar  :  number;
    fecha : Date = new Date();
    fecha_manana  :  Date = new Date();
    otro_dia  :  string;
    fechaString : string; 
    dia_maniana: string;  
    turnos: any[];
    error: string;
    hayTurnos: any;
    tabs:string = 'now';

    public parte_fecha_hoy: any;
    public parte_fecha_manana: any;
    public parte_hora_hoy: any;

    public loadingPopup:any;

    weekday = new Array(7);

    constructor(public navCtrl: NavController, 
              public turnosServ: TurnosService, public navParams: NavParams, 
              public loadingCtrl: LoadingController,
              public toastCtrl: ToastController) {

        //this.loadingPopup.present();
        this.weekday[0] = "Domingo";
        this.weekday[1] = "Lunes";
        this.weekday[2] = "Martes";
        this.weekday[3] = "Miércoles";
        this.weekday[4] = "Jueves";
        this.weekday[5] = "Viernes";
        this.weekday[6] = "Sábado";

        this.turnosServ.loadFechaActual().then(
          (success) => {                       
            this.fechaString = this.turnosServ.fecha;
            this.fecha = new Date(this.fechaString);
            this.fecha_manana = new Date(this.turnosServ.fecha_manana);

            /*****************************/
            this.parte_hora_hoy = this.turnosServ.parte_hora_hoy;
            this.parte_fecha_manana = this.turnosServ.parte_fecha_manana;
            this.parte_fecha_hoy = this.turnosServ.parte_fecha_hoy;
            /*****************************/
            
            //console.log(this.turnos.length);

            console.log('fecha inicial: ');
  	        console.log(this.fecha);

  	        this.coiffeurId = navParams.get("coiffeur");
  	        this.servicioId = navParams.get("servicio");
  	        this.turno_editar = navParams.get("turno_editar"); 
  	        this.fechaString = this.parte_fecha_hoy; //this.fecha.toISOString().slice(0,10);

  	        console.log('fecha despues iso: ');
  	        console.log(this.fechaString);

  	        //this.fecha_manana.setDate(this.fecha + 1);
  	        this.hayTurnos = 0;

  	        this.dia_maniana = this.weekday[this.fecha_manana.getDay()];

  	        this.turnosServ.loadTurnosXCoiffeur(this.servicioId, this.coiffeurId, this.fechaString).then(
  	          (success) => {                       
  	            this.turnos = this.turnosServ.turnos;
  	            console.log(this.turnos.length);
  	            this.hayTurnos = this.turnos.length;
  	            //this.auth.user = user.nombre;
  	          },
  	          (err) => console.log(err)
  	        );

          },
          (err) => console.log(err)
        );

        

        this.loadingPopup = this.loadingCtrl.create({
            content: 'Cargando...'
        });      

    }

    ionViewDidLoad() {
        console.log('ionViewDidLoad Calendario');
    }

    selectedTabChanged($event): void {
        
        if($event.value=='now'){
            this.fechaString = this.parte_fecha_hoy; //this.fecha.toISOString().slice(0,10);
        }

        if($event.value=='manana'){
            this.fechaString = this.parte_fecha_manana; //this.fecha_manana.toISOString().slice(0,10);
        }

        if($event.value=='calendar'){
            this.fechaString = this.parte_fecha_hoy; //this.fecha.toISOString().slice(0,10);
            this.otro_dia = this.fechaString;
        }
        //console.log(this.servicioId+' / '+ this.coiffeurId+' / '+ this.fechaString);
        this.turnosServ.loadTurnosXCoiffeur(this.servicioId, this.coiffeurId, this.fechaString).then(
          (success) => {                       
            this.turnos = this.turnosServ.turnos;
            console.log(this.turnos.length);
            this.hayTurnos = this.turnos.length;
            //this.auth.user = user.nombre;
          },
          (err) => console.log(err)
        );
    }

    presentToast(msj) {
        let toast = this.toastCtrl.create({
              message: msj,
              duration: 3000,
              position: 'top'
            });
        toast.present();
    }

    goToConfirmacion(turnoElegido) {
        let navCtrl = this.navCtrl;
      	//console.log('goto Confirmacion' + turnoElegido.en_fecha);
        this.loadingPopup = this.loadingCtrl.create({
            content: '<div class="custom-spinner-container"><div class="custom-spinner-box">Cargando...</div></div>'
        }); 

        if((turnoElegido.en_fecha) && (turnoElegido.disponible)){
            this.loadingPopup.present();
            this.turnosServ.loadConfirmacionTurno(this.servicioId, this.coiffeurId, turnoElegido.fecha_turno, this.turno_editar)
            .subscribe(
                  data => {
                      console.log(data.turno.status);
                      this.loadingPopup.dismiss();
                      if(!data.turno.status){
                            if(!data.turno.statusEdicion){
                              if(data.turno.espera){
                                console.log('Ya hay tomado un turno para hoy. No se pueden sacar sobreturnos.');
                                this.presentToast('Ya hay tomado un turno para hoy. No se pueden sacar sobreturnos.');
                              }else{
                                console.log('Ya Tienes un turno hoy. No se puede reservar mas de un turno por día.');
                                this.presentToast('Ya Tienes un turno hoy. No se puede reservar mas de un turno por día.');  
                              }
                              
                            }else{
                              console.log('Turno NO editado. No se puede editar mas de una vez el turno.');
                              this.presentToast('Turno NO editado. No se puede editar mas de una vez el turno.');
                            }
                      }else{
                          console.log('aconfuirmar');

                          this.navCtrl.push(Confirmacion, {servicio: this.servicioId, coiffeur: this.coiffeurId, fecha: turnoElegido.fecha_turno, turno_editar: this.turno_editar}).then(
                              (success) => {                       
                                this.turnos = this.turnosServ.turnos;
                                //console.log(this.turnos.length);
                                this.hayTurnos = this.turnos.length;
                                //this.auth.user = user.nombre;
                              },
                              (err) => console.log(err)
                            );

                      }
                        
                      },
                  error => {},
                  () => {}
                );

            
        }else{
            if(!turnoElegido.disponible){
                alert('No Disponible');
            }else{
                alert('Fuera de Fecha');
            }          
        }
  	
    }

    toggleDetails(data) {
        if (data.showDetails) {
            data.showDetails = false;
        } else {
            data.showDetails = true;
        }
    }

    onChangeDate(newValue) {
        //console.log(newValue);
        this.otro_dia = newValue;  // don't forget to update the model here
        this.turnosServ.loadTurnosXCoiffeur(this.servicioId, this.coiffeurId, this.otro_dia).then(
          (success) => {                       
            this.turnos = this.turnosServ.turnos;
            //console.log(this.turnos.length);
            this.hayTurnos = this.turnos.length;
            //this.auth.user = user.nombre;
          },
          (err) => console.log(err)
        );         
    }


}
