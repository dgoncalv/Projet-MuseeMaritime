import { Bateau } from '../modele/bateau';

export interface Reservation{
    id : number;
    nbPersonneMax : string;
    nom : string
    prenom : string;
    date : Date;
    horaire : Date;
    telCli : string;
    bateau : Bateau[];
}