import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PqrService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "pqr/";

  insert(data) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.post(this.url + "insert", data, {headers : headers}); 
  }


}
