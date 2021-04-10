import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ListeBateauxComponent } from './liste-bateaux/liste-bateaux.component';
import {AccueilComponent} from './accueil/accueil.component';

const routes: Routes = [
  { path: '', component: AccueilComponent},
  { path: 'bateaux', component: ListeBateauxComponent }
  ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
