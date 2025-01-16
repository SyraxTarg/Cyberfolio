<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $profilePicture = null;

    #[ORM\OneToOne(mappedBy: 'profile', cascade: ['persist', 'remove'])]
    private ?User $user;

    #[ORM\OneToMany(targetEntity: Experience::class, mappedBy: 'profile', cascade: ['remove'])]
    private Collection $experiences;

    #[ORM\ManyToMany(targetEntity: CentresInteret::class, inversedBy: 'profile', cascade: ['remove'])]
    private Collection $centresInterets;

    #[ORM\ManyToMany(targetEntity: Competence::class, inversedBy: 'profile', cascade: ['remove'])]
    private Collection $competences;

    #[ORM\OneToMany(targetEntity: Formation::class, mappedBy: 'profile', cascade: ['remove'])]
    private Collection $formations;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->centresInterets = new ArrayCollection();
        $this->competences = new ArrayCollection();
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setProfile(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getProfile() !== $this) {
            $user->setProfile($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): static
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences->add($experience);
            $experience->setProfile($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): static
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getProfile() === $this) {
                $experience->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CentresInteret>
     */
    public function getCentresInterets(): Collection
    {
        return $this->centresInterets;
    }

    public function addCentresInteret(CentresInteret $centresInteret = null): static
    {
        if (!$this->centresInterets->contains($centresInteret)) {
            $this->centresInterets->add($centresInteret);
            $centresInteret->addProfile($this);  // Cette ligne est importante pour mettre à jour l'autre côté de la relation.
        }

        return $this;
    }


    public function removeCentresInteret(CentresInteret $centresInteret = null): static
    {
        $this->centresInterets->removeElement($centresInteret);
        $centresInteret->removeProfile($this);  // On dissocie l'élément du côté du `CentresInteret`.

        return $this;
    }


    /**
     * @return Collection<int, Competence>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): static
    {
        if (!$this->competences->contains($competence)) {
            $this->competences->add($competence);
            $competence->addProfile($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): static
    {
        if ($this->competences->removeElement($competence)) {
            $competence->removeProfile($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): static
    {
        if (!$this->formations->contains($formation)) {
            $this->formations->add($formation);
            $formation->setProfile($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): static
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getProfile() === $this) {
                $formation->setProfile(null);
            }
        }

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(string $profilePicture): static
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }
}
