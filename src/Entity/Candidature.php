<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    private ?Candidat $user = null;

    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    private ?JobOffer $jobOffer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Candidat
    {
        return $this->user;
    }

    public function setUser(?Candidat $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getJobOffer(): ?JobOffer
    {
        return $this->jobOffer;
    }

    public function setJobOffer(?JobOffer $jobOffer): static
    {
        $this->jobOffer = $jobOffer;

        return $this;
    }
}
