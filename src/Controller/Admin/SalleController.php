<?php

namespace App\Controller\Admin;

use App\Repository\RoomRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleController extends AbstractController
{
    /*#[Route('/admin/salles', name: 'admin_salles', methods:['GET'])]
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

    #[Route('/admin/salles', name: 'admin_salles', methods:['GET'])]
    public function listeSalles(RoomRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $salles = $paginator->paginate(
            $repo->listeSallesCompleteAdmin(),
            $request->query->getInt('page', 1), 
            9
        );

        return $this->render('admin/salle/listeSalles.html.twig', [
            'lesSalles' => $salles
        ]);
    }
}
