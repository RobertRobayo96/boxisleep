import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { StudentService } from 'src/services/student.service';
import { GeneralService } from 'src/services/general.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  constructor(
    private formBuilder: FormBuilder,
    private studentService : StudentService,
    private router: Router,

  ) { }

  public form: FormGroup;
  public captchaKey = GeneralService.CAPTCHA_KEY;

  ngOnInit() {
    this.form = this.formBuilder.group({
      name: ['', Validators.required],
      email: ['', Validators.required],
      phone: ['', Validators.required],
      password: ['', Validators.required],
      rpassword: [null, Validators.required],
      //recaptcha: [null, Validators.required]
    });
  }

  insert() {

    if(this.form.value.password != this.form.value.rpassword){
      GeneralService.MESSAGE("Las contraseñas no conciden", "error");
      return;
    }

    if(this.form.value.password.length < 6){
      GeneralService.MESSAGE("La contraseña debe ser mayor a 6 caracteres", "error");
      return;
    }

    let data = {
      "name": this.form.value.name,
      "email": this.form.value.email,
      "phone": this.form.value.phone,
      "password": this.form.value.password,
      //"recaptcha" : this.form.value.recaptcha
    };
    this.studentService.insert(data).subscribe(
      response => {
        let msg = "Registro exitoso, por favor ingresar a la plataforma"; 
        GeneralService.MESSAGE(msg, "success");
        localStorage.setItem('userinfo', JSON.stringify(response));
        //this.router.navigate(['/student/login']);
      },
      error => {
        GeneralService.MESSAGE("El usuario ya existe", "error");
        console.log(<any>error);
      }
    );

  }

}
