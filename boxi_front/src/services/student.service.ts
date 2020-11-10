import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class StudentService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "student/";

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

  insert(data) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.post(this.url + "insert", data, {headers : headers}); 
  }

  login(data) : any
  {
    //const headers = GeneralService.HEADERS('application/json');
    return this.http.post(this.url + "login", data); 
  }

  update(data) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.put(this.url + "update", data, {headers : headers}); 
  }

  delete(id) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.delete(this.url + "delete/" + id, {headers : headers}); 
  }

}
