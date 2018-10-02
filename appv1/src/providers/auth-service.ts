import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { LoadingController, AlertController } from 'ionic-angular';
//import { Storage } from '@ionic/storage';
import { JwtHelper, tokenNotExpired} from 'angular2-jwt';
import 'rxjs/add/operator/map';
import { Webservice } from '../providers/webservice';


@Injectable()

export class AuthService {
    //LOGIN_URL: string = "http://daps.local/Webservice";
    LOGIN_URL: string = "http://turnos.diegodaps.com/Webservice";
    //contentHeader: Headers = new Headers({"Content-Type": "application/json"});
    contentHeader: Headers = new Headers({"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"});
    //local: Storage = new Storage();
    jwtHelper: JwtHelper = new JwtHelper();
    id: string;
    user: string;
    foto: string;
    puntos: string;
    public error: string;
    token: string;
    loadingPopup:any;

    constructor(public http: Http, public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController,
                      public webserv: Webservice) {
        //let token = localStorage.getItem('id_token');
        //this.local.get('id_token').then(token => {
        //      this.token = token;
        //});

        // Create the popup
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });
        //this.loadingPopup.present();
        //this.logout();
        //console.log('token: '+this.token);
        /*if (this.authenticated) {            
            this.user = localStorage.getItem('nombre');
            this.foto = localStorage.getItem('foto');
            this.token = localStorage.getItem('id_token');
            this.puntos = localStorage.getItem('puntos');
            this.id = localStorage.getItem('id');
            //console.log('token: '+this.token);
            //alert(this.user);
        }else{
            this.puntos = "0";
        }*/

    }

    presentAlert() {
        let alert = this.alertCtrl.create({
          title: 'Registro',
          subTitle: '<h4>Excelente!</h4>Se ha enviado un email a tu correo con las instrucciones para activarlo. Revisa tus correos no deseados, puede que llegue ahí.',
          buttons: ['Cerrar']
        });
        alert.present();
    }

    presentAlertOlvido() {
        let alert = this.alertCtrl.create({
          title: 'Recuperar tu contraseña',
          subTitle: '¡Todo listo! ya recuperaste tu contraseña. Te enviamos un correo electrónico explicándote como seguir.',
          buttons: ['Cerrar']
        });
        alert.present();
    }

    presentAlertExiste(msg) {
        let alert = this.alertCtrl.create({
          title: 'Registro',
          subTitle: msg,
          buttons: ['Cerrar']
        });
        alert.present();
    }

    presentAlertGeneral(msj) {
        let alert = this.alertCtrl.create({
          title: 'Error',
          subTitle: msj,
          buttons: ['Cerrar']
        });
        alert.present();
    }
    
    authenticated() {

        return new Promise((resolve, reject) => {
            //console.log('authenticated token: '+localStorage.getItem('id_token'));
            //let resp = tokenNotExpired('id_token', localStorage.getItem('id_token'));
            
            let resp = tokenNotExpired(localStorage.getItem('id_token'));
            //let resp = tokenNotExpired();
            //console.log('resp: '+localStorage.getItem('id_token'));
            console.log('hola')
            console.log('resp: '+resp+' / id_token: '+localStorage.getItem('id_token'));
            if(resp){
                console.log('resp ,.....'+resp);
                this.authSuccess(localStorage.getItem('id_token'));
            }else{
                //generar token nuevo    
                console.log('chauuu');
                if(localStorage.getItem('user_id')){
                    resp = true;
                    this.loadingPopup = this.loadingCtrl.create({
                      content: 'Autenticando...'
                    });
                    console.log('authenticated ,.....');
                    this.loadingPopup.present();
                    this.webserv.callAction('reGenerarToken', {'user_id': localStorage.getItem('user_id')})
                        .map(res => res.json())
                        .subscribe(
                            data => {
                                console.log('data.status: '+data.status);
                                if(!data.status){
                                    this.error = data.message;
                                    this.presentAlertGeneral(data.message);
                                    //reject(this.error)
                                    resolve(false);
                                }else{
                                    //alert('as');
                                    this.authSuccess(data.id_token);
                                    resolve(true);
                                }                        
                                // Show the popup                        
                            },
                            err => {
                                    this.loadingPopup.dismiss();
                                    alert('data.status error; '+err);
                                    resolve(false);
                                    },
                            () => {this.loadingPopup.dismiss();}
                        );
                }else{
                    resolve(false);
                }
            }
            
        });
    }

    login(credentials) {
    	//alert(JSON.stringify(credentials));
        // Show the popup
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });
        this.loadingPopup.present();
        return new Promise((resolve, reject) => {
            //this.http.post(this.LOGIN_URL+'/checklogin', JSON.stringify(credentials), { headers: this.contentHeader })
            this.webserv.callAction('checklogin', credentials)
                .map(res => res.json())
                .subscribe(
                    data => {
                        //alert(data.status);
                        if(!data.status){
                            this.error = data.message;
                            this.presentAlertGeneral(data.message);
                            //reject(this.error)
                        }else{
                            //alert('as');
                            this.authSuccess(data.id_token);
                            resolve(data);
                        }                        
                        // Show the popup                        
                    },
                    err => {
                            //this.loadingPopup.dismiss();
                            alert(err);
                            reject(err);
                            this.loadingPopup.dismiss();
                            },
                    () => {this.loadingPopup.dismiss();}
                );
        });
    }

    olvidoPass(credentials) {
        //alert(JSON.stringify(credentials));
        // Show the popup
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });
        this.loadingPopup.present();
        return new Promise((resolve, reject) => {
            //this.http.post(this.LOGIN_URL+'/olvidopass', JSON.stringify(credentials), { headers: this.contentHeader })
            this.webserv.callAction('olvidopass', credentials)
                .map(res => res.json())
                .subscribe(
                    data => {
                        //alert(data.status);
                        if(!data.status){                            
                            //reject(this.error)
                            this.presentAlertGeneral(data.message);
                        }else{
                            this.presentAlertOlvido();
                            resolve(data);   
                        }                        
                    },
                    err => {         
                            alert(err);        
                            reject(err);
                            this.loadingPopup.dismiss();
                            },
                    () => {this.loadingPopup.dismiss();}
                );
        });
    }

    registroUser(credentials) {
        //alert(JSON.stringify(credentials));
        this.loadingPopup = this.loadingCtrl.create({
          content: 'Cargando...'
        });
        this.loadingPopup.present();
        return new Promise((resolve, reject) => {
            //this.http.post(this.LOGIN_URL+'/registro', JSON.stringify(credentials), { headers: this.contentHeader })
            this.webserv.callAction('registro', credentials)
                .map(res => res.json())
                .subscribe(
                    data => {
                        //alert(data.status);
                        if(!data.status){
                            //this.error = data.message;
                            this.presentAlertExiste(data.message);
                            //reject(this.error)
                        }else{
                            this.presentAlert();
                            resolve(data);
                        }

                    },
                    err => {
                            alert(err);
                            reject(err);                            
                            this.loadingPopup.dismiss();
                            },
                    () => {this.loadingPopup.dismiss();}
                );
        });
    }

    logout() {
        //this.local.remove('id_token');
        this.user = null;
        this.foto = null;
        this.puntos = null;
        this.token = null;
        this.id = null;
        localStorage.removeItem('user_id');
        localStorage.removeItem('foto');
        localStorage.removeItem('user');
        localStorage.removeItem('id_token');
        localStorage.removeItem('puntos');
        console.log('logout');
    }

    authSuccess(token) {
        this.error = null;
        //this.local.set('id_token', token);        
        this.user = this.jwtHelper.decodeToken(token).data.nombre;
        this.foto = this.jwtHelper.decodeToken(token).data.foto;
        this.puntos = this.jwtHelper.decodeToken(token).data.puntos;
        this.id = this.jwtHelper.decodeToken(token).data.id;
        localStorage.setItem('id_token', token);
        localStorage.setItem('user_id', this.id);
        localStorage.setItem('foto', this.foto);
        localStorage.setItem('user', this.user);
        localStorage.setItem('puntos', this.puntos);
        console.log('foto: '+this.foto);
        //this.local.set('id_cliente', this.jwtHelper.decodeToken(token).data.id);
        //this.foto = this.jwtHelper.decodeToken(token).data.foto;
        //this.user = this.jwtHelper.decodeToken(token).name;
        //alert(this.foto);
    }

}