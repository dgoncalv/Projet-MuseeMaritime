import { Component, OnInit } from '@angular/core';
import { MeteoService } from '../meteo.service';
import { Meteo } from '../../modele/meteo';
import { Observable, Subscribable } from 'rxjs';

@Component({
  selector: 'app-weather',
  templateUrl: './weather.component.html',
  styleUrls: ['./weather.component.css']
})
export class WeatherComponent implements OnInit {
  theMeteo: Meteo[] = [];

  constructor(private meteoService: MeteoService) { }

  ngOnInit(): void
  {
    this.meteoService.getMeteo().then(data => {
      this.theMeteo.push(data);
    });
  }

}
