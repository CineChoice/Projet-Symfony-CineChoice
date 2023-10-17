<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descCat = null;

    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'Films')]
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

    public function getNomCat(): ?string
    {
        return $this->nomCat;
    }

    public function setNomCat(string $nomCat): static
    {
        $this->nomCat = $nomCat;

        return $this;
    }

    public function getDescCat(): ?string
    {
        return $this->descCat;
    }

    public function setDescCat(?string $descCat): static
    {
        $this->descCat = $descCat;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getCategories(): Collection
    {
        return $this->Categories;
    }

    public function addCategory(Film $category): static
    {
        if (!$this->Categories->contains($category)) {
            $this->Categories->add($category);
            $category->addFilm($this);
        }

        return $this;
    }

    public function removeCategory(Film $category): static
    {
        if ($this->Categories->removeElement($category)) {
            $category->removeFilm($this);
        }

        return $this;
    }
}
