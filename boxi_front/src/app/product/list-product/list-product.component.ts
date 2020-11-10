import { Component, OnInit } from '@angular/core';
import { GeneralService } from 'src/services/general.service';
import { ProductUserService } from 'src/services/product-user.service';

@Component({
  selector: 'app-list-product',
  templateUrl: './list-product.component.html',
  styleUrls: ['./list-product.component.scss']
})
export class ListProductComponent implements OnInit {

  constructor(
    private productUserService : ProductUserService
  ) { }

  public productsUser : any = [];
  public userInfo : any = JSON.parse(GeneralService.USER_INFO);
  public product : any = null;

  ngOnInit() {
    this.listProducts(this.userInfo['id']);
  }

  modal(t){
    this.product = t['post'];
  }

  listProducts(user){
    this.productUserService.getByUser(user).subscribe(
  		response => {
        this.productsUser = response;
        console.log(this.productsUser)
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }

}
