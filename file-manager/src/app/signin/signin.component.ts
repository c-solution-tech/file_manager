import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { SigninService } from '../services/signin.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.css']
})
export class SigninComponent implements OnInit {

  formSignin: FormGroup
  constructor(private fb: FormBuilder, private signinService: SigninService) {
    this.formSignin = this.fb.group({
      username: ['', Validators.required],
      password: ['', Validators.required]
    })
   }

  ngOnInit(): void {
   
  }

  onSubmit(): void {
    this.signinService.signIn(this.formSignin.get("username")?.value, this.formSignin.get("password")?.value).subscribe((rs)=>{
      console.log(rs)
    })
  }
}
