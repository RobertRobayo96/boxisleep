import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ProductService } from 'src/services/product.service';
import * as $ from 'jquery';
import { GeneralService } from 'src/services/general.service';
import * as CryptoJS from 'crypto-js';
import { ProductSkuService } from 'src/services/product-sku.service';
import { ProductUserService } from 'src/services/product-user.service';


@Component({
  selector: 'app-buy',
  templateUrl: './buy.component.html',
  styleUrls: ['./buy.component.scss']
})
export class BuyComponent implements OnInit {

  constructor(
    private route: ActivatedRoute,
    private productService: ProductService,
    private productSkuService : ProductSkuService,
    private productUserService: ProductUserService
  ) { }

  public id: any = null;
  public product; productsSku: any = null;
  public payu: any = GeneralService.PAYU_CONFIG;
  public signature: any = null;
  public userinfo: any = JSON.parse(GeneralService.USER_INFO);
  public reference : any = null;


  ngOnInit() {
    this.id = this.route.snapshot.paramMap.get('id');
    this.get(this.id);
  
  }

  get(id) {
    this.productService.get(id).subscribe(
      response => {
        this.product = response;
        console.log(this.product);
        let price : any = this.product.price
        this.getSkuByProduct(this.product.id);
      },
      error => {
        console.log(<any>error);
      }
    );
  }

  getSkuByProduct(id) {
    this.productSkuService.getByProduct(id).subscribe(
      response => {
        this.productsSku = response;
        console.log(this.productsSku);
        let price : any = this.productsSku.sku.listPrice;
        console.log(price);
      },
      error => {
        console.log(<any>error);
      }
    );
  }

  registerPay() {
    let data = {
      'product':this.product.id,
      'user':this.userinfo.id
    }
    console.log(data);
    this.productUserService.insert(data).subscribe(
      response => {
        GeneralService.MESSAGE("Producto Adquirido", "success");
      },
      error => {
        console.log(<any>error);
      }
    );
   

  }

}
