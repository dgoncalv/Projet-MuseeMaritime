import { Component, OnInit } from '@angular/core';
import { BateauxService} from '../bateaux.service';
import { Bateau } from '../../modele/bateau';
import { Observable, Subscribable } from 'rxjs';

@Component({
  selector: 'app-images-bateaux-titre',
  templateUrl: './images-bateaux-titre.component.html',
  styleUrls: ['./images-bateaux-titre.component.css']
})
export class ImagesBateauxTitreComponent implements OnInit {

  public theBateau: BateauxService[] = [];
  constructor(private bateauxService: BateauxService) { }

  ngOnInit(): void {
    this.bateauxService.getBateau().then(data => {
      this.theBateau.push(data);
    });
  }
}
