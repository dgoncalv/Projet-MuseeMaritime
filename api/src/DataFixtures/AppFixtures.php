<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Musee;
use App\Entity\Bateau;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $musee = new Musee();
        $horaireOuvertureMusee = '9:00:00';
        $musee->setHoraireOuverture(new \DateTime($horaireOuvertureMusee));
        $horaireFermetureMusee = '18:00:00';
        $musee->setHoraireFermeture(new \DateTime($horaireFermetureMusee));
        $jourOuverture = '18:00:00';
        $musee->setJourFermeture("Lundi");
        $manager->persist($musee);

        $bateau1 = new Bateau();
        $bateau1->setNom("Angoumois");
        $bateau1->setHistorique("historique coucou");
        $horaireOuvertureBateau1 = '9:00:00';
        $bateau1->setHoraireOuverture(new \DateTime($horaireOuvertureBateau1));
        $horaireFermetureBateau1 = '18:00:00';
        $bateau1->setHoraireFermeture(new \DateTime($horaireFermetureBateau1));
        $bateau1->setLatitude(46.142025);
        $bateau1->setLongitude(-1.151187);
        $bateau1->setLargeur(8.35);
        $bateau1->setLongueur(38);
        $bateau1->setAnneeConstruction(1969);
        $bateau1->setCitation("citation");
        $bateau1->setAuteurCitation("JeanNémar");
        $bateau1->setJourFermeture("Lundi");
        $bateau1->setNbPersonneMax(10);
        $bateau1->setEstVisitable(true);
        $bateau1->setMusee($musee);
        $manager->persist($bateau1);

        $bateau2 = new Bateau();
        $bateau2->setNom("Capitaine de frégate Leverger");
        $bateau2->setHistorique("historique coucou");
        $bateau2->setLatitude(46.142025);
        $bateau2->setLongitude(-1.151187);
        $bateau2->setEstVisitable(false);
        $bateau2->setMusee($musee);
        $manager->persist($bateau2);

        $bateau3 = new Bateau();
        $bateau3->setNom("Drague à vapeur TD6");
        $bateau3->setHistorique("historique coucou");
        $horaireOuvertureBateau3 = '9:00:00';
        $bateau3->setHoraireOuverture(new \DateTime($horaireOuvertureBateau3));
        $horaireFermetureBateau3 = '18:00:00';
        $bateau3->setHoraireFermeture(new \DateTime($horaireFermetureBateau3));
        $bateau3->setLatitude(46.142025);
        $bateau3->setLongitude(-1.151187);
        $bateau3->setLongueur(42);
        $bateau3->setLargeur(10);
        $bateau3->setAnneeConstruction(1906);
        $bateau3->setCitation("citation");
        $bateau3->setAuteurCitation("JeanNémar");
        $bateau3->setJourFermeture("Lundi");
        $bateau3->setNbPersonneMax(10);
        $bateau3->setEstVisitable(true);
        $bateau3->setMusee($musee);
        $manager->persist($bateau3);

        $bateau4 = new Bateau();
        $bateau4->setNom("France 1");
        $bateau4->setHistorique("historique coucou");
        $horaireOuvertureBateau4 = '9:00:00';
        $bateau4->setHoraireOuverture(new \DateTime($horaireOuvertureBateau4));
        $horaireFermetureBateau4 = '18:00:00';
        $bateau4->setHoraireFermeture(new \DateTime($horaireFermetureBateau4));
        $bateau4->setLatitude(46.142025);
        $bateau4->setLongitude(-1.151187);
        $bateau4->setLongueur(76.2);
        $bateau4->setLargeur(12.5);
        $bateau4->setAnneeConstruction(1958);
        $bateau4->setCitation("citation");
        $bateau4->setAuteurCitation("JeanNémar");
        $bateau4->setJourFermeture("Lundi");
        $bateau4->setNbPersonneMax(10);
        $bateau4->setEstVisitable(true);
        $bateau4->setMusee($musee);
        $manager->persist($bateau4);






        $manager->flush();
    }
}
