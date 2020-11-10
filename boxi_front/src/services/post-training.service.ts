import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PostTrainingService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "posttraining/";

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

  getByMonth(month){
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "getbymonth/" + month, {headers : headers}); 
  }

  getByInstructor(instructor){
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "getbymonth/" + instructor, {headers : headers}); 
  }


}
