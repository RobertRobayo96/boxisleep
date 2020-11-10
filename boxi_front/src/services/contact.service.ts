import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ContactService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "contact/";

  send(data) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.post(this.url + "send", data, {headers : headers}); 
  }


}
