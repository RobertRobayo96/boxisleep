import { Component, OnInit, ElementRef, ViewChild } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { SubscriberService } from 'src/services/subscriber.service';
import { GeneralService } from 'src/services/general.service';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  constructor(
    private formBuilder: FormBuilder,
    private subscriberService: SubscriberService
  ) { }

  public form: FormGroup;
  public captchaKey = GeneralService.CAPTCHA_KEY;

  ngOnInit() {
    this.form = this.formBuilder.group({
      name: ['', Validators.required],
      email: ['', Validators.required],
      telephone: ['', Validators.required],
      course: ['', Validators.required],
      profession: ['', Validators.required],
      recaptcha: [null, Validators.required]
    });
  }

  resolved(captchaResponse: string) {
    console.log(`Resolved captcha with response: ${captchaResponse}`);
}

  insert() {
    let data = {
      "name": this.form.value.name,
      "email": this.form.value.email,
      "telephone": this.form.value.telephone,
      "profession": this.form.value.profession,
      "course": this.form.value.course,
      "recaptcha" : this.form.value.recaptcha
    };
    
    this.subscriberService.insert(data).subscribe(
      response => {
        GeneralService.MESSAGE("Suscrito correctamente", "success");
      },
      error => {
        GeneralService.MESSAGE("Usted ya se encuentra inscrito", "error");
        console.log(<any>error);
      }
    );
  }


}
