<?php

namespace App\Controller;

use App\Repository\SessionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeanceController extends AbstractController
{
    #[Route('/seances', name: 'seances', methods:['GET'])]
    public function listeFilms(SessionRepository $repo): Response
    {
        $seances=$repo->findAll();

        return $this->render('seance/listeSeances.html.twig', [
            'lesSeances' => $seances,
        ]);
    }
}
