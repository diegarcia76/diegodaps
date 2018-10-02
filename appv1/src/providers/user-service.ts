import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import { AuthService } from '../providers/auth-service';
import { Webservice } from '../providers/webservice';

import { User } from '../_models/user';
import { Profesion } from '../_models/profesion';

/*
  Generated class for the UserService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class UserService {

	data: any;
	error: string;
	contentHeader: Headers = new Headers({"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"});
	//private githubApiUrl: string = "http://daps.local/Webservice";
	private githubApiUrl: string = "http://turnos.diegodaps.com/Webservice";
	
	constructor(public http: Http, 
				public auth: AuthService,
				public webserv: Webservice) {
		console.log('Hello UserService Provider');
		this.data = null;

	}

	load(): Observable<User> {
        console.log('dentro de load: user: '+localStorage.getItem('user_id'));
	    return this.webserv.callAction('getUsuario', { "user_id": localStorage.getItem('user_id')})
	      .map(res => res.json());
	}

	loadProfesiones(): Observable<Profesion[]>{
		return this.webserv.callAction('getProfesiones')
	      .map(res => <Profesion[]>res.json());
	}

	// Update a user
    updateUser(credentials) {
 
        return new Promise((resolve, reject) => {
	        this.webserv.callAction('updateUsuario/'+localStorage.getItem('user_id'), credentials)	            
	            .map(res => res.json())
                .subscribe(
                    data => { 
                        //this.authSuccess(data.id_token);
                        resolve(data)
                    },
                    err => {
                        this.error = err;
                        alert(err);
                        reject(err);
                    }
                );
	    });
    }

    // Update a user
    updatePlayerId(credentials) {
 
        console.log('1-updatePlayerId: '+credentials);
 		return new Promise((resolve, reject) => {
	        this.webserv.callAction('updatePlayerId/'+localStorage.getItem('user_id'), credentials)	            
	            .map(res => res.json())
                .subscribe(
                    data => { 
                        //this.authSuccess(data.id_token);
                        resolve(data)
                    },
                    err => {
                        this.error = err;
                        alert(err);
                        reject(err);
                    }
                );
	    });
    }

    getByFacebookId(credentials) {
 
        console.log('credenciales: '+JSON.stringify(credentials));
 		return new Promise((resolve, reject) => {
	        this.webserv.callAction('getUserByEmail',credentials)	            
	            .map(res => res.json())
                .subscribe(
                    data => { 
                    	console.log('getUserByEmail: '+data);
                        this.auth.authSuccess(data.id_token);
                        resolve(data)
                    },
                    err => {
                        this.error = err;
                        alert(err);
                    }
                );
	    });
    }

    updatePicture(foto) {
		return this.webserv.callAction('actualizar_foto',  { "user_id": localStorage.getItem('user_id'), "foto": foto})
	      .map(res => res.json());
	}  

	loadNotificaciones() {
		return this.webserv.callAction('getNotificaciones',  { "user_id": localStorage.getItem('user_id')})
	      .map(res => res.json());
	}
	

}