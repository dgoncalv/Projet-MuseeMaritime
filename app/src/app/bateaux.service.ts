import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Bateau } from '../modele/bateau';

@Injectable({
    providedIn: 'root'
  }
)
export class BateauxService {

  constructor(
    private http: HttpClient) { }

  getBateau(){
    return this.http.get<BateauxService>('http://localhost:9999/api/bateaux/').toPromise();
  }
}
