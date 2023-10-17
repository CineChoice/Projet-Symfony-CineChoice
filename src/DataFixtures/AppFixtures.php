<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Film;
use App\Entity\Salle;
use App\Entity\Seance;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Ajout de toute les fixture

        $faker=Factory::create("fr_FR");

        $lesFilms = $this->chargeFichier("film.csv");

        foreach ($lesFilms as $value) {
            $film = new Film();
            $film       ->setId(intval($value[0]))
                        ->setTitreFilm($value[1])
                        ->setDescFilm($value[2])
                        ->setDateSortieFilm(intval($value[3]))
                        ->setAfficheFilm($value[4]);
            $manager->persist($film);
            $this->addReference("film".$film->getId(),$film);
        }

        $lesCategories = $this->chargeFichier("categorie.csv");

        foreach ($lesCategories as $value) {
            $Categorie = new Categorie();
            $Categorie  ->setId(intval($value[0]))
                        ->setNomCat($value[1])
                        ->setDescCat($value[2]);
            $manager->persist($Categorie);
            $this->addReference("categorie".$Categorie->getId(),$Categorie);
        }

        $lesSalles = $this->chargeFichier("salle.csv");

        foreach ($lesSalles as $value) {
            $Salle = new Salle();
            $Salle  ->setId(intval($value[0]))
                        ->setNomSalle($value[1])
                        ->setCapSalle($value[2]);
            $manager->persist($Salle);
            $this->addReference("salle".$Salle->getId(),$Salle);
        }

        $lesSeances = $this->chargeFichier("seance.csv");

        foreach ($lesSeances as $value) {
            $Seance = new Seance();
            $Seance  ->setId(intval($value[0]))
                        ->setDateSeance($faker->dateTime())
                        ->setHeureDebSeance($faker->dateTimeThisDecade());
            $manager->persist($Seance);
            $this->addReference("seance".$Seance->getId(),$Seance);
        }

        $manager->flush();
    }

    public function chargeFichier($fichier) {
        $fichierCsv=fopen(__DIR__."/". $fichier ,"r");
        while (!feof($fichierCsv)) {
            $data[]=fgetcsv($fichierCsv);
        }
        fclose($fichierCsv);
        return $data;
    }
} 
