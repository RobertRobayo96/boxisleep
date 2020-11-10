import { Component, OnInit } from '@angular/core';
import { GeneralService } from 'src/services/general.service';
import { Validators, FormGroup, FormBuilder } from '@angular/forms';
import { UserService } from 'src/services/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  constructor(
    private formBuilder: FormBuilder,
    private userService : UserService,
    private router: Router,
  ) { }

  public form: FormGroup;
  public captchaKey = GeneralService.CAPTCHA_KEY;

  ngOnInit() {
    this.form = this.formBuilder.group({
      username: ['', Validators.required],
      password: ['', Validators.required],
      //recaptcha: [null, Validators.required]
    });
  }

  login() {

    let data = {
      "username": this.form.value.username,
      "password": this.form.value.password,
      //"recaptcha" : this.form.value.recaptcha
    };
    console.log(data);
    this.userService.login(data).subscribe(
      response => {
        let msg = "Ingreso correcto"; 
        GeneralService.MESSAGE(msg, "success");
        localStorage.setItem('userinfo', JSON.stringify(response));
        this.router.navigate(['/student/course/' + response['id']]);
      },
      error => {
        GeneralService.MESSAGE("Verificar credenciales de acceso", "error");
        console.log(<any>error);
        
      }
    );

  }
}
