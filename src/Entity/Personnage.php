<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom = 'DEFAULT_NAME';

    #[ORM\Column(length: 255)]
    private string $job;

    #[ORM\Column]
    private int $statForce = 0;

    #[ORM\Column]
    private int $statEsprit = 0;

    #[ORM\Column]
    private int $statAgilite = 0;

    #[ORM\Column]
    private int $statCharisme = 0;

    #[ORM\OneToMany(mappedBy: 'personnage', targetEntity: Skill::class)]
    private Collection $skills;

    #[ORM\Column(type: Types::TEXT)]
    private string $description = '';

    #[ORM\OneToOne(mappedBy: 'selectedPersonnage', cascade: ['persist', 'remove'])]
    private ?Joueur $joueur = null;

    public function __toString(): string
    {
        return $this->getNom();
    }

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function setJob(string $job): static
    {
        $this->job = $job;

        return $this;
    }

    public function getStatForce(): int
    {
        return $this->statForce;
    }

    public function setStatForce(int $statForce): static
    {
        $this->statForce = $statForce;

        return $this;
    }

    public function getStatEsprit(): int
    {
        return $this->statEsprit;
    }

    public function setStatEsprit(int $statEsprit): static
    {
        $this->statEsprit = $statEsprit;

        return $this;
    }

    public function getStatAgilite(): int
    {
        return $this->statAgilite;
    }

    public function setStatAgilite(int $statAgilite): static
    {
        $this->statAgilite = $statAgilite;

        return $this;
    }

    public function getStatCharisme(): int
    {
        return $this->statCharisme;
    }

    public function setStatCharisme(int $statCharisme): static
    {
        $this->statCharisme = $statCharisme;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->setPersonnage($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getPersonnage() === $this) {
                $skill->setPersonnage(null);
            }
        }

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): static
    {
        // unset the owning side of the relation if necessary
        if (null === $joueur && null !== $this->joueur) {
            $this->joueur->setSelectedPersonnage(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $joueur && $joueur->getSelectedPersonnage() !== $this) {
            $joueur->setSelectedPersonnage($this);
        }

        $this->joueur = $joueur;

        return $this;
    }
}
