<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    #[Route('/films', name: 'films', methods:['GET'])]
    public function listeFilms(Film $films): Response
    {
        return $this->render('film/listeFilms.html.twig', [
            'lesFilms' => $films,
        ]);
    }
}
