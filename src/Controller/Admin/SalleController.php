<?php

namespace App\Controller\Admin;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalleController extends AbstractController
{
    #[Route('/admin/salles', name: 'admin_salles', methods:['GET'])]
    public function listeSalles(RoomRepository $repo): Response
    {
        $salles = $repo->findAll();
        return $this->render('admin/salle/listeSalles.html.twig', ['lesSalles' => $salles,
        ]);
    }
    /*public function index(): Response
    {
        return $this->render('admin/salle/index.html.twig', [
            'controller_name' => 'SalleController',
        ]);
    }*/
}
