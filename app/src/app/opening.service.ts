import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Musee } from '../modele/musee';

@Injectable({
  providedIn: 'root'
})
export class OpeningService {

  constructor(private http: HttpClient) {}

  getHoraire()
  {
    return this.http.get<Musee>('http://localhost:9999/api/musees');
  }
}
