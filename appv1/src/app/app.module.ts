import { NgModule, ErrorHandler } from '@angular/core';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { AppVersion } from '@ionic-native/app-version';

import { HomePage } from '../pages/home/home';
import { Login } from '../pages/login/login';
import { LoginMail } from '../pages/loginmail/loginmail';
import { Servicios } from '../pages/servicios/servicios';
import { Coiffeurs } from '../pages/coiffeurs/coiffeurs';
import { Calendario } from '../pages/calendario/calendario';
import { Historial } from '../pages/historial/historial';
import { MisTurnos } from '../pages/misturnos/misturnos';
import { Notificaciones } from '../pages/notificaciones/notificaciones';
import { Perfil } from '../pages/perfil/perfil';
import { Confirmacion } from '../pages/confirmacion/confirmacion';
import { AuthService } from '../providers/auth-service';
import { UserService } from '../providers/user-service';
import { Webservice } from '../providers/webservice';
import { TurnosService } from '../providers/turnos-service';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { Historia } from '../pages/historia/historia';
import { Registro } from '../pages/registro/registro';
import { Olvido } from '../pages/olvido/olvido';
import { OneSignal } from '@ionic-native/onesignal';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { Camera, CameraOptions } from '@ionic-native/camera';
import { Facebook, FacebookLoginResponse } from '@ionic-native/facebook';
import { SafePipe } from '../pipes/SafePipe';

import { HttpModule } from '@angular/http';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    Servicios,
    Login,
    LoginMail,
    Coiffeurs,
    Calendario,
    Historial,
    MisTurnos,
    Notificaciones,
    Perfil,
    Confirmacion,
    Historia,
    Registro,
    Olvido,
    SafePipe,
  ],
  imports: [
    IonicModule.forRoot(MyApp), BrowserModule, FormsModule, HttpModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    Servicios,
    Login,
    LoginMail,
    Coiffeurs,
    Calendario,
    Historial,
    MisTurnos,
    Notificaciones,
    Perfil,
    Confirmacion,
    Historia,
    Registro,
    Olvido,
  ],
  providers: [{ provide: ErrorHandler,
                useClass: IonicErrorHandler},
                AuthService, UserService, TurnosService, Webservice, OneSignal, StatusBar, SplashScreen, Camera, Facebook, AppVersion]
})
export class AppModule {}
