<?php

namespace App\DataFixtures;

use DateTime;
use DateTimeInterface;
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
use App\Entity\FAQ;
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
        $this->loadLanguages();
        $this->loadResources();
        $this->loadLessons();
        $this->loadAssignments();
        $this->loadStudents();
        $this->loadTeachers();
        $this->loadSessions();
        $this->loadFormations();
        $this->loadQuizzes();
        $this->loadPayments();
        $this->loadFAQs();
    }

    public function loadStudents(): void
    {
        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);

        $assignmentRepository = $this->manager->getRepository(Assignment::class);
        $assignments = $assignmentRepository->findAll();
        $french = $assignmentRepository->find(1);
        $english = $assignmentRepository->find(2);
        $chinese = $assignmentRepository->find(3);



        $datas = [
            [
                'email' => 'foo@example.com',
                'password' => '123',
                'roles' => ['student'],
                'firstName' => 'Orion',
                'lastName' => 'Spikes',
                'birthdate' => new DateTime( '1990-02-19' ),
                'nationality' => 'USA',
                'level' => 4,
                'languages' => [$language1],
                'assignments' => [$french],

            ],
            [
                'email' => 'bar@example.com',
                'password' => '123',
                'roles' => ['student'],
                'firstName' => 'Alice',
                'lastName' => 'Delacourt',
                'birthdate' => new DateTime( '1998-11-07' ),
                'nationality' => 'France',
                'level' => 5,
                'languages' => [$language2],
                'assignments' => [$english],
            ],
            [
                'email' => 'baz@example.com',
                'password' => '123',
                'roles' => ['student'],
                'firstName' => 'Marco',
                'lastName' => 'Vellini',
                'birthdate' => new DateTime('2008-04-13' ),
                'nationality' => 'Italian',
                'level' => 6,
                'languages' => [$language3],
                'assignments' => [$chinese],
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
            
            $birthdate = $data['birthdate'];
            // Check if $birthdate is a string and create a DateTimeInterface object
            if (is_string($birthdate)) {
                $birthdate = new DateTime($birthdate);
            }
            // Check if $birthdate is an array and create a DateTimeInterface object
            if (is_array($birthdate)) {
                $birthdate = new DateTime($birthdate['date']);
            }
            $student->setBirthdate($birthdate);

            $student->setNationality($data['nationality']);
            $student->setLevel($data['level']);

            foreach ($data['languages'] as $language) {
                $student->addLanguage($language);
            }

            foreach ($data['assignments'] as $assignment) {
                $student->addAssignment($assignment);
            }

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

            $birthDate = $this->faker->dateTimeBetween('-40 years', '-5 years');
            $student->setBirthDate($birthDate);

            $level = $this->faker->numberBetween(1, 10);
            $student->setLevel($level);
            $student->addLanguage($languages[$this->faker->numberBetween(0, 7)]);

            $student->addAssignment($assignments[$this->faker->numberBetween(0, 7)]);
            
            $student->setUser($user);

            $this->manager->persist($user);
        }
        $this->manager->flush();
    }

    public function loadTeachers(): void
    {

        $repository = $this->manager->getRepository(Language::class);
        $languages = $repository->findAll();
        $language1 = $repository->find(1);
        $language2 = $repository->find(2);
        $language3 = $repository->find(3);
        $language4 = $repository->find(4);
        $language5 = $repository->find(5);
        $language6 = $repository->find(6);
        $language7 = $repository->find(7);
        $language8 = $repository->find(8);


        // static datas
        $datas = [
            [
                'email' => 'camille.leclerc@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Camille',
                'lastName' => 'Leclerc',
                'nationality' => 'French',
                'availability' => 'Available',
                'qualification' => 'French',
                'languages' => [$language3],
            ],
            [
                'email' => 'emily.anderson@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Emily',
                'lastName' => 'Anderson',
                'nationality' => 'British',
                'availability' => 'Available',
                'qualification' => 'English',
                'languages' => [$language2],
            ],
            [
                'email' => 'markus.wagner@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Markus',
                'lastName' => 'Wagner',
                'nationality' => 'German',
                'availability' => 'Available',
                'qualification' => 'German',
                'languages' => [$language4],
            ],
            [
                'email' => 'isabella.rossi@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Isabella',
                'lastName' => 'Rossi',
                'nationality' => 'Italian',
                'availability' => 'Available',
                'qualification' => 'Italian',
                'languages' => [$language5],
            ],
            [
                'email' => 'javier.rodriguez@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Javier',
                'lastName' => 'Rodriguez',
                'nationality' => 'Spanish',
                'availability' => 'Available',
                'qualification' => 'Spanish',
                'languages' => [$language8],
            ],
            [
                'email' => 'wei.chen@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Wei',
                'lastName' => 'Chen',
                'nationality' => 'Chinese',
                'availability' => 'Available',
                'qualification' => 'Chinese',
                'languages' => [$language1],
            ],
            [
                'email' => 'yuki.tanaka@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Yuki',
                'lastName' => 'Tanaka',
                'nationality' => 'Japanese',
                'availability' => 'Available',
                'qualification' => 'Japanese',
                'languages' => [$language6],
            ],
            [
                'email' => 'minho.kim@email.com',
                'password' => '123',
                'roles' => ['teacher'],
                'firstName' => 'Min-Ho',
                'lastName' => 'Kim',
                'nationality' => 'South Korean',
                'availability' => 'Available',
                'qualification' => 'Korean',
                'languages' => [$language7],
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

            foreach ($data['languages'] as $language) {
                $teacher->addLanguage($language);
            }

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
            $teacher->addLanguage($languages[$this->faker->numberBetween(0, 7)]);

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
                'name' => 'Chinese',
                'description' => 'Exploring Chinese connects you to a millennia-old history. Mandarin, with its fascinating characters, offers economic, cultural opportunities and a profound understanding of Chinese civilization.'
            ],
            [
                'name' => 'English',
                'description' => 'Mastering English broadens horizons. Become a global citizen, access a wealth of knowledge, communicate worldwide, and discover contemporary literature and technology.'
            ],
            [
                'name' => 'French',
                'description' => 'Learning French opens doors to refined culture, exquisite gastronomy, and timeless artistry. It\'s the language of love, diplomacy, and enduring elegance.'
            ],
            [
                'name' => 'German',
                'description' => 'Mastering German provides access to efficiency, innovation, and unmatched precision. Explore a culture rich in history, classical music, and entrepreneurial spirit.'
            ],
            [
                'name' => 'Italian',
                'description' => 'Italian, the language of art, fashion, and delicious cuisine, transports speakers into a world of eternal beauty. It\'s the key to understanding the dolce vita.'
            ],
            [
                'name' => 'Japanese',
                'description' => 'Learning Japanese is delving into the harmony between tradition and modernity. Explore refined aesthetics, technological ingenuity, and a culture that values balance and contemplation.'
            ],
            [
                'name' => 'Korean',
                'description' => 'Korean reveals a captivating fusion of tradition and modernity. Learning this language opens the door to a rich pop culture, tasty cuisine, and deep interpersonal connections.'
            ],
            [
                'name' => 'Spanish',
                'description' => 'Speaking Spanish is stepping into the vibrant world of passion, music, and conviviality. This language awakens the senses, opens doors to sunny destinations, and warm cultures.'
            ],
        ];

        foreach ($datas as $data) {
            $language = new Language();
            $language->setName($data['name']);
            $language->setDescription($data['description']);

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

        $studentRepository = $this->manager->getRepository(Student::class);
        $students = $studentRepository->findAll();

        $student1 = $studentRepository->find(1);
        $student2 = $studentRepository->find(2);
        $student3 = $studentRepository->find(3);

        $datas = [
            [
                'type' => 'Online course',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('13:30:00'),
                'teacher' => [$teacher1],
                'student' => $student1,
            ],
            [
                'type' => 'Session 2',
                'date' => new DateTime('2023-08-04'),
                'time' => new DateTime('14:15:00'),
                'teacher' => [$teacher2],
                'student' => $student2,
            ],
            [
                'type' => 'Session 3',
                'date' => new DateTime('2023-10-04'),
                'time' => new DateTime('15:15:00'),
                'teacher' => [$teacher3],
                'student' => $student3,
            ]
        ];

        foreach ($datas as $data) {
            $session = new Session();
            $session->setType($data['type']);
            $session->setDate($data['date']);
            $session->setTime($data['time']);
            $session->setTeacher($data['teacher'][0]);
            $session->setStudent($data['student']);

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
            $session->setStudent($this->faker->randomElement($students));

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
                'title' => 'Chinese economic lexicon part 2/3',
                'objective' => ' Online course',
                'duration' => 60,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 5,
                'cost' => 100,
                'language' => $language1,
            ],
            [
                'title' => 'English for business',
                'objective' => 'Online course',
                'duration' => 45,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 4,
                'cost' => 75,
                'language' => $language2,
            ],
            [
                'title' => ' French Arts',
                'objective' => 'Online course',
                'duration' => 45,
                'startDate' => new DateTime('2023-10-04'),
                'satisfaction' => 4,
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
        $language4 = $languageRepository->find(4);
        $language5 = $languageRepository->find(5);
        $language6 = $languageRepository->find(6);
        $language7 = $languageRepository->find(7);
        $language8 = $languageRepository->find(8);

        $datas = [
            [
                'title' => 'French Basics',
                'content' => 'Learn the essentials of French language and culture. Explore common phrases, greetings, and basic grammar to start your journey into the beauty of French communication.',
                'level' => 1,
                'language' => $language3,
            ],
            [
                'title' => 'English Conversation Skills',
                'content' => 'Enhance your English conversation skills. This lesson covers everyday topics, useful expressions, and practical communication strategies. Build confidence in your English communication abilities.',
                'level' => 2,
                'language' => $language2,
            ],
            [
                'title' => 'Chinese Characters Unveiled',
                'content' => 'Discover the fascinating world of Chinese characters. This lesson introduces basic characters, stroke order, and their cultural significance. Lay the foundation for Mandarin proficiency.',
                'level' => 3,
                'language' => $language1,
            ],
            [
                'title' => 'Spanish Travel Essentials',
                'content' => 'Prepare for your Spanish-speaking adventures. Learn essential phrases, navigate common travel situations, and immerse yourself in the language and customs of Spanish-speaking regions.',
                'level' => 1,
                'language' => $language8,
            ],
            [
                'title' => 'Japanese Cultural Insights',
                'content' => 'Explore the rich cultural nuances of the Japanese language. Dive into traditional customs, social etiquette, and expressions unique to Japanese communication. Enhance your understanding of Japan.',
                'level' => 2,
                'language' => $language6,
            ],
            [
                'title' => 'German Grammar Essentials',
                'content' => 'Master fundamental German grammar rules. This lesson covers verb conjugations, sentence structure, and key grammar concepts to solidify your understanding of the German language.',
                'level' => 3,
                'language' => $language4,
            ],
            [
                'title' => 'Italian Art and Language Fusion',
                'content' => 'Merge the beauty of Italian art with language learning. Explore art-related vocabulary, expressions, and cultural insights. Immerse yourself in the artistic charm of the Italian language.',
                'level' => 1,
                'language' => $language5,
            ],
            [
                'title' => 'Korean Pop Culture Phrases',
                'content' => 'Dive into the world of Korean pop culture. Learn trendy phrases, expressions from K-dramas, and key aspects of contemporary Korean language usage. Connect with modern Korean communication.',
                'level' => 2,
                'language' => $language7,
            ],
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

        // for ($i = 0; $i < 20; $i++) {
        //     $lesson = new Lesson();
        //     $lesson->setTitle($this->faker->sentence());
        //     $lesson->setContent($this->faker->sentence());
        //     $lesson->setLevel($this->faker->randomNumber(1, 20));
        //     $lesson->setLanguage($this->faker->randomElement($languages));

        //     $this->manager->persist($lesson);
        // }
        // $this->manager->flush();
    }

    public function loadAssignments(): void
    {
        $lessonRepository = $this->manager->getRepository(Lesson::class);
        $lessons = $lessonRepository->findAll();
        $frenchLesson = $lessonRepository->find(1);
        $englishLesson = $lessonRepository->find(2);
        $chineseLesson = $lessonRepository->find(3);
        $spanishLesson = $lessonRepository->find(4);
        $japaneseLesson = $lessonRepository->find(5);
        $germanLesson = $lessonRepository->find(6);
        $italianLesson = $lessonRepository->find(7);
        $koreanLesson = $lessonRepository->find(8);


        //static datas
        $datas = [
            [
                'title' => 'French Conversation Challenge',
                'content' => 'Engage in a French conversation challenge. Discuss daily topics, share opinions, and practice fluency. Start from ' .
                    'October 4, 2023, and submit by October 7, 2023. Grade: 7.',
                'startDate' => new DateTime('2023-10-04'),
                'dueDate' => new DateTime('2023-10-07'),
                'grade' => 7,
                'lessons' => $frenchLesson,
                 
            ],
            [
                'title' => 'English Writing Mastery',
                'content' => 'Master English writing skills. Create a compelling essay on a given topic. Begin on October 8, 2023, and submit by ' .
                    'October 10, 2023. Grade: 8.',
                'startDate' => new DateTime('2023-10-08'),
                'dueDate' => new DateTime('2023-10-10'),
                'grade' => 8,
                'lessons' => $englishLesson,
            ],
            [
                'title' => 'Chinese Character Exploration',
                'content' => 'Explore Chinese characters and their meanings. Write a short composition using newly learned characters. Commence on ' .
                    'October 12, 2023, and complete by October 15, 2023. Grade: 6.',
                'startDate' => new DateTime('2023-10-12'),
                'dueDate' => new DateTime('2023-10-15'),
                'grade' => 6,
                'lessons' => $chineseLesson,
            ],
            [
                'title' => 'Spanish Cultural Reflection',
                'content' => 'Reflect on a Spanish cultural aspect. Write a commentary on its significance. Initiate on October 18, 2023, and ' .
                    'finalize by October 20, 2023. Grade: 7.',
                'startDate' => new DateTime('2023-10-18'),
                'dueDate' => new DateTime('2023-10-20'),
                'grade' => 7,
                'lessons' => $spanishLesson,
            ],
            [
                'title' => 'Japanese Language and Tradition Essay',
                'content' => 'Compose an essay on the integration of language and tradition in Japanese society. Begin on October 22, 2023, and ' .
                    'submit by October 25, 2023. Grade: 8.',
                'startDate' => new DateTime('2023-10-22'),
                'dueDate' => new DateTime('2023-10-25'),
                'grade' => 8,
                'lessons' => $japaneseLesson,
            ],
            [
                'title' => 'German Grammar Quiz',
                'content' => 'Test your knowledge of German grammar. Answer questions on verb conjugations, cases, and syntax. Start from October ' .
                    '28, 2023, and complete by October 31, 2023. Grade: 7.',
                'startDate' => new DateTime('2023-10-28'),
                'dueDate' => new DateTime('2023-10-31'),
                'grade' => 7,
                'lessons' => $germanLesson,
            ],
            [
                'title' => 'Italian Artistic Expression Project',
                'content' => 'Create a project showcasing Italian artistic expressions. Include visual elements and a brief explanation. Commence on ' .
                    'November 3, 2023, and conclude by November 6, 2023. Grade: 8.',
                'startDate' => new DateTime('2023-11-03'),
                'dueDate' => new DateTime('2023-11-06'),
                'grade' => 8,
                'lessons' => $italianLesson,
            ],
            [
                'title' => 'Korean Pop Culture Analysis',
                'content' => 'Analyze a aspect of Korean pop culture. Present findings on its impact and popularity. Begin on November 9, 2023, and ' .
                    'finish by November 12, 2023. Grade: 7.',
                'startDate' => new DateTime('2023-11-09'),
                'dueDate' => new DateTime('2023-11-12'),
                'grade' => 7,
                'lessons' => $koreanLesson,
            ],
        ];
        foreach ($datas as $data) {
            $assignment = new Assignment();
            $assignment->setTitle($data['title']);
            $assignment->setContent($data['content']);
            $assignment->setStartDate($data['startDate']);
            $assignment->setDueDate($data['dueDate']);
            $assignment->setGrade($data['grade']);

            foreach ($data['lessons'] as $lesson) {
                $assignment->addLesson($lesson);
            }
            

            $this->manager->persist($assignment);
        }
        $this->manager->flush();

        //Dynamic datas
        // for ($i = 0; $i < 20; $i++) {
        //     $assignment = new Assignment();
        //     $assignment->setTitle($this->faker->sentence());
        //     $assignment->setContent($this->faker->sentence());
        //     $assignment->setStartDate($this->faker->dateTimeBetween('-1 year', 'now'));
        //     $assignment->setDueDate($this->faker->dateTimeBetween('-1 year', 'now'));
        //     $assignment->setGrade($this->faker->numberBetween(1, 10));

        //     $this->manager->persist($assignment);
        // }
        // $this->manager->flush();
    }



    public function loadResources(): void
    {
        //static datas

        $languageRepository = $this->manager->getRepository(Language::class);
        $languages = $languageRepository->findAll();
        $language1 = $languageRepository->find(1);
        $language2 = $languageRepository->find(2);
        $language3 = $languageRepository->find(3);
        $language4 = $languageRepository->find(4);
        $language5 = $languageRepository->find(5);
        $language6 = $languageRepository->find(6);
        $language7 = $languageRepository->find(7);
        $language8 = $languageRepository->find(8);


        $datas = [
            [
                'type' => 'Language Basics Guide',
                'title' => 'Unlocking the Wonders of French',
                'content' => 'Discover the essentials of the French language. Master common phrases, pronunciation, and basic grammar rules to kickstart your French language journey.',
                'publishedDate' => new DateTime('2023-10-02'),
                'language' => $language3,
            ],
            [
                'type' => 'Language Mastery Handbook',
                'title' => 'Essential English Language Tips',
                'content' => 'Enhance your English language skills with this comprehensive guide. Explore tips on grammar, vocabulary expansion, and effective communication strategies.',
                'publishedDate' => new DateTime('2023-10-05'),
                'language' => $language2,
            ],
            [
                'type' => 'Character Writing Tutorial',
                'title' => 'Cracking the Code: Chinese Characters',
                'content' => 'Embark on a journey to understand and write Chinese characters. This resource provides step-by-step guidance on strokes, radicals, and character meanings.',
                'publishedDate' => new DateTime('2023-10-03'),
                'language' => $language1,
            ],
            [
                'type' => 'Cultural Insight Handbook',
                'title' => 'Navigating Spanish Culture',
                'content' => 'Immerse yourself in Spanish culture with this insightful guide. Learn about customs, traditions, and essential cultural nuances for effective language communication.',
                'publishedDate' => new DateTime('2023-10-09'),
                'language' => $language8,
            ],
            [
                'type' => 'Language and Tradition Manual',
                'title' => 'Japanese Language & Tradition Tips',
                'content' => 'Explore the synergy between the Japanese language and cultural traditions. Gain insights into idioms, expressions, and cultural nuances that shape the language.',
                'publishedDate' => new DateTime('2023-10-08'),
                'language' => $language6,
            ],
            [
                'type' => 'Grammar Essentials Handbook',
                'title' => 'Mastering German Grammar',
                'content' => 'This handbook is your guide to mastering German grammar. Dive into verb conjugations, cases, and sentence structure for a solid foundation in German language skills.',
                'publishedDate' => new DateTime('2023-10-12'),
                'language' => $language4,
            ],
            [
                'type' => 'Art and Language Fusion Guide',
                'title' => 'Italian Art & Language Connection',
                'content' => 'Explore the fusion of art and language in Italian culture. This guide offers tips on appreciating Italian art and understanding artistic expressions within the language.',
                'publishedDate' => new DateTime('2023-10-11'),
                'language' => $language5,
            ],
            [
                'type' => 'Pop Culture Language Tips',
                'title' => 'Navigating Korean Pop Culture',
                'content' => 'Delve into the world of Korean pop culture with this guide. Learn key phrases, expressions, and language nuances influenced by modern Korean entertainment.',
                'publishedDate' => new DateTime('2023-10-15'),
                'language' => $language7,
            ],
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

        // for ($i = 0; $i < 20; $i++) {
        //     $resource = new Resource();
        //     $resource->setType($this->faker->word());
        //     $resource->setTitle($this->faker->sentence());
        //     $resource->setContent($this->faker->paragraph());
        //     $resource->setPublishedDate($this->faker->dateTime());
        //     $resource->setLanguage($this->faker->randomElement($languages));

        //     $this->manager->persist($resource);
        // }
        // $this->manager->flush();
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

    public function loadFAQs(): void
    {

        $faqRepository = $this->manager->getRepository(FAQ::class);
        $faqs = $faqRepository->findAll();

        //static datas

        $datas = [
            [
                'question' => 'How do I enroll in a language course?',
                'answer' => 'To enroll, visit our website and navigate to the "Courses" section. Choose your desired language, select a course, and click on the "Enroll" button. Follow the instructions to complete the enrollment process.',
            ],
            [
                'question' => 'What technology do I need for online classes?',
                'answer' => 'You\'ll need a computer or laptop with a stable internet connection. Ensure you have a webcam, microphone, and speakers for interactive sessions. Our platform is compatible with common browsers like Chrome, Firefox, and Safari.',
            ],
            [
                'question' => 'Are the classes live or pre-recorded?',
                'answer' => 'Our classes are conducted live by experienced language instructors. Live sessions allow real-time interaction, Q&A, and personalized feedback, creating a dynamic and engaging learning experience.',
            ],
            [
                'question' => 'Can I access course materials after the live sessions?',
                'answer' => 'Yes, all course materials, including recorded sessions, presentations, and additional resources, are available in your account for review. This ensures you can reinforce your learning at your own pace.',
            ],
            [
                'question' => 'How can I get assistance if I face technical issues during a class?',
                'answer' => 'In case of technical issues, our support team is available 24/7. Contact us through the dedicated technical support channel provided on the platform, and we\'ll assist you promptly.',
            ],
            [
                'question' => 'What is the duration of each course?',
                'answer' => 'The duration varies depending on the course level and intensity. Most standard courses run for 8-12 weeks, with multiple sessions per week. Check the course details for specific duration information.',
            ],
            [
                'question' => 'Is there a placement test to determine my language proficiency level?',
                'answer' => 'Yes, we offer a placement test to assess your current language proficiency. The results help us recommend the most suitable course level for you, ensuring an optimal learning experience.',
            ],
            [
                'question' => 'Are there any scholarships or discounts available?',
                'answer' => 'We occasionally offer scholarships and discounts. Keep an eye on our website, newsletters, and social media for announcements. Additionally, we may have special promotions during certain periods.',
            ],
            [
                'question' => 'Can I switch to a different course if I find my current level too easy or challenging?',
                'answer' => 'Yes, we understand the importance of finding the right challenge. You can discuss your concerns with your instructor, and if necessary, we\'ll assist you in transferring to a more suitable course level.',
            ],
            [
                'question' => 'How do I receive my certificate upon course completion?',
                'answer' => 'Upon successful completion of the course, you will receive a digital certificate. Certificates are typically available for download directly from your account on the platform. Be sure to check your email for additional instructions.',
            ],
        ];


        foreach ($datas as $data) {
            $faq = new FAQ();
            $faq->setQuestion($data['question']);
            $faq->setAnswer($data['answer']);

            $this->manager->persist($faq);
        }

        $this->manager->flush();

        //dynamic datas

        // for ($i = 0; $i < 20; $i++) {
        //     $faq = new FAQ();
        //     $faq->setQuestion($this->faker->sentence());
        //     $faq->setAnswer($this->faker->paragraph());

        //     $this->manager->persist($faq);
        // }
        // $this->manager->flush();
    }
}
