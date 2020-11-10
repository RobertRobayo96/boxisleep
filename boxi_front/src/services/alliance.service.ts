import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AllianceService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "alliance/";

  all(): any 
  {
    const headers = GeneralService.HEADERS('application/json');
  	return this.http.get(this.url + "all", {headers : headers}); 
  }

  get(id) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "get/" + id, {headers : headers}); 
  }


}
