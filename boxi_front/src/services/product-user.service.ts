import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProductUserService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "productuser/";

  all(): any 
  {
    const headers = GeneralService.HEADERS(null);
  	return this.http.get(this.url + "all", {headers : headers}); 
  }

  get(id) : any
  {
    const headers = GeneralService.HEADERS(null);
    return this.http.get(this.url + "get/" + id, {headers : headers}); 
  }

  getByUser(id) : any
  {
    const headers = GeneralService.HEADERS(null);
    return this.http.get(this.url + "getbyuser/" + id, {headers : headers}); 
  }

  insert(data) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.post(this.url + "insert", data, {headers : headers}); 
  }



}
