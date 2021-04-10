import { Bateau } from '../modele/bateau';

export interface Musee{
    id?                     : number;
    horaireOuverture?       : Date;
    horaireFermeture?       : Date;
    bateaux?                : Bateau[];
    jourFermeture?          : string;
}
