import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { NgxPermissionsGuard } from 'ngx-permissions';
import { HomeComponent } from './start/home/home.component';
import { UnauthorizedComponent } from './components/unauthorized/unauthorized.component';
import { NotfoundComponent } from './components/notfound/notfound.component';

import { AboutUsComponent } from './us/about-us/about-us.component';

import { ProductComponent } from './product/product/product.component';
import { ProductDescriptionComponent } from './product/product-description/product-description.component';
import { ListProductComponent } from './product/list-product/list-product.component';

import { RegisterComponent } from './user/register/register.component';
import { LoginComponent } from './user/login/login.component';

import { BuyComponent } from './product/buy/buy.component';


const routes: Routes = [

  // Home
  { path:  '', component: HomeComponent },

  //About US
  { path:  'about-us', component: AboutUsComponent },

  //Product
  { path:  'product', component: ProductComponent },
  { path:  'product/description/:id', component: ProductDescriptionComponent },
  { path:  'product/all/:id', component: ListProductComponent },
  { path:  'product/buy/:id', component: BuyComponent },
  //User
  { path:  'user/register', component: RegisterComponent },
  { path:  'user/login', component: LoginComponent },
 
  { path:  '401', component: UnauthorizedComponent },
  { path:  '**', component: NotfoundComponent }
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
