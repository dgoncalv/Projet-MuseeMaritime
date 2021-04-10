import { Musee } from '../modele/musee';
import { Reservation } from '../modele/reservation';

export interface Bateau{
    id                  : number;
    nom                 : string;
    historique          : string;
    horaireOverture     : Date;
    horaireFermeture    : Date;
    latitude            : number;
    longitude           : number;
    citation            : string;
    auteurCitation      : string;
    jourFermeture       : string;
    nbPersonneMax       : number
    reservation         : Reservation;
    musee               : Musee;
}