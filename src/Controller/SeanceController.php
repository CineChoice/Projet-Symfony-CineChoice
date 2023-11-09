<?php

namespace App\Controller;

use App\Repository\SessionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeanceController extends AbstractController
{
    
    /*public function listeFilms(SessionRepository $repo): Response
    {
        $seances=$repo->findAll();

        return $this->render('seance/listeSeances.html.twig', [
            'lesSeances' => $seances,
        ]);
    }*/

    #[Route('/seances', name: 'seances', methods:['GET'])]
    public function listeSeances (SessionRepository $repo, PaginatorInterface $paginator, Request $request) : Response
    {
        $seances = $paginator->paginate(
            $repo->listeSeancesComplete(),
            $request->query->getInt('page', 1), 
            9
        );

        return $this->render('seance/listeSeances.html.twig', [
            'lesSeances' => $seances
        ]);
    }
}
