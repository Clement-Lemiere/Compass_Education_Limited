<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?int $id = null;

    #[ORM\Column(length: 191)]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $firstName = null;

    #[ORM\Column(length: 191)]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $lastName = null;

    #[ORM\Column(length: 191)]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $nationality = null;

    #[ORM\Column(length: 191)]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $qualification = null;

    #[ORM\Column(length: 191)]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $availability = null;

    #[ORM\OneToMany(mappedBy: 'teacher', targetEntity: Session::class)]
    private Collection $sessions;

    #[ORM\OneToOne(mappedBy: 'teacher', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'teachers')]
    private Collection $language;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
        $this->language = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(string $qualification): static
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): static
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setTeacher($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getTeacher() === $this) {
                $session->setTeacher(null);
            }
        }

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
            $this->user->setTeacher(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getTeacher() !== $this) {
            $user->setTeacher($this);
        }

        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Language>
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): static
    {
        if (!$this->language->contains($language)) {
            $this->language->add($language);
        }

        return $this;
    }

    public function removeLanguage(Language $language): static
    {
        $this->language->removeElement($language);

        return $this;
    }
    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
