<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Entity\Language;
use App\Entity\Planning;
use App\Entity\Formation;
use App\Entity\Quiz;
use App\Entity\Assignment;
use App\Entity\Lesson;
use App\Entity\Flag;
use App\Entity\Resource;
use App\Entity\Payment;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory as FakerFactory;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TestFixtures extends Fixture implements FixtureGroupInterface
{
    private $hasher;
    private $faker;
    private $manager;
    
    public function  __construct(UserPasswordHasherInterface $hasher)
    {
        $this->faker = FakerFactory::create('en_EN');
        $this->hasher = $hasher;
    }
    

    public static function getGroups(): array
    {
        return ['test'];
    }
    public function load(ObjectManager $manager): void
    {
       $this->manager = $manager;
       $this->loadStudents();
       $this->loadTeachers();
       $this->loadLanguages();
       $this->loadPlannings();
       $this->loadFormations();
       $this->loadQuizzes();
       $this->loadAssignments();
       $this->loadLessons();
       $this->loadFlags();
       $this->loadResources();
    }

    public function loadStudents(): void
    {
        //données statiques
        $datas = [
            [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'birthDate' => new DateTime('1990-01-01'),
                'nationality' => 'USA',
                'courses' => ['Chinese'],
                'grades' => [7, 8, 6, 6, 5, 8, 7, 8, 10],
                'level' => 5,
            ],
            [
                'firstName' => 'Jane',
                'lastName' => 'Bellane',
                'birthDate' => new DateTime('1990-01-01'),
                'nationality' => 'UK',
                'courses' => ['Chinese', 'Spanish'],
                'grades' => [10, 7, 5, 8, 9, 6],
                'level' => 3,
            ],
            [
                'firstName' => 'Yuna',
                'lastName' => 'Kirigaya',
                'birthDate' => new DateTime('1990-01-01'),
                'nationality' => 'Japan',
                'courses' => ['French'],
                'grades' => [10, 8, 9, 10, 8, 8, 9, 8, 10],
                'level' => 7,
            ]
        ];
         
         foreach ($datas as $data) {
             $student = new Student();
             $student->setFirstName($data['firstName']);
             $student->setLastName($data['lastName']);
             $student->setBirthDate($data['birthDate']);
             $student->setNationality($data['nationality']);
             $student->setCourses($data['courses']);
             $student->setGrades($data['grades']);
             $student->setLevel($data['level']);
        }
        $this->manager->flush();

        // données dynamiques
    }

    public function loadTeachers(): void
    {
        //données statiques
        $datas = [
            [
                'firstName' => 'Yuna',
                'lastName' => 'Kirigaya',
                'nationality' => 'Japan',
                'availability' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'qualifications' => ['Japanese', 'English', 'Chinese'],
            ],
        ];
         
         foreach ($datas as $data) {
             $teacher = new Teacher();
             $teacher->setFirstName($data['firstName']);
             $teacher->setLastName($data['lastName']);
             $teacher->setNationality($data['nationality']);
             $teacher->setAvailability($data['availability']);
             $teacher->setQualifications($data['qualifications']);
        }
        $this->manager->flush();
    }

    public function loadLanguages(): void
    {
        //données statiques
        $datas = [
            [
                'name' => 'French',
            ],
            [
                'name' => 'English',
            ],
            [
                'name' => 'Chinese',
            ]
        ];
         
         foreach ($datas as $data) {
             $language = new Language();
             $language->setName($data['name']);
        }
        $this->manager->flush();
    }

    public function loadPlannings(): void
    {
        //static datas
        $datas = [
            [
                'type' => 'Online course',
                'date' => new DateTime('2023-10-04'),
                'time' => '14:30:00',
                'duration' => '30 minutes',
            ],
            [
                'type' => 'Planning 2',
                'date' => new DateTime('2023-08-04'),
                'time' => '15:15:00',
                'duration' => '45 minutes',
            ],
            [
                'type' => 'Planning 3',
                'date' => new DateTime('2023-10-04'),
                'time' => '16:15:00',
                'duration' => '45 minutes',
            ]
        ];
         
         foreach ($datas as $data) {
             $planning = new Planning();
             $planning->setName($data['name']);
        }
        $this->manager->flush();

        // dynamic datas
    }

    public function loadFormations(): void
    {
        //static datas
        $datas = [
            [
                'name' => 'Formation 1',
            ],
            [
                'name' => 'Formation 2',
            ],
            [
                'name' => 'Formation 3',
            ]
        ];
         
         foreach ($datas as $data) {
             $formation = new Formation();
             $formation->setName($data['name']);
        }
        $this->manager->flush();

        // dynamic datas
    }

    public function loadQuizzes(): void
    {
        //static datas
        $datas = [
            [
                'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'answer' => ['answer 1', 'answer 2', 'answer 3', 'answer 4'],
            ],
            [
                'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, quas?',
                'answer' => ['answer 1', 'answer 2', 'answer 3', 'answer 4'],
            ],
            [
                'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'answer' => ['answer 1', 'answer 2', 'answer 3', 'answer 4'],
            ]          
            
        ];
         
         foreach ($datas as $data) {
             $quiz = new Quiz();
             $quiz->setQuestion($data['question']);
             $quiz->setAnswer($data['answer']);
         }
        $this->manager->flush();

        //données dynamiques
    }

    public function loadAssignments(): void
    {
        //static datas
        $datas = [
            [
                'title' => 'Assignment 1',
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem, facilis! ',
                'startDate' => new DateTime('2023-10-04'),
                'dueDate' => new DateTime('2023-10-07'),
                'grade' => 7,
            ],
            [
                'title' => 'Assignment 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, quisquam? ',
                'startDate' => new DateTime('2023-10-08'),
                'dueDate' => new DateTime('2023-10-10'),
                'grade' => 8,
            ],
        ];
        foreach ($datas as $data) {
            $assignment = new Assignment();
            $assignment->setTitle($data['title']);
            $assignment->setContent($data['content']);
            $assignment->setStartDate($data['startDate']);
            $assignment->setDueDate($data['dueDate']);
            $assignment->setGrade($data['grade']);
        }
        $this->manager->flush();

        //Dynamic datas
    }

    public function loadLessons(): void
    {
        //static datas
        $datas = [
            [
                'title' => 'Lesson 1',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam in expedita mollitia impedit! Illo optio sed nisi aperiam libero. ',
                'exercice' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic, magnam!',
            ],
            [
                'title' => 'Lesson 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam in expedita mollitia impedit! Illo optio sed nisi aperiam libero. ',
                'exercice' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic, magnam!',
            ],
        ];
        foreach ($datas as $data) {
            $lesson = new Lesson();
            $lesson->setTitle($data['title']);
            $lesson->setContent($data['content']);
            $lesson->setExercice($data['exercice']);
    }

    // dynamic datas
    }

    public function loadFlags(): void
    {
        //static datas
        $datas = [
            [
                'country' => 'Flag 1',
            ],
            [
                'country' => 'Flag 2',
            ],
            [
                'country' => 'Flag 3',
            ]
        ];
         
         foreach ($datas as $data) {
             $flag = new Flag();
             $flag->setCountry($data['name']);
        }
        $this->manager->flush();

        //dynamic datas
    }

    public function loadResources(): void
    {
        //static datas
        $datas = [
            [
                'type' => 'Resource 1',
                'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia eius eaque id aperiam aspernatur impedit eos atque quas, autem voluptatum. Facere fugiat amet consequatur dicta.',
                'publishedDate' => new DateTime('2023-10-02'),
            ],
            [
                'type' => 'Resource 2',
                'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia eius eaque id aperiam aspernatur impedit eos atque quas, autem voluptatum. Facere fugiat amet consequatur dicta.',
                'publishedDate' => new DateTime('2023-10-02'),
            ]
        ];
        foreach ($datas as $data) {
            $resource = new Resource();
            $resource->setType($data['type']);
            $resource->setTitle($data['title']);
            $resource->setContent($data['content']);
            $resource->setPublishedDate($data['publishedDate']);
        }

        $this->manager->flush();
    }
}