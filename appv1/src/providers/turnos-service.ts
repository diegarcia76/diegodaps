import { Injectable } from '@angular/core';
import { Http, Headers/*Response, Headers, RequestOptions*/ } from '@angular/http';
//import { Observable } from 'rxjs/Rx';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import { AuthService } from '../providers/auth-service';
import { LoadingController } from 'ionic-angular';
import { Webservice } from '../providers/webservice';

/*
  Generated class for the UserService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class TurnosService {
	canje  :  boolean;
	data: any;
	error: string;
	public turno_editar: number;
	public turnos: any[];
	public fecha: any;
	public fecha_manana: any;
	public parte_fecha_hoy: any;
	public parte_fecha_manana: any;
	public parte_hora_hoy: any;
	loadingPopup:any;
	//contentHeader: Headers = new Headers({"Content-Type": "application/json"});
	contentHeader: Headers = new Headers({"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"});

	//private githubApiUrl: string = "http://daps.local/Webservice";
	private githubApiUrl: string = "http://turnos.diegodaps.com/Webservice";	
	
	constructor(public http: Http, 
				public auth: AuthService, 
				public loadingCtrl: LoadingController,
				public webserv: Webservice) {

		console.log('Hello TurnosService Provider');
		this.data = null;

		// Create the popup
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });

	}

	//trae los proximos turnos
	load() {
		 console.log('dentro de load: '+localStorage.getItem('user_id'));
		return this.webserv.callAction('turnosProximos/'+localStorage.getItem('user_id'))
	      .map(res => res.json());
	}

	//trae los proximos turnos
	loadHistorial() {
		return this.webserv.callAction('turnosHistorial/'+localStorage.getItem('user_id'))
	      .map(res => res.json());
	}

	loadServicios(){
		return this.webserv.callAction('getServicios')
	      .map(res => res.json());
	}

	loadCoiffeurs(id){
		return this.webserv.callAction('getCoiffeurs/'+id)
	      .map(res => res.json());
	}

	loadTurno(id){
		return this.webserv.callAction('getTurno/'+id)
	      .map(res => res.json());
	}

	loadTurnosXCoiffeur(servicio, coiffeur, fecha){
		this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });

		this.loadingPopup.present();
 		return new Promise((resolve, reject) => { 
 			this.webserv.callAction('cargarHorarios/'+servicio+'/'+coiffeur+'/'+fecha+'/'+localStorage.getItem('user_id'))
	      		.map( res => res.json())
	      		.subscribe(
                    data => { 
                        this.turnos = data.turnos;
                        //this.loadingPopup.dismiss(); 
                        resolve(data);
                    },
                    err => {
                        this.error = err;          
                        alert(err);              
                        this.loadingPopup.dismiss(); 
                        reject(err);
                    },
                    () => {this.loadingPopup.dismiss();}
                );
	    });
	}

	loadConfirmacionTurno(servicio, coiffeur, fecha, turnoId){
		return this.webserv.callAction('confirmar_turno_1/'+servicio+'/'+coiffeur+'/'+fecha+'/'+localStorage.getItem('user_id')+'/'+ turnoId)
	      .map(res => res.json())
	}

	saveTurno(credentials) {
 		//credentials.push();
 		//alert(JSON.stringify(credentials));
 		this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });

 		this.loadingPopup.present();
 		return new Promise((resolve, reject) => { 			
	        this.webserv.callAction('confirmar_turno_2/'+localStorage.getItem('user_id'), credentials)
	            .map(res => res.json())
                .subscribe(
                    data => { 
                        //this.authSuccess(data.id_token);
                        this.auth.puntos = data.puntos_restantes;
                        resolve(data);
                    },
                    err => {
                        this.error = err;   
                        alert(err);    
                        this.loadingPopup.dismiss();                 
                        reject(err);
                    },
                    () => {this.loadingPopup.dismiss();}
                );
	    });
    }  

    cancelarTurno(turno) {
		//alert(turno.id);
		this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });
        
		this.loadingPopup.present();
        return new Promise((resolve, reject) => {
	        this.webserv.callAction('cancelar_turno', { "user_id": localStorage.getItem('user_id'), "turno_id": turno.id})
	            .map(res => res.json())
                .subscribe(
                    data => { 
                        //this.authSuccess(data.id_token);
                        this.auth.puntos = data.puntos;
                        resolve(data);                        
                    },
                    err => {
                        this.error = err;      
                        alert(err);
                        this.loadingPopup.dismiss();                  
                        reject(err);
                    },
                    () => {this.loadingPopup.dismiss();}
                );
	    });
	  
	}  

	loadFechaActual(){
		this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });

		this.loadingPopup.present();
 		return new Promise((resolve, reject) => { 
 			this.webserv.callAction('getCurrentDatetime')
	      		.map( res => res.json())
	      		.subscribe(
                    data => { 
                        this.fecha = data.datetime;
                        this.fecha_manana = data.tomorrow;
                        this.parte_hora_hoy = data.parte_hora_hoy;
                        this.parte_fecha_manana = data.parte_fecha_manana;
                        this.parte_fecha_hoy = data.parte_fecha_hoy;
                        //this.loadingPopup.dismiss(); 
                        resolve(data);
                    },
                    err => {
                        this.error = err;                        
                        this.loadingPopup.dismiss(); 
                        alert(err);
                        reject(err);
                    },
                    () => {this.loadingPopup.dismiss();}
                );
	    });
	}

}