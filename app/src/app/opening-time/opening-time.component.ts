import { Component, OnInit } from '@angular/core';
import { OpeningService} from '../opening.service';
import { Musee } from '../../modele/musee';
import { Observable, Subscribable } from 'rxjs';

@Component({
  selector: 'app-opening-time',
  templateUrl: './opening-time.component.html',
  styleUrls: ['./opening-time.component.css']
})
export class OpeningTimeComponent implements OnInit {
  theHoraire : Musee = {};
  open :boolean = true;

  constructor(private openingService : OpeningService) { }

  ngOnInit(): void {
    this.openingService.getHoraire().subscribe(data =>{
      this.theHoraire=data;
      if(this.theHoraire.horaireOuverture && this.theHoraire.horaireFermeture){
        let today = new Date();
        let min = new Date(this.theHoraire.horaireOuverture.getHours());
        let max = new Date(this.theHoraire.horaireFermeture.getHours());
                if (today.getTime() < min.getTime() && today.getTime() > max.getTime())
                {
                  this.open = false;
                }
      }

    } );
  }

}
