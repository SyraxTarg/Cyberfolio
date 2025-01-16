<?php

namespace App\Entity;

use App\Repository\CentresInteretsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentresInteretsRepository::class)]
class CentresInteret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $centreInteret = null;

    #[ORM\ManyToMany(targetEntity: Profile::class, mappedBy: 'centresInterets')]
    private Collection $profiles;

    public function __construct()
    {
        $this->profiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCentreInteret(): ?string
    {
        return $this->centreInteret;
    }

    public function setCentreInteret(string $centreInteret): static
    {
        $this->centreInteret = $centreInteret;

        return $this;
    }

    /**
     * @return Collection<int, Profile>
     */
    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    public function addProfile(Profile $profile): static
    {
        if (!$this->profiles->contains($profile)) {
            $this->profiles->add($profile);
        }

        return $this;
    }

    public function removeProfile(Profile $profile): static
    {
        $this->profiles->removeElement($profile);

        return $this;
    }


    public function isEmpty(): bool
    {
        return empty($this->centreInteret);
    }
}
