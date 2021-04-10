<?php

namespace App\Controller;

use App\Entity\Musee;
use App\Repository\MuseeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

class MuseeController extends AbstractController
{
    /**
     * @Rest\View(serializerGroups={"infoMusee"})
     * @Rest\Get("/api/musees",
     *      name = "api_liste_musee",
     * )
     * @param MuseeRepository $repository
     * @return Musee[]
     */
    public function getMusees( MuseeRepository $repository){
        $musees = $repository->findAll();
        return $musees;
    }

    /**
     * @Rest\View(serializerGroups={"infoMusee"})
     * @Rest\Get ("/api/musees/{id}",
     *      name = "api_get_musees",
     * )
     * @param Musee $musees
     * @return Musee
     */
    public function getMusee( Musee $musees){
        return $musees;
    }
}