<?php

namespace App\Controller\Admin;

use App\Repository\SessionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeanceController extends AbstractController
{
    #[Route('/admin/seances', name: 'admin_seances', methods:['GET'])]
    public function listeSeances(SessionRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $seances = $paginator->paginate(
            $repo->listeSeancesCompleteAdmin(),
            $request->query->getInt('page', 1), 
            9
        );

        return $this->render('admin/seance/listeSeances.html.twig', [
            'lesSeances' => $seances
        ]);
    }

    /*public function listeSeances(SessionRepository $repo): Response
    {
        $seances = $repo->findAll();
        return $this->render('admin/seance/listeSeances.html.twig', ['lesSeances' => $seances,
        ]);
    }
    /*public function index(): Response
    {
        return $this->render('admin/seance/index.html.twig', [
            'controller_name' => 'SeanceController',
        ]);
    }
    */
}
