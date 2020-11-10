
import { Injectable } from '@angular/core';
import { GeneralService } from './general.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class BlogService {

  constructor(
    private http : HttpClient
  ) { }

  public url = 'http://eysglobal.com/apis/news.php';//any = GeneralService.WS_URL + "instructor/";

  all(): any 
  {
    //const headers = GeneralService.HEADERS('application/json');
  	return this.http.get(this.url); 
  }



}
