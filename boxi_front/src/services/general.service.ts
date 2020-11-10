import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import Swal from 'sweetalert2'
import * as CryptoJS from 'crypto-js';

@Injectable({
  providedIn: 'root'
})
export class GeneralService {

  constructor(
  ) { }

  public static WS_URL: string = "http://localhost/boxisleep/boxi_back/public/index.php/ws/";
  public static IMG_URL : string = "http://localhost/boxisleep/boxi_back/public/uploads/products";
  public static LOGIN_STATUS : any = localStorage.getItem('loginstatus');

  public static CAPTCHA_KEY = "6LeiY8QUAAAAAKkcrPCh1MDm-SRoOcR_pXjJvn-o";

  public static USER_INFO = localStorage.getItem('userinfo');

  public static SELECTED_TRAINING = localStorage.getItem('selectedtraining');

  public static PAYU_CONFIG : any = {
    api : '4Vj8eK4rloUd272L48hsrarnUA',
    url : 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu',
    responseUrl : 'http://localhost:4200/training/buy/response',
    confirmationUrl : 'http://localhost/cms-back/public/ws/pay/pay',
    merchantId : 508029,
    accountId : 512326,
    currency : 'USD'
  };

  public static HEADERS(contenttype: any): any {
    let json;
    if (contenttype == null) {
      json = {
        'Content-Type': 'multipart/formdata'
      };
    } else {
      json = {
        'Content-Type': contenttype
      };
    }
    return json;
  }

  public static CONFIRMATION(): any 
  {
    const observable = new Observable(observer => {
      Swal.fire({
        title: '¿Está seguro?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: '¡Cancelar!',
        confirmButtonText: '¡Confirmar!'
      }).then((result) => {
        if (result.value) {
          observer.next(true);
        }
      });
    });
    return observable;
  }

  public static SIGNATURE(value , reference){
    let sign = this.PAYU_CONFIG['api'] + "~" 
    + this.PAYU_CONFIG['merchantId'] + "~"
    + reference + "~" 
    + value +  "~" 
    + this.PAYU_CONFIG['currency'];
    let str = CryptoJS.MD5(sign).toString();
    return str;
  }

  public static MESSAGE(msg, type) 
  {
    let title = "Mensaje";
    if (type == "success")
      title = "!Buen trabajo!"
    else
      title = "Error"

    Swal.fire(
      title,
      msg,
      type
    );
  }

  public static EMAIL_VAL(mail) 
  {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
    {
      return (true);
    }else{
      return (false);
    }
  }


  public static CAROUSEL_OPTIONS : any = {
    dots: false, 
    navigation: false,
    responsive: {
      0: {items: 1},
      600: {items: 2},
      1000: { items: 3 }
    }
  };
  


}
