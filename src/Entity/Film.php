<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreFilm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descFilm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $afficheFilm = null;

    #[ORM\Column]
    private ?int $dateSortieFilm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitreFilm(): ?string
    {
        return $this->titreFilm;
    }

    public function setTitreFilm(string $titreFilm): static
    {
        $this->titreFilm = $titreFilm;

        return $this;
    }

    public function getDescFilm(): ?string
    {
        return $this->descFilm;
    }

    public function setDescFilm(?string $descFilm): static
    {
        $this->descFilm = $descFilm;

        return $this;
    }

    public function getAfficheFilm(): ?string
    {
        return $this->afficheFilm;
    }

    public function setAfficheFilm(?string $afficheFilm): static
    {
        $this->afficheFilm = $afficheFilm;

        return $this;
    }

    public function getDateSortieFilm(): ?int
    {
        return $this->dateSortieFilm;
    }

    public function setDateSortieFilm(int $dateSortieFilm): static
    {
        $this->dateSortieFilm = $dateSortieFilm;

        return $this;
    }
}
