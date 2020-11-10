import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ContentService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "content/";

  all(): any 
  {
    const headers = new HttpHeaders('application/json');
  	return this.http.get(this.url + "all", {headers : headers}); 
  }

  get(id) : any
  {
    const headers = new HttpHeaders('application/json');
    return this.http.get(this.url + "get/" + id, {headers : headers}); 
  }

  getByType(type) : any
  {
    const headers = new HttpHeaders('application/json');
    return this.http.get(this.url + "getbytype/" + type, {headers : headers}); 
  }

  insert(data) : any
  {
    const headers = new HttpHeaders('application/json');
    return this.http.post(this.url + "insert", data, {headers : headers}); 
  }

  update(data) : any
  {
    const headers = new HttpHeaders('application/json');
    return this.http.put(this.url + "update", data, {headers : headers}); 
  }

  delete(id) : any
  {
    const headers = new HttpHeaders('application/json');
    return this.http.delete(this.url + "delete/" + id, {headers : headers}); 
  }

}
