<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $questions = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answers = null;

    #[ORM\Column]
    private ?int $scores = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\ManyToOne(inversedBy: 'quizzes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Language $language = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestions(): ?string
    {
        return $this->questions;
    }

    public function setQuestions(string $questions): static
    {
        $this->questions = $questions;

        return $this;
    }

    public function getAnswers(): ?string
    {
        return $this->answers;
    }

    public function setAnswers(string $answers): static
    {
        $this->answers = $answers;

        return $this;
    }

    public function getScores(): ?int
    {
        return $this->scores;
    }

    public function setScores(int $scores): static
    {
        $this->scores = $scores;

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

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): static
    {
        $this->language = $language;

        return $this;
    }
}
