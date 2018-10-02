import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()

export class Webservice {
    //LOGIN_URL: string = "http://daps.local/Webservice";
    LOGIN_URL: string = "http://turnos.diegodaps.com/Webservice";
    //contentHeader: Headers = new Headers({"Content-Type": "application/json"});
    contentHeader: Headers = new Headers({"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"});


    constructor(public http: Http) {
      
    }

    callAction(action, params = null) {
 
 		if(!params){
 			params = {};
 		}
        //let headers = new Headers();
        //headers.append('Content-Type', 'application/json');
        //alert(action);
        return this.http.post(this.LOGIN_URL+'/'+action, JSON.stringify(params), {headers: this.contentHeader});

	    
    }

  

}