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
        //static datas
        $datas = [
            [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'birthDate' => new DateTime('1990-01-01'),
                'nationality' => 'USA',
                'level' => 5,
            ],
            [
                'firstName' => 'Jane',
                'lastName' => 'Bellane',
                'birthDate' => new DateTime('1990-01-01'),
                'nationality' => 'UK',
                'level' => 3,
            ],
            [
                'firstName' => 'Yuna',
                'lastName' => 'Kirigaya',
                'birthDate' => new DateTime('1990-01-01'),
                'nationality' => 'Japan',
                'level' => 7,
            ]
        ];
         
         foreach ($datas as $data) {
             $student = new Student();
             $student->setFirstName($data['firstName']);
             $student->setLastName($data['lastName']);
             $student->setBirthDate($data['birthDate']);
             $student->setNationality($data['nationality']);
             $student->setLevel($data['level']);
        }
        $this->manager->flush();

        // dynamic datas

        // for ($i = 0; $i < 10; $i++) {
        //     $student = new Student();
        //     $student->setFirstName($this->faker->firstName());
        //     $student->setLastName($this->faker->lastName());
        //     $student->setBirthDate($this->faker->dateTimeBetween('-30 years'));
        //     $student->setNationality($this->faker->country());
        //     $student->setLevel($this->faker->numberBetween(1, 10));

        //     $this->manager->persist($student);
        // }
    }

    public function loadTeachers(): void
    {
        //static datas
        $datas = [
            [
                'firstName' => 'Yuna',
                'lastName' => 'Kirigaya',
                'nationality' => 'Japan',
                'availability' => 'available',
                'qualifications' => ['japanese'],
            ],
        ];
         
         foreach ($datas as $data) {
             $teacher = new Teacher();
             $teacher->setFirstName($data['firstName']);
             $teacher->setLastName($data['lastName']);
             $teacher->setNationality($data['nationality']);
             $teacher->setAvailability($data['availability']);
             $teacher->setQualifications($data['qualifications'][0]);
        }
        $this->manager->flush();

        
    }

    public function loadLanguages(): void
    {
        //static datas
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
                'time' => new DateTime('13:30:00'),

            ],
            [
                'type' => 'Planning 2',
                'date' => new DateTime('2023-08-04'),
                'time' => new DateTime('14:15:00'),

            ],
            [
                'type' => 'Planning 3',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('15:15:00'),

            ]
        ];
         
         foreach ($datas as $data) {
             $planning = new Planning();
             $planning->setType($data['type']);
             $planning->setDate($data['date']);
             $planning->setTime($data['time']);

        }
        $this->manager->flush();

        // dynamic datas
    }

    public function loadFormations(): void
    {
        //static datas
        $datas = [
            [
                'title'=>'Formation 1',
                'type' => 'Online course',
                'duration' => '30 minutes',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'startDate' => new DateTime('2023-10-04'),
                'endDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,

            ],
            [
                'title' => 'Formation 2',
                'objective' => 'Online course',
                'duration' => '45 minutes',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'startDate' => new DateTime('2023-10-04'),
                'endDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
            ],
            [
                'title' => 'Formation 3',
                'objective' => 'Online course',
                'duration' => '60 minutes',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'startDate' => new DateTime('2023-10-04'),
                'endDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
            ]
        ];
         
         foreach ($datas as $data) {
             $formation = new Formation();
             $formation->setTitle($data['title']);
             $formation->setObjective($data['Objective']);
             $formation->setDuration($data['duration']);
             $formation->setDescription($data['description']);
             $formation->setStartDate($data['startDate']);
             $formation->setEndDate($data['endDate']);
             $formation->setSatisfaction($data['satisfaction']);

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
                'answer' => ['answer 1'],
                'score' => 5 ,
                'level' => 1,
                'language' => 1
            ],
            [
                'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, quas?',
                'answer' => ['answer 4'],
                'score' => 5,
                'level' => 1,
                'language' => 1
            ],
            [
                'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'answer' => ['answer 2'],
                'score' => 5,
                'level' => 1,
                'language' => 1
            ]          
            
        ];
         
         foreach ($datas as $data) {
             $quiz = new Quiz();
             $quiz->setQuestion($data['question']);
             $quiz->setAnswer($data['answer'][0]);
             $quiz->setScore($data['score']);
             $quiz->setLevel($data['level']);
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
                'exercices' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic, magnam!',
            ],
            [
                'title' => 'Lesson 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam in expedita mollitia impedit! Illo optio sed nisi aperiam libero. ',
                'exercices' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic, magnam!',
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