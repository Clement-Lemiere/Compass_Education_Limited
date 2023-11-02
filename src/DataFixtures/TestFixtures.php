<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Entity\Language;
use App\Entity\Session;
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
        $this->loadSessions();
        $this->loadFormations();
        $this->loadQuizzes();
        $this->loadAssignments();
        $this->loadLessons();
        $this->loadFlags();
        $this->loadResources();
        $this->loadPayments();
    }

    public function loadStudents(): void
    {
        //static datas
        $datas = [
            [
                'email' => 'foo.foo@example.com',
                'password' => '123',
                'roles' => ['student'],

                'firstName' => 'Mike',
                'lastName' => 'Doe',
                'birthDate' => new DateTime(),
                'nationality' => 'USA',
                'level' => 5,
            ],
            [
                'email' => 'bat.bar@example.com',
                'password' => '123',
                'roles' => ['student'],
                'firstName' => 'Jane',
                'lastName' => 'Bellane',
                'birthDate' => new DateTime(),
                'nationality' => 'France',
                'level' => 6,
            ],
            [
                'email' => 'baz.baz@example.com',
                'password' => '123',
                'roles' => ['student'],

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

        // dynamic datas
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($this->faker->unique()->safeEmail());
            $password = $this->hasher->hashPassword($user, '123');
            $user->setPassword($password);
            $user->setRoles(['student']);

            $this->manager->persist($user);

            $student = new Student();
            $student->setFirstName($this->faker->firstName());
            $student->setLastName($this->faker->lastName());

            $nationality = $this->faker->country();
            $student->setNationality($nationality);

            $birthDate = $this->faker->dateTimeBetween('-80 years', '-5 years');
            $student->setBirthDate($birthDate);

            $level = $this->faker->numberBetween(1, 10);
            $student->setLevel($level);


            $student->setUser($user);

            $this->manager->persist($user);
        }
        $this->manager->flush();
    }

    public function loadTeachers(): void
    {

        // static datas
        $datas = [
            [
                'email' => 'doe.mi@example.com',
                'password' => '123',
                'roles' => ['teacher'],

                'firstName' => 'Micheal',
                'lastName' => 'Donokey',
                'nationality' => 'USA',
                'availability' => 'Available',
                'qualification' => 'English(US)',
            ],
            [
                'email' => 'ge.la@example.com',
                'password' => '123',
                'roles' => ['teacher'],

                'firstName' => 'Gérard',
                'lastName' => 'Lambert',
                'nationality' => 'France',
                'availability' => 'Available',
                'qualification' => 'French',
            ],
            [
                'email' => 'ta.li@example.com',
                'password' => '123',
                'roles' => ['teacher'],

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
        
        // dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($this->faker->unique()->safeEmail());
            $password = $this->hasher->hashPassword($user, '123');
            $user->setPassword($password);
            $user->setRoles(['teacher']);

            $this->manager->persist($user);

            $teacher = new Teacher();
            $teacher->setFirstName($this->faker->firstName());
            $teacher->setLastName($this->faker->lastName());
            $teacher->setNationality($this->faker->country());

            $qualification = $this->faker->randomElement(['English(US)', 'English(Uk)', 'French', 'Chinese', 'Spanish', 'Japanese', 'Russian', 'German', 'Italian', 'Portuguese', 'Korean', 'Arabic']);
            $teacher->setQualification($qualification);

            $availability = $this->faker->randomElement(['Available', 'Busy']);
            $teacher->setAvailability($availability);

            $teacher->setUser($user);

            $this->manager->persist($user);
        }
        $this->manager->flush();
    }

    public function loadLanguages(): void
    {
        
        // static datas
        $datas = [
            [
                'name' => 'French',
            ],
            [
                'name' => 'English',
            ],
            [
                'name' => 'Chinese',
            ],
            [
                'name' => 'Spanish',
            ],
            [
                'name' => 'Japanese',
            ],
            [
                'name' => 'Russian',
            ],
            [
                'name' => 'German',
            ],
            [
                'name' => 'Italian',
            ],
            [
                'name' => 'Portuguese',
            ],
            [
                'name' => 'Korean',
            ],
            [
                'name' => 'Arabic',
            ],
        ];

        foreach ($datas as $data) {
            $language = new Language();
            $language->setName($data['name']);

            $this->manager->persist($language);
        }
        $this->manager->flush();

        // Dynamic datas

        
    }

    public function loadSessions(): void
    {
        //static datas

        $teacherRepository = $this->manager->getRepository(Teacher::class);
        $teachers = $teacherRepository->findAll();

        $teacher1 = $teacherRepository->find(1);
        $teacher2 = $teacherRepository->find(2);
        $teacher3 = $teacherRepository->find(3);
        
        $datas = [
            [
                'type' => 'Online course',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('13:30:00'),
                'teacher' => [$teacher1],

            ],
            [
                'type' => 'Session 2',
                'date' => new DateTime('2023-08-04'),
                'time' => new DateTime('14:15:00'),
                'teacher' => [$teacher2],
            ],
            [
                'type' => 'Session 3',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('15:15:00'),
                'teacher' => [$teacher3],
            ]
        ];

        foreach ($datas as $data) {
            $session = new Session();
            $session->setType($data['type']);
            $session->setDate($data['date']);
            $session->setTime($data['time']);
            $session->setTeacher($data['teacher'][0]);

            $this->manager->persist($session);
        }
        $this->manager->flush();

        // dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $session = new Session();
            $session->setType($this->faker->randomElement(['Online course', 'Session 2', 'Session 3']));
            $session->setDate($this->faker->dateTimeBetween('-1 year', 'now'));
            $session->setTime($this->faker->dateTimeBetween('-1 year', 'now'));
            $session->setTeacher($this->faker->randomElement($teachers));

            $this->manager->persist($session);
        }
        $this->manager->flush();
    }

    public function loadFormations(): void
    {
        //static datas

        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);
        
        $datas = [
            [
                'title' => 'Formation 1',
                'objective' => 'Online course',
                'duration' => 30,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
                'cost' => 100,
                'language' => $language1,
            ],
            [
                'title' => 'Formation 2',
                'objective' => 'Online course',
                'duration' => 45,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
                'cost' => 50,
                'language' => $language2,
            ],
            [
                'title' => 'Formation 3',
                'objective' => 'Online course',
                'duration' => 60,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 3,
                'cost' => 75,
                'language' => $language3,
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
            $formation->setLanguage($data['language']);

            $this->manager->persist($formation);
        }
        $this->manager->flush();

        // dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $formation = new Formation();
            $formation->setTitle($this->faker->sentence());
            $formation->setObjective($this->faker->sentence());
            $formation->setDuration($this->faker->numberBetween(30, 60));
            $formation->setStartDate($this->faker->dateTimeBetween('-1 year', 'now'));
            $formation->setSatisfaction($this->faker->numberBetween(1, 5));
            $formation->setCost($this->faker->numberBetween(50, 100));
            $formation->setLanguage($this->faker->randomElement($languages));

            $this->manager->persist($formation);
        }
        $this->manager->flush();
    }

    public function loadQuizzes(): void
    {
        //static datas

        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);

        $datas = [
            [
                'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'answer' => ['answer 1'],
                'title' => 'Quiz 1',
                'score' => 5,
                'level' => 1,
                'language' => $language1,
            ],
            [
                'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, quas?',
                'answer' => ['answer 4'],
                'title' => 'Quiz 2',
                'score' => 5,
                'level' => 1,
                'language' => $language2
            ],
            [
                'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio quidem nam explicabo, vel alias?',
                'answer' => ['answer 2'],
                'title' => 'Quiz 3',
                'score' => 5,
                'level' => 1,
                'language' => $language3
            ]

        ];

        foreach ($datas as $data) {
            $quiz = new Quiz();
            $quiz->setQuestion($data['question']);
            $quiz->setAnswer($data['answer'][0]);
            $quiz->setScore($data['score']);
            $quiz->setLevel($data['level']);
            $quiz->setTitle($data['title']);
            $quiz->setLanguage($data['language']);
            
            $this->manager->persist($quiz);
        }
        $this->manager->flush();

        //données dynamiques

        for ($i = 0; $i < 20; $i++) {
            $quiz = new Quiz();
            $quiz->setQuestion($this->faker->sentence());
            $quiz->setAnswer($this->faker->sentence());
            $quiz->setScore($this->faker->numberBetween(1, 10));
            $quiz->setLevel($this->faker->numberBetween(1, 10));
            $quiz->setTitle($this->faker->sentence());
            $quiz->setLanguage($this->faker->randomElement($languages));

            $this->manager->persist($quiz);
        }
        $this->manager->flush();
    }
    public function loadLessons(): void
    {
        //static datas

        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);

        $datas = [
            [
                'title' => 'Lesson 1',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam in expedita mollitia impedit! Illo optio sed nisi aperiam libero. ',
                'level' => 1,
                'language' => $language1
            ],
            [
                'title' => 'Lesson 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam in expedita mollitia impedit! Illo optio sed nisi aperiam libero. ',
                'level' => 2,
                'language' => $language2
            ],
            [
                'title' => 'Lesson 3',
                'content' => 'Dolores ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam in expedita mollitia impedit! Illo optio sed nisi aperiam libero. ',
                'level' => 3,
                'language' => $language3
            ]
        ];

        foreach ($datas as $data) {
            $lesson = new Lesson();
            $lesson->setTitle($data['title']);
            $lesson->setContent($data['content']);
            $lesson->setLevel($data['level']);
            $lesson->setLanguage($data['language']);

            $this->manager->persist($lesson);
        }
        $this->manager->flush();

        // dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $lesson = new Lesson();
            $lesson->setTitle($this->faker->sentence());
            $lesson->setContent($this->faker->sentence());
            $lesson->setLevel($this->faker->randomNumber(1, 20));
            $lesson->setLanguage($this->faker->randomElement($languages));

            $this->manager->persist($lesson);
        }
        $this->manager->flush();
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
        for ($i = 0; $i < 20; $i++) {
            $assignment = new Assignment();
            $assignment->setTitle($this->faker->sentence());
            $assignment->setContent($this->faker->sentence());
            $assignment->setStartDate($this->faker->dateTimeBetween('-1 year', 'now'));
            $assignment->setDueDate($this->faker->dateTimeBetween('-1 year', 'now'));
            $assignment->setGrade($this->faker->numberBetween(1, 10));

            $this->manager->persist($assignment);
        }
        $this->manager->flush();
    }


    public function loadFlags(): void
    {
        //static datas

        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);

        $datas = [
            [
                'country' => 'Flag 1',
                'image' => 'Flag 1',
                'iso_code' => 'Flag 1',
                'language' => $language1
            ],
            [
                'country' => 'Flag 2',
                'image' => 'Flag 2',
                'iso_code' => 'Flag 2',
                'language' => $language2
            ],
            [
                'country' => 'Flag 3',
                'image' => 'Flag 3',
                'iso_code' => 'Flag 3',
                'language' => $language3
            ]
        ];

        foreach ($datas as $data) {
            $flag = new Flag();
            $flag->setCountry($data['country']);
            $flag->setImage($data['image']);
            $flag->setIsoCode($data['iso_code']);
            $flag->setLanguage($data['language']);

            $this->manager->persist($flag);
        }
        $this->manager->flush();

        //dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $flag = new Flag();
            $flag->setCountry($this->faker->country());
            $flag->setImage($this->faker->word());
            $flag->setIsoCode($this->faker->countryCode());
            $flag->setLanguage($this->faker->randomElement($languages));

            $this->manager->persist($flag);
        }
        $this->manager->flush();
    }

    public function loadResources(): void
    {
        //static datas

        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);

        $datas = [
            [
                'type' => 'Resource 1',
                'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia eius eaque id aperiam aspernatur impedit eos atque quas, autem voluptatum. Facere fugiat amet consequatur dicta.',
                'publishedDate' => new DateTime('2023-10-02'),
                'language' => $language1
            ],
            [
                'type' => 'Resource 2',
                'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia eius eaque id aperiam aspernatur impedit eos atque quas, autem voluptatum. Facere fugiat amet consequatur dicta.',
                'publishedDate' => new DateTime('2023-10-08'),
                'language' => $language2
            ],
            [
                'type' => 'Resource 3',
                'title' => 'Consectetur adipisicing elit.',
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia eius eaque id aperiam aspernatur impedit eos atque quas, autem voluptatum. Facere fugiat amet consequatur dicta.',
                'publishedDate' => new DateTime('2023-09-22'),
                'language' => $language3
            ]
        ];
        foreach ($datas as $data) {
            $resource = new Resource();
            $resource->setType($data['type']);
            $resource->setTitle($data['title']);
            $resource->setContent($data['content']);
            $resource->setPublishedDate($data['publishedDate']);
            $resource->setLanguage($data['language']);

            $this->manager->persist($resource);
        }

        $this->manager->flush();

        //dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $resource = new Resource();
            $resource->setType($this->faker->word());
            $resource->setTitle($this->faker->sentence());
            $resource->setContent($this->faker->paragraph());
            $resource->setPublishedDate($this->faker->dateTime());
            $resource->setLanguage($this->faker->randomElement($languages));

            $this->manager->persist($resource);
        }
        $this->manager->flush();
    }

    public function loadPayments(): void
    {
        //static datas

        $formationRepository = $this->manager->getRepository(Formation::class);
        $formations = $formationRepository->findAll();
        $formation1 = $formationRepository->find(1);
        $formation2 = $formationRepository->find(2);
        $formation3 = $formationRepository->find(3);
        $studentRepository = $this->manager->getRepository(Student::class);
        $students = $studentRepository->findAll();
        $student1 = $studentRepository->find(1);
        $student2 = $studentRepository->find(2);
        $student3 = $studentRepository->find(3);

        $datas = [
            [
                'date' => new DateTime('2023-10-02'),
                'type' => 'Online course',
                'formation' => $formation1,
                'student' => $student1
            ],
            [
                'date' => new DateTime('2023-10-04'),
                'type' => 'Online course',
                'formation' => $formation2,
                'student' => $student2
            ],
            [
                'date' => new DateTime('2023-10-09'),
                'type' => 'Online course',
                'formation' => $formation3,
                'student' => $student3
            ]
        ];

        foreach ($datas as $data) {
            $payment = new Payment();
            $payment->setDate($data['date']);
            $payment->setType($data['type']);
            $payment->setFormation($data['formation']);
            $payment->setStudent($data['student']);

            $this->manager->persist($payment);
        }
        $this->manager->flush();

        //dynamic datas

        for ($i = 0; $i < 20; $i++) {
            $payment = new Payment();
            $payment->setDate($this->faker->dateTime());
            $payment->setType($this->faker->word());
            $payment->setFormation($this->faker->randomElement($formations));
            $payment->setStudent($this->faker->randomElement($students));

            $this->manager->persist($payment);
        }
        $this->manager->flush();
    }
}
