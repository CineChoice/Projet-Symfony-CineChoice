<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    #[Route('/films', name: 'films', methods:['GET'])]
    public function listeFilms(MovieRepository $repo): Response
    {
        $films=$repo->listeFilmsComplete();

        return $this->render('admin/film/listeFilms.html.twig', [
            'lesFilms' => $films
        ]);
    }
}
