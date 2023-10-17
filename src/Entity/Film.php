<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSortieFilm = null;

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'films')]
    private Collection $Categories;

    public function __construct()
    {
        $this->Categories = new ArrayCollection();
    }

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

    public function getDateSortieFilm(): ?\DateTimeInterface
    {
        return $this->dateSortieFilm;
    }

    public function setDateSortieFilm(\DateTimeInterface $dateSortieFilm): static
    {
        $this->dateSortieFilm = $dateSortieFilm;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->Categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->Categories->contains($category)) {
            $this->Categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        $this->Categories->removeElement($category);

        return $this;
    }
}
