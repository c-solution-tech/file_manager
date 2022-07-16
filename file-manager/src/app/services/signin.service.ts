import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class SigninService {

  constructor(private http: HttpClient) { }

  signIn(username: String, password: String):Observable<JSON> {
    return this.http.post<JSON>(`${environment.apiURL}/users`, {"name": "sign", "param": {"username": username, "password": password}})
  }
}
