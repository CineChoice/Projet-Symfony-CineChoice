<?php

namespace App\Controller\Admin;

use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
        #[Route('/admin/films', name: 'admin_films', methods:['GET'])]
        public function listeAlbums(MovieRepository $repo): Response
        {
            $films=$repo->findAll();
    
            return $this->render('admin/film/listeFilms.html.twig', [
                'lesFilms' => $films
            ]);
        }
}
