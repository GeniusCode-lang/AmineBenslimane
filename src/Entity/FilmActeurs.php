<?php

namespace App\Entity;

use App\Repository\FilmActeursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmActeursRepository::class)]
class FilmActeurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $film_id = null;

    #[ORM\Column]
    private ?int $acteur_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilmId(): ?int
    {
        return $this->film_id;
    }

    public function setFilmId(int $film_id): static
    {
        $this->film_id = $film_id;

        return $this;
    }

    public function getActeurId(): ?int
    {
        return $this->acteur_id;
    }

    public function setActeurId(int $acteur_id): static
    {
        $this->acteur_id = $acteur_id;

        return $this;
    }
}
