import { Component, OnInit } from '@angular/core';
import { TrainingGridService } from 'src/services/training-grid.service';
import { ProductService } from 'src/services/product.service';
import { GeneralService } from 'src/services/general.service';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.scss']
})
export class ProductComponent implements OnInit {

  constructor(
    private productService : ProductService,
    private generalService : GeneralService
  ) { }
  
  public products : any = [];
  public categories : any = [];
  public selectedCategort : any = '';
  public imgUrl: any = GeneralService.IMG_URL ;

  ngOnInit() {
    this.listProducts();
  }

  filter(category){
    this.selectedCategort = category;
  }


  listProducts(){
    this.productService.all().subscribe(
  		response => {
        this.products = response;
       console.log(this.products);
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }

  listCategories(trainings){
    const categories = [... new Set(trainings.map(data => data.category))];
    this.categories = categories;
  }

}
