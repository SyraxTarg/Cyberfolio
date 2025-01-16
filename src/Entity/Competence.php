<?php

namespace App\Entity;

use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencesRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $competence = null;

    #[ORM\Column]
    private ?bool $hard_skill = null;

    #[ORM\ManyToMany(targetEntity: Profile::class, mappedBy: 'competences')]
    private Collection $profiles;

    public function __construct()
    {
        $this->profiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    public function setCompetence(string $competence): static
    {
        $this->competence = $competence;

        return $this;
    }

    public function isHardSkill(): ?bool
    {
        return $this->hard_skill;
    }

    public function setHardSkill(bool $hard_skill): static
    {
        $this->hard_skill = $hard_skill;

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
            $profile->addCompetence($this);
        }

        return $this;
    }

    public function removeProfile(Profile $profile): static
    {
        if ($this->profiles->removeElement($profile)) {
            $profile->removeCompetence($this);
        }

        return $this;
    }

    public function isEmpty(): bool
    {
        return empty($this->competence);
    }
}
