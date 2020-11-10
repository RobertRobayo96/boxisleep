import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { GeneralService } from 'src/services/general.service';
import { ProductService } from 'src/services/product.service';

@Component({
  selector: 'app-product-description',
  templateUrl: './product-description.component.html',
  styleUrls: ['./product-description.component.scss']
})
export class ProductDescriptionComponent implements OnInit {

  constructor(
    private productService : ProductService,
    private route : ActivatedRoute,
    private router: Router
  ) { }

  public id : any = null;
  public product : any = null;
  public imgUrl: any = GeneralService.IMG_URL;
  public post: any = null;
  public carouselOptions : any = GeneralService.CAROUSEL_OPTIONS;

  ngOnInit() {
    this.id = this.route.snapshot.paramMap.get('id');
    this.get(this.id);
  }

  selPost(post){
    this.post = post;
  }

  get(id){
    this.productService.get(id).subscribe(
  		response => {
        this.product = response;
        console.log(this.product)
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }

  lower(qry){return qry.toLowerCase();}

  splitStr(str){
    return str.split("$");
  }

  comprar(id){
    let user = GeneralService.USER_INFO;
    if(user == null){
      localStorage.setItem('selectedproduct', id);
      this.router.navigate(['/user/register']);
    }else{
      localStorage.removeItem('selectedproduct');
      this.router.navigate(['/product/buy/' + id]);
    }
    
  }

}
