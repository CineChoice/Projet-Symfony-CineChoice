<?php

namespace App\Controller\Admin;

use App\Entity\Movie;
use App\Form\FilmType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
        #[Route('/admin/films', name: 'admin_films', methods:['GET'])]
        public function listeFilms(MovieRepository $repo): Response
        {
            $films=$repo->listeFilmsCompleteAdmin();
    
            return $this->render('admin/film/listeFilms.html.twig', [
                'lesFilms' => $films
            ]);
        }

        #[Route('/admin/film/ajout', name: 'admin_film_ajout', methods: ['GET', 'POST'])]
        #[Route('/admin/film/modif/{id}', name: 'admin_film_modif', methods: ['GET', 'POST'])]
        public function ajoutModifFilm(Movie $film = null, Request $request, EntityManagerInterface $manager): Response
        {
            if (!$film) {
                $film = new Movie(); // Initialisez une nouvelle instance de Film si $film est null
                $mode = "ajouté";
            } else {
                $mode = "modifié";
            }
        
            $form = $this->createForm(FilmType::class, $film);
        
            $form->handleRequest($request);
        
            if ($form->isSubmitted() && $form->isValid()) {
                $manager->persist($film);
                $manager->flush();
        
                $this->addFlash("success", "Le film a bien été $mode!");
        
                return $this->redirectToRoute('admin_films');
            }
        
            return $this->render('admin/film/formAjoutModifFilm.html.twig', [
                'formFilm' => $form->createView(),
            ]);
        }

        #[Route('/admin/film/supr/{id}', name: 'admin_film_supr', methods: ['GET'])]
        public function suprFilm(Movie $film, EntityManagerInterface $manager): Response
        {
            $nbCategory = $film->getcategories()->count();
            $nbSession = $film->getSessions()->count();
    
            if ($nbCategory > 0) {
                $this->addFlash("danger", "Vous ne pouvez pas supprimer ce film car $nbCategory Catégorie(s) y sont associés!");
            } else if ($nbSession > 0) {
                $this->addFlash("danger", "Vous ne pouvez pas supprimer ce film car $nbSession Séance(s) y sont associés!");
            } else {
                $manager->remove($film);
                $manager->flush();
    
                $this->addFlash("success", "Le film a bien été supprimé!");
            }
    
            return $this->redirectToRoute('admin_films');
        }
}
