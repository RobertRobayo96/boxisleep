import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TrainingService {

  constructor(
    private http : HttpClient
  ) { }

  public url : any = GeneralService.WS_URL + "training/";

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

  getImportants(){
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "getimportant", {headers : headers}); 
  }

  getAllCategory() : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "getallcategory", {headers : headers}); 
  }

  getAllSubCategory(category) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "getallsubcategory/" + category, {headers : headers}); 
  }

  getAllVendor(subcategory) : any
  {
    const headers = GeneralService.HEADERS('application/json');
    return this.http.get(this.url + "getallvendor/" + subcategory, {headers : headers}); 
  }


}
