<?php

namespace App\Controller;

use App\Entity\Bateau;
use App\Repository\BateauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

class BateauController extends AbstractController
{
    /**
     * @Rest\View(serializerGroups={"listeBateaux"})
     * @Rest\Get("/api/bateaux",
     *      name = "api_liste_bateaux",
     * )
     * @param BateauRepository $repository
     * @return Bateau[]
     */
    public function listeBateaux( BateauRepository $repository){
        $bateaux = $repository->findAll();
        return $bateaux;
    }

    /**
     * @Rest\View(serializerGroups={"listeBateaux"})
     * @Rest\Get ("/api/bateaux/{id}",
     *      name = "api_get_bateau",
     * )
     * @param Bateau $bateaux
     * @return Bateau
     */
    public function getBateau( Bateau $bateaux){
        return $bateaux;
    }



}
