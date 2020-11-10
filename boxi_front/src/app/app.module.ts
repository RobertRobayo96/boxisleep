import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MonthNamePipe } from 'src/pipes/month-name.pipe';
import { HashLocationStrategy, LocationStrategy } from '@angular/common';
import { OwlModule } from 'ngx-owl-carousel';
import { CountUpModule } from 'countup.js-angular2';
import { FilterForPipe } from 'src/pipes/filterfor.pipe';
import { RecaptchaModule, RecaptchaFormsModule } from 'ng-recaptcha';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HomeComponent } from './start/home/home.component';
import { NotfoundComponent } from './components/notfound/notfound.component';
import { UnauthorizedComponent } from './components/unauthorized/unauthorized.component';

import { AboutUsComponent } from './us/about-us/about-us.component';

import { ProductComponent } from './product/product/product.component';
import { ProductDescriptionComponent } from './product/product-description/product-description.component';
import { ListProductComponent } from './product/list-product/list-product.component';

import { RegisterComponent } from './user/register/register.component';
import { LoginComponent } from './user/login/login.component';

import {NgxPaginationModule} from 'ngx-pagination';
import { SearchPipe } from 'src/pipes/search.pipe';
import { BuyComponent } from './product/buy/buy.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    NotfoundComponent,
    UnauthorizedComponent,
    MonthNamePipe,

    FilterForPipe,
    RegisterComponent,
    LoginComponent, 

    AboutUsComponent,
    SearchPipe,
    BuyComponent,
    ProductComponent,
    ProductDescriptionComponent,
    ListProductComponent
    
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    OwlModule,
    CountUpModule,
    RecaptchaFormsModule,
    NgxPaginationModule,
    RecaptchaModule.forRoot()
  ],
  providers: [
    { 
      provide: {LocationStrategy}, 
      useClass: HashLocationStrategy
    },
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
