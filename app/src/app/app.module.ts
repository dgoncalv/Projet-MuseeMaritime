import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TitleComponent } from './title/title.component';
import { PictureComponent } from './picture/picture.component';
import { OpeningTimeComponent } from './opening-time/opening-time.component';
import { WeatherComponent } from './weather/weather.component';
import { ReactiveFormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { MapComponent } from './map/map.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { MenuComponent } from './menu/menu.component';
import { ImagesBateauxTitreComponent } from './images-bateaux-titre/images-bateaux-titre.component';
import { ListeBateauxComponent } from './liste-bateaux/liste-bateaux.component';
import { AccueilComponent } from './accueil/accueil.component';

const appRoutes: Routes = [
  { path: '', component: AccueilComponent},
  { path: 'bateaux', component: ListeBateauxComponent },
];

@NgModule({
  declarations: [
    AppComponent,
    TitleComponent,
    PictureComponent,
    OpeningTimeComponent,
    WeatherComponent,
    MapComponent,
    MenuComponent,
    ImagesBateauxTitreComponent,
    ListeBateauxComponent,
    AccueilComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule,
    RouterModule.forRoot(appRoutes),
    NgbModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
