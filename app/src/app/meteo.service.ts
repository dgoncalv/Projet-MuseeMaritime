import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Meteo } from '../modele/meteo';

@Injectable({
  providedIn: 'root'
}
)
export class MeteoService {

  constructor(
    private http: HttpClient) { }

    getMeteo(){
      return this.http.get<Meteo>('https://api.openweathermap.org/data/2.5/weather?q=rochelle&lang=fr&APPID=bfd50b8af5e81051af4e660d70e11fc0').toPromise();
    }
}
