<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 191)]
    private ?string $firstName = null;

    #[ORM\Column(length: 191)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(length: 191)]
    private ?string $nationality = null;

    #[ORM\Column]
    private ?int $level = null;

    // #[ORM\OneToMany(mappedBy: 'student', targetEntity: Payment::class)]
    // private Collection $payments;

    #[ORM\OneToOne(mappedBy: 'student')]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'students')]
    private Collection $language;

    #[ORM\ManyToMany(targetEntity: Assignment::class, inversedBy: 'students')]
    private Collection $assignments;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Session::class)]
    private Collection $sessions;

    public function __construct()
    {
        // $this->payments = new ArrayCollection();
        $this->language = new ArrayCollection();
        $this->assignments = new ArrayCollection();
        $this->sessions = new ArrayCollection();
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

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, Payment>
     */
    // public function getPayments(): Collection
    // {
    //     return $this->payments;
    // }

    // public function addPayment(Payment $payment): static
    // {
    //     if (!$this->payments->contains($payment)) {
    //         $this->payments->add($payment);
    //         $payment->setStudent($this);
    //     }

    //     return $this;
    // }

    // public function removePayment(Payment $payment): static
    // {
    //     if ($this->payments->removeElement($payment)) {
    //         // set the owning side to null (unless already changed)
    //         if ($payment->getStudent() === $this) {
    //             $payment->setStudent(null);
    //         }
    //     }

    //     return $this;
    // }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setStudent(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getStudent() !== $this) {
            $user->setStudent($this);
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

    /**
     * @return Collection<int, Assignment>
     */
    public function getAssignments(): Collection
    {
        return $this->assignments;
    }

    public function addAssignment(Assignment $assignment): static
    {
        if (!$this->assignments->contains($assignment)) {
            $this->assignments->add($assignment);
        }

        return $this;
    }

    public function removeAssignment(Assignment $assignment): static
    {
        $this->assignments->removeElement($assignment);

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
            $session->setStudent($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getStudent() === $this) {
                $session->setStudent(null);
            }
        }

        return $this;
    }
}
