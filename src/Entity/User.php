<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\UserRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Student;
use App\Entity\Teacher;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Vich\Uploadable]
#[ApiResource(
    operations: [
        new GetCollection(normalizationContext: ['groups' => ['user:list']]),
        new Get(normalizationContext: ['groups' => 'user:item']),
        new Post(denormalizationContext: ['groups' => 'user:update']),

    ]
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?int $id = null;


    #[ORM\Column(length: 180, unique: true)]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $email = null;

    #[ORM\Column]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?string $password = null;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?Student $student = null;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    #[Groups(['user:list', 'user:item', 'user:update'])]
    private ?Teacher $teacher = null;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = ['ROLE_USER']; // Tous les utilisateurs ont le rôle de base.

        // Vérifie si le rôle 'student' est présent dans le tableau des rôles.
        if (in_array('student', $this->roles)) {
            $roles[] = 'ROLE_STUDENT';
        }
        // Vérifie si le rôle 'teacher' est présent dans le tableau des rôles.
        if (in_array('teacher', $this->roles)) {
            $roles[] = 'ROLE_TEACHER';
        }
        // Vérifie si le rôle 'admin' est présent dans le tableau des rôles.
        if (in_array('admin', $this->roles)) {
            $roles[] = 'ROLE_ADMIN';
        }

        return $roles;
    }




    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): static
    {
        $this->teacher = $teacher;

        return $this;
    }
    public function __toString(){
        return "{$this->email}";
    }

}
