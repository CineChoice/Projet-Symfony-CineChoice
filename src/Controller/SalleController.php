<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SalleController extends AbstractController
{
    #[Route('/salles', name: 'salles', methods:['GET'])]

    public function listeSalles (RoomRepository $repo, PaginatorInterface $paginator, Request $request) : Response
    {
        $salles = $paginator->paginate(
            $repo->listeSallesComplete(),
            $request->query->getInt('page', 1), 
            9
        );

        return $this->render('salle/listeSalles.html.twig', [
            'lesSalles' => $salles
        ]);
    }
}
