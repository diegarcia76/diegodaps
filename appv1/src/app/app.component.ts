import { Component, ViewChild } from '@angular/core';
import { Nav, Platform, LoadingController, AlertController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { HomePage } from '../pages/home/home';
import { Login } from '../pages/login/login';
import { Historial } from '../pages/historial/historial';
import { MisTurnos } from '../pages/misturnos/misturnos';
import { Notificaciones } from '../pages/notificaciones/notificaciones';
import { Perfil } from '../pages/perfil/perfil';
import { AuthService } from '../providers/auth-service';
import { OneSignal } from '@ionic-native/onesignal';
import { AppVersion } from '@ionic-native/app-version';
import { TurnosService } from '../providers/turnos-service';


@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage: any;
  loader: any;
  appVersionNumber : any;
  appVersionCode : any;
  parte_hora_hoy:any;
  parte_fecha_hoy:any;
  fecha:any;

  pages: Array<{title: string, icono:string, component: any}>;

  constructor(public auth: AuthService,
              public platform: Platform,
              public loadingCtrl: LoadingController,
              public alertCtrl: AlertController, private oneSignal: OneSignal,
              private statusBar: StatusBar,
              private splashScreen: SplashScreen,
              public app: AppVersion,
              public turnosServ: TurnosService) {
          this.initializeApp();

    // used for an example of ngFor and navigation
    this.pages = [
      { title: 'Home', icono:'home', component: HomePage },
      { title: 'Mi Perfil', icono:'person', component: Perfil },
      { title: 'Historial', icono:'folder-open', component: Historial },
      { title: 'Mis Turnos', icono:'calendar', component: MisTurnos },
      { title: 'Notificaciones', icono:'notifications', component: Notificaciones },
      { title: 'Salir', icono:'exit', component: null },
    ];

    /*this.turnosServ.loadFechaActual().then(
          (success) => {                                   
            
            this.parte_hora_hoy = this.turnosServ.parte_hora_hoy;
            this.parte_fecha_hoy = this.turnosServ.parte_fecha_hoy;
      
          },
          (err) => console.log(err)
        );
    */
    /*this.appVersionNumber = this.app.getVersionNumber();
    this.appVersionCode = this.app.getVersionCode(); 

    //this.presentLoading();
    console.log('appVersionNumber: '+this.appVersionNumber);
    console.log('stringify: '+ JSON.stringify(this.appVersionNumber));*/

    this.getAppName();

    this.auth.authenticated().then((isLoggedIn) => {
      console.log('isLoggedIn: '+isLoggedIn);
      if (isLoggedIn){
        this.rootPage = HomePage;
      }else{
        this.rootPage = Login;
      }
      //this.loader.dismiss();
    }).catch(e => {console.log('Error al Iniciar ', e.errorMessage);
                    alert('Error al Iniciar '+e.errorMessage);
                    this.rootPage = Login;
                    });

  }

  async getAppName(){
    const versionNumber = await this.app.getVersionNumber();
    this.appVersionNumber = versionNumber
    console.log('versionNumber: '+versionNumber);
  }

  presentLoading() {
    this.loader = this.loadingCtrl.create({
      content: "Autenticando..."
    });
    this.loader.present();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      this.statusBar.styleDefault();
      setTimeout(() => {
        this.splashScreen.hide();
      }, 100);

      /*let push = Push.init({
        android: {
          senderID: "207646095916"
        },
        ios: {
          alert: "true",
          badge: false,
          sound: "true"
        },
        windows: {}
      });*/
      console.log('iniciando onesignal');
      this.oneSignal.startInit('b66208c3-187a-44a8-8be2-7a6b7eb15aed', '620576006749');
      this.oneSignal.inFocusDisplaying(this.oneSignal.OSInFocusDisplayOption.Notification);
      this.oneSignal.setSubscription(true);
      this.oneSignal.handleNotificationReceived().subscribe(() => {
        // handle received here how you wish.
      });
      this.oneSignal.handleNotificationOpened().subscribe(() => {
        // handle opened here how you wish.
      });
      this.oneSignal.getIds()
      .then((ids) =>
      {
         console.log('userId: ' + JSON.stringify(ids.userId));
         localStorage.setItem('playerId',ids.userId);
      });
      this.oneSignal.endInit();


    });
  }

  openPage(page) {
    // Reset the content nav to have just this page
    // we wouldn't want the back button to show in this scenario
    if(page.component)
      this.nav.setRoot(page.component);
    else{
      this.auth.logout();
      this.nav.setRoot(Login);
    }
  }


}
