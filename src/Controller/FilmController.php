<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    #[Route('/films', name: 'films', methods:['GET'])]
    public function listeFilms(MovieRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $films = $paginator->paginate(
            $repo->listeFilmsComplete(),
            $request->query->getInt('page', 1), 
            9
        );

        return $this->render('film/listeFilms.html.twig', [
            'lesFilms' => $films
        ]);
    }
}
