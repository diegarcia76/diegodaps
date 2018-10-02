import { Component } from '@angular/core';
import { NavController, AlertController, NavParams } from 'ionic-angular';
//import { FormControl, FormGroup } from '@angular/forms';

//import { User } from '../../_models/user';
import { Camera, CameraOptions } from '@ionic-native/camera';
import { Profesion } from '../../_models/profesion';

import { UserService } from '../../providers/user-service';
import { AuthService } from '../../providers/auth-service';
import { LoadingController } from 'ionic-angular';
import { HomePage } from '../home/home';

/*
  Generated class for the Perfil page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-perfil',
  templateUrl: 'perfil.html'
})
export class Perfil /*implements OnInit*/ {

	public userActual : any// : User
	profesiones : Profesion[]
    myDate: String
    loadingPopup:any;
    public base64: string

    /*user: FormGroup;

    ngOnInit() {
        this.user = new FormGroup({
                        nombre: new FormControl(''),
                        email: new FormControl(''),
                        telefono: new FormControl(''),
                        whatsapp: new FormControl(''),
                        facebook: new FormControl(''),
                        twitter: new FormControl(''),
                    });
    }*/

    constructor(public navCtrl: NavController,
                public navParams: NavParams,
  					    public userService:UserService,
                public auth: AuthService,
                public loadingCtrl: LoadingController,
                      public alertCtrl: AlertController,
                      private camera: Camera) {


    }

    presentAlert(msg) {
      let alert = this.alertCtrl.create({
        title: 'Perfil',
        subTitle: msg,
        buttons: ['Cerrar']
      });
      alert.present();
    }

	ionViewDidLoad() {
		console.log('ionViewDidLoad PerfilPage');
    // Create the popup
    this.loadingPopup = this.loadingCtrl.create({
      content: 'Cargando...'
    });

    this.loadingPopup.present();
    console.log('dentro de perfil');
    this.userService.load()
      .subscribe(user => {
            console.log('trae user: '+user+ ' / '+user.nombre);
            this.userActual = user;
            if(user.fecha_nacimiento){
              var parts = user.fecha_nacimiento.split('/');
              //alert(parts[2]+'-'+parts[1]+'-'+parts[0]);
              let fecha_formateada = parts[2]+'-'+parts[1]+'-'+parts[0];
              let f_nac = new Date(fecha_formateada).toISOString().substring(0,10);
              //alert('fecha_ naco: '+f_nac);
              this.myDate = f_nac;
            }
            this.loadingPopup.dismiss();
          //console.log(user);
      })

    this.userService.loadProfesiones()
      .subscribe(profesiones => {
        this.profesiones = profesiones;
          //console.log(profesiones)
      })

	}

    /*onSubmit({ value, valid }: { value: User, valid: boolean }) {
        console.log(value, valid);
    }*/

    updateUser(user) {
  		//alert(JSON.stringify(user));
      if(user.telefono != ''){
        this.userService.updateUser(user).then(
          (success) => {
            //alert('Se actualizaron los datos');
            //this.presentAlert('Se actualizaron los datos');
            this.navCtrl.setRoot(HomePage);
            this.auth.user = user.nombre;
          },
          (err) => console.log(err)
        );
      }else{
        this.presentAlert('Ingresá tu teléfono');
      }

    }

    onChangeProfesion(newValue) {
        //console.log(newValue);
        this.userActual.profesion_id = newValue;  // don't forget to update the model here
        // ... do other stuff here ...
    }


    presentAlert2() {
      let alert = this.alertCtrl.create({
        title: 'Low battery',
        subTitle: '<div class="form" text-center><ion-list padding-right padding-vertical><ion-item (click)="takePicture(CAMERA)">Cámara</ion-item><ion-item (click)="takePicture(Galeria)">Galería de Imagenes</ion-item></ion-list></div>',
        buttons: ['Cancel']
      });
      alert.present();
    }

    takePicture(origen){

      this.loadingPopup = this.loadingCtrl.create({
        content: 'Actualizando Foto...'
      });

      this.loadingPopup.present();

      let source:any;
      if(origen == 'CAMERA'){
        source = this.camera.PictureSourceType.CAMERA;
      }else{
        source = this.camera.PictureSourceType.PHOTOLIBRARY;
      }

      this.camera.getPicture({
        destinationType: this.camera.DestinationType.DATA_URL,
        sourceType : source,
        targetWidth: 720,
        encodingType: this.camera.EncodingType.JPEG,
        //targetHeight: 1000,
        correctOrientation: true
        }).then((imageData) => {
           // imageData is either a base64 encoded string or a file URI
           // If it's base64:
           let base64Image = imageData;
           //alert(base64Image);
           console.log('foto: ' + base64Image);
           this.userService.updatePicture(base64Image)
              .subscribe(user => {
                  this.auth.foto = user.foto;
                  //console.log(user.foto);
                  //alert(user.foto);
                  },
                  err => {
                      console.log(err);
                  },
                  () => {this.loadingPopup.dismiss();}
            )

      }, (err) => {
       // Handle error
       this.loadingPopup.dismiss();
      });


    }

}
