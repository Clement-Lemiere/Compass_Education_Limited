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
        // $this->loadFormations();
        // $this->loadQuizzes();
        $this->loadAssignments();
        // $this->loadLessons();
        // $this->loadFlags();
        // $this->loadResources();
    }

    public function loadStudents(): void
    {
        //static datas
        $datas = [
            [
                'email' => 'foo.foo@example.com',
                'password' => '123',
                'roles' => ['ROLE_USER'],

                'firstName' => 'Mike',
                'lastName' => 'Doe',
                'birthDate' => new DateTime(),
                'nationality' => 'USA',
                'level' => 5,
            ],
            [
                'email' => 'bat.bar@example.com',
                'password' => '123',
                'roles' => ['ROLE_USER'],
                'firstName' => 'Jane',
                'lastName' => 'Bellane',
                'birthDate' => new DateTime(),
                'nationality' => 'France',
                'level' => 6,
            ],
            [
                'email' => 'baz.baz@example.com',
                'password' => '123',
                'roles' => ['ROLE_USER'],

                'firstName' => 'John',
                'lastName' => 'Doe',
                'birthDate' => new DateTime(),
                'nationality' => 'USA',
                'level' => 7,
            ],
        ];
        foreach ($datas as $data) {
            $user = new User();
            $user->setEmail($data['email']);
            $user->setPassword($this->hasher->hashPassword($user, $data['password']));
            $user->setRoles($data['roles']);

            $student = new Student();
            $student->setUser($user);
            $student->setFirstName($data['firstName']);
            $student->setLastName($data['lastName']);
            $student->setBirthDate($data['birthDate']);
            $student->setNationality($data['nationality']);
            $student->setLevel($data['level']);

            $this->manager->persist($student);
        }
        $this->manager->flush();
    }

    public function loadTeachers(): void
    {
        //static datas
        $datas = [
            [
                'email' => 'doe.mi@example.com',
                'password' => '123',
                'roles' => ['ROLE_USER'],

                'firstName' => 'Micheal',
                'lastName' => 'Donokey',
                'nationality' => 'USA',
                'availability' => 'Available',
                'qualification' => 'English(US)',
            ],
            [
                'email' => 'ge.la@example.com',
                'password' => '123',
                'roles' => ['ROLE_USER'],

                'firstName' => 'Gérard',
                'lastName' => 'Lambert',
                'nationality' => 'France',
                'availability' => 'Available',
                'qualification' => 'French',
            ],
            [
                'email' => 'ta.li@example.com',
                'password' => '123',
                'roles' => ['ROLE_USER'],

                'firstName' => 'Tangzhi',
                'lastName' => 'li',
                'nationality' => 'China',
                'availability' => 'Available',
                'qualification' => 'Chinese',
            ],
        ];
        foreach ($datas as $data) {
            $user = new User();
            $user->setEmail($data['email']);
            $user->setPassword($this->hasher->hashPassword($user, $data['password']));
            $user->setRoles($data['roles']);

            $teacher = new Teacher();
            $teacher->setUser($user);
            $teacher->setFirstName($data['firstName']);
            $teacher->setLastName($data['lastName']);
            $teacher->setNationality($data['nationality']);
            $teacher->setAvailability($data['availability']);
            $teacher->setQualification($data['qualification']);

            $this->manager->persist($teacher);
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

            $this->manager->persist($language);
        }
        $this->manager->flush();
    }

    public function loadPlannings(): void
    {

        $teacherRepository = $this->manager->getRepository(Teacher::class);
        $teachers = $teacherRepository->findAll();

        $teacher1 = $teacherRepository->find(1);
        $teacher2 = $teacherRepository->find(2);
        $teacher3 = $teacherRepository->find(3);
        //static datas
        $datas = [
            [
                'type' => 'Online course',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('13:30:00'),
                'teacher' => [$teacher1],

            ],
            [
                'type' => 'Planning 2',
                'date' => new DateTime('2023-08-04'),
                'time' => new DateTime('14:15:00'),
                'teacher' => [$teacher2],
            ],
            [
                'type' => 'Planning 3',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('15:15:00'),
                'teacher' => [$teacher3],
            ]
        ];

        foreach ($datas as $data) {
            $planning = new Planning();
            $planning->setType($data['type']);
            $planning->setDate($data['date']);
            $planning->setTime($data['time']);
            $planning->setTeacher($data['teacher'][0]);

            $this->manager->persist($planning);
        }
        $this->manager->flush();

        // dynamic datas
    }

    public function loadFormations(): void
    {
        //static datas
        $datas = [
            [
                'title' => 'Formation 1',
                'objective' => 'Online course',
                'duration' => 30,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
                'cost' => 100,

            ],
            [
                'title' => 'Formation 2',
                'objective' => 'Online course',
                'duration' => 45,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
                'cost' => 50,
            ],
            [
                'title' => 'Formation 3',
                'objective' => 'Online course',
                'duration' => 60,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 3,
                'cost' => 75,
            ]
        ];

        foreach ($datas as $data) {
            $formation = new Formation();
            $formation->setTitle($data['title']);
            $formation->setObjective($data['objective']);
            $formation->setDuration($data['duration']);
            $formation->setStartDate($data['startDate']);
            $formation->setSatisfaction($data['satisfaction']);
            $formation->setCost($data['cost']);

            $this->manager->persist($formation);
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
                'score' => 5,
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
            
            $this->manager->persist($quiz);
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
            // 3ème assignement ?
        ];
        foreach ($datas as $data) {
            $assignment = new Assignment();
            $assignment->setTitle($data['title']);
            $assignment->setContent($data['content']);
            $assignment->setStartDate($data['startDate']);
            $assignment->setDueDate($data['dueDate']);
            $assignment->setGrade($data['grade']);

            $this->manager->persist($assignment);

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
            ]
        ];

        foreach ($datas as $data) {
            $lesson = new Lesson();
            $lesson->setTitle($data['title']);
            $lesson->setContent($data['content']);
            $lesson->setExercice($data['exercice']);

            $this->manager->persist($lesson);
        }
        $this->manager->flush();

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
            $flag->setCountry($data['country']);

            $this->manager->persist($flag);
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

            $this->manager->persist($resource);
        }

        $this->manager->flush();
    }
}
