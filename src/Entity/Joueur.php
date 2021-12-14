<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JoueurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $joueur_id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $equipe_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoueurId(): ?int
    {
        return $this->joueur_id;
    }

    public function setJoueurId(int $joueur_id): self
    {
        $this->joueur_id = $joueur_id;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEquipeId(): ?int
    {
        return $this->equipe_id;
    }

    public function setEquipeId(int $equipe_id): self
    {
        $this->equipe_id = $equipe_id;

        return $this;
    }
}
