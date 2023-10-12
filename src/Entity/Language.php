<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 191)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'language', targetEntity: Flag::class)]
    private Collection $flags;

    #[ORM\OneToMany(mappedBy: 'language', targetEntity: Quiz::class)]
    private Collection $quizzes;

    #[ORM\OneToMany(mappedBy: 'language', targetEntity: Resource::class)]
    private Collection $resources;

    public function __construct()
    {
        $this->flags = new ArrayCollection();
        $this->quizzes = new ArrayCollection();
        $this->resources = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Flag>
     */
    public function getFlags(): Collection
    {
        return $this->flags;
    }

    public function addFlag(Flag $flag): static
    {
        if (!$this->flags->contains($flag)) {
            $this->flags->add($flag);
            $flag->setLanguage($this);
        }

        return $this;
    }

    public function removeFlag(Flag $flag): static
    {
        if ($this->flags->removeElement($flag)) {
            // set the owning side to null (unless already changed)
            if ($flag->getLanguage() === $this) {
                $flag->setLanguage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Quiz>
     */
    public function getQuizzes(): Collection
    {
        return $this->quizzes;
    }

    public function addQuiz(Quiz $quiz): static
    {
        if (!$this->quizzes->contains($quiz)) {
            $this->quizzes->add($quiz);
            $quiz->setLanguage($this);
        }

        return $this;
    }

    public function removeQuiz(Quiz $quiz): static
    {
        if ($this->quizzes->removeElement($quiz)) {
            // set the owning side to null (unless already changed)
            if ($quiz->getLanguage() === $this) {
                $quiz->setLanguage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Resource>
     */
    public function getResources(): Collection
    {
        return $this->resources;
    }

    public function addResource(Resource $resource): static
    {
        if (!$this->resources->contains($resource)) {
            $this->resources->add($resource);
            $resource->setLanguage($this);
        }

        return $this;
    }

    public function removeResource(Resource $resource): static
    {
        if ($this->resources->removeElement($resource)) {
            // set the owning side to null (unless already changed)
            if ($resource->getLanguage() === $this) {
                $resource->setLanguage(null);
            }
        }

        return $this;
    }
}
