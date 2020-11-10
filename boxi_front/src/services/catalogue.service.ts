import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CatalogueService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "catalogue/";

  getbytype(type): any 
  {
    const headers = GeneralService.HEADERS('application/json');
  	return this.http.get(this.url + "getbytype/" + type, {headers : headers}); 
  }

}
