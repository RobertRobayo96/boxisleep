import { Component, OnInit } from '@angular/core';
import { GeneralService } from 'src/services/general.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  constructor() { }

  public userinfo : any = JSON.parse ( GeneralService.USER_INFO );

  ngOnInit() {


  }

  logout(){
    localStorage.removeItem("userinfo");
    window.location.href = "";
  }

}
