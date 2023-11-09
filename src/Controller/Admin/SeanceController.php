<?php

namespace App\Controller\Admin;

use App\Repository\SessionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeanceController extends AbstractController
{
    #[Route('/admin/seances', name: 'admin_seances', methods:['GET'])]
    public function listeSalles(SessionRepository $repo): Response
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
