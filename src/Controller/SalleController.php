<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalleController extends AbstractController
{
    #[Route('/salles', name: 'salles', methods:['GET'])]

    public function listeSalles (RoomRepository $repo) : Response
    {
        $salles = $repo->findAll();
        return $this->render('salle/listeSalles.html.twig',[
            'lesSalles' => $salles,
        ]);
    }
}
