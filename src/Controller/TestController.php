<?php

namespace App\Controller;

use DateTime;
use App\Entity\Assignment;
use App\Entity\FAQ;
use App\Entity\Flag;
use App\Entity\Formation;
use App\Entity\Language;
use App\Entity\Lesson;
use App\Entity\Payment;
use App\Entity\Quiz;
use App\Entity\Resource;
use App\Entity\Student;
use App\Entity\Session;
use App\Entity\Teacher;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test')]
class TestController extends AbstractController
{
    #[Route('/user', name: 'app_test_user')]
    public function user(ManagerRegistry $doctrine): Response
    {
                // call doctrine
                $em = $doctrine->getManager();
                
                // call repository
                $userRepository = $em->getRepository(User::class);

                // Générer une adresse e-mail aléatoire
                $randomEmail = uniqid('user', true) . '@example.com';

                // Create a new user
                $newUser = new User ();
                $newUser->setEmail($randomEmail);
                $newUser->setPassword('123');
                $newUser->setRoles(['ROLE_USER']);

                $em->persist($newUser);
                $em->flush();

                // Find all users
                $users = $userRepository->findAll();

                // Find user 7
                $user7 = $userRepository->find(7);

                // Update user 2
                $userUpdate2 = $userRepository->find(2);
                if ($userUpdate2) {
                    $userUpdate2->setEmail('corge@example.com');
                    $em->flush();
                }
                // Delete user 3
                $user3 = $userRepository->find(3);
                if ($user3) {
                    $em->remove($user3);
                }
                $em->flush();
                
        return $this->render('test/user.html.twig', [
            'controller_name' => 'TestController',
            'newUser'=> $newUser,
            'users'=> $users,
            'userUpdate2'=> $userUpdate2,
            'user7'=> $user7,
        ]);  
    }

    #[Route('/teacher', name:'app_test_teacher')]
    public function teacher(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();
        
        // call repository
        $userRepository = $em->getRepository(User::class);
        $teacherRepository = $em->getRepository(Teacher::class);

        // Find all teachers
        $teachers = $teacherRepository->findAll();

        // Create a new teacher
        $newTeacher = new Teacher();
        $newTeacher->setFirstName('Clement');
        $newTeacher->setLastName('Lemiere');
        $newTeacher->setNationality('Français');
        $newTeacher->setQualification('Master');
        $newTeacher->setAvailability('Available');
        
        $em->persist($newTeacher);
        $em->flush();

        // Find teacher where id = 7
        $teacher7 = $teacherRepository->find(7);

        // Update teacher where id = 2
        $updateTeacher2 = $teacherRepository->find(2);
        if ($updateTeacher2) {
            $updateTeacher2->setFirstName('george');
            $updateTeacher2->setLastName('sand');
            $updateTeacher2->setNationality('Français');
            $updateTeacher2->setQualification('Master');
            $updateTeacher2->setAvailability('Available');

            $em->persist($updateTeacher2);
            $em->flush();
        }

        // Delete teacher where id = 3
        $deleteTeacher3 = $teacherRepository->find(3);
        if ($deleteTeacher3) {
            $em->remove($deleteTeacher3);
            $em->flush();
        }

        return $this->render('test/teacher.html.twig', [
            'controller_name' => 'TestController',
            'teachers'=> $teachers,    
            'newTeacher'=> $newTeacher,
            'updateTeacher2'=> $updateTeacher2,
            'teacher7'=> $teacher7,
            'deleteTeacher3'=> $deleteTeacher3,
        ]);
    }

    #[Route ('/student', name: 'app_test_student')]
    public function student(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // Call repository 
        $studentRepository = $em->getRepository(Student::class);

        // Find all students
        $students = $studentRepository->findAll();

        // Create a new student
        $newStudent = new Student();
        $newStudent->setFirstName('Julien');
        $newStudent->setLastName('Parsy');
        $newStudent->setBirthdate(new DateTime('1993-07-26 06:30:00'));
        $newStudent->setNationality('Français');
        $newStudent->setLevel(1);

        $em->persist($newStudent);
        $em->flush();


        // Find student where id = 7
        $student7 = $studentRepository->find(7);

        // Update student where id = 2
        $updateStudent2 = $studentRepository->find(2);
        if ($updateStudent2) {
            $updateStudent2->setFirstName('corge');
            $updateStudent2->setLastName('grault');
            $updateStudent2->setBirthdate(new DateTime('1996-01-01 00:00:00'));
            $updateStudent2->setNationality('French');
            $updateStudent2->setLevel(1);

            $em->persist($updateStudent2);
            $em->flush();
        }

        return $this->render('test/student.html.twig', [
            'controller_name' => 'TestController',
            'students'=> $students,
            'newstudent'=> $newStudent,
            'updateStudent2'=> $updateStudent2,
            'student7'=> $student7,
        ]);
    }
    // Create function session for test
    #[Route('/session', name: 'app_test_session')]
    public function session(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository 
        $sessionRepository = $em->getRepository(Session::class);

        // Find all sessions
        $sessions = $sessionRepository->findAll();

        // Create a new session
        $newSession = new Session();
        $newSession->setType('Type');
        $newSession->setDate((new DateTime('2023-01-01')));
        $newSession->setTime((new DateTime('00:50:00')));


        $em->persist($newSession);
        $em->flush();

        // Find session where id = 7
        $session7 = $sessionRepository->find(7);

        // Update session where id = 2
        $session2 = $sessionRepository->find(2);
        if ($session2) {
            $session2->setType('Type2');
            $session2->setDate((new DateTime('2023-01-01')));
            $session2->setTime((new DateTime('00:45:00')));

            $em->persist($session2);
            $em->flush();
        }

        // Delete session where id = 3
        $deleteSession = $sessionRepository->find(3);
        if ($deleteSession) {
            $em->remove($deleteSession);
            $em->flush();
        }

        return $this->render('test/session.html.twig', [
            'controller_name' => 'TestController',
            'sessions' => $sessions,
            'newSession' => $newSession,
            'session2' => $session2,
            'session7' => $session7,
            'deleteSession' => $deleteSession,
        ]);
    }

    #[Route('/assignment', name: 'app_test_assignment')]
    public function assignment(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $assignmentRepository = $em->getRepository(Assignment::class);

        // Find all assignments
        $assignments = $assignmentRepository->findAll();

        // Create a new assignment
        $newAssignment = new Assignment();
        $newAssignment->setTitle('newAssignment');
        $newAssignment->setContent('Content, not content');
        $newAssignment->setStartDate(new DateTime('2023-01-01'));
        $newAssignment->setDueDate(new DateTime('2023-12-30'));
        $newAssignment->setGrade('Grade');

        $em->persist($newAssignment);
        $em->flush();

        // Find assignment where id = 7
        $assignment7 = $assignmentRepository->find(7);

        // Update assignment where id = 2
        $updateAssignment = $assignmentRepository->find(2);

        if ($updateAssignment) {
            $updateAssignment->setTitle('newupdateAssignment');
            $updateAssignment->setContent('Content, not content');
            $updateAssignment->setStartDate(new DateTime('2023-01-01'));
            $updateAssignment->setDueDate(new DateTime('2023-12-30'));
            $updateAssignment->setGrade('Grade');

            $em->persist($updateAssignment);
            $em->flush();
        }

        // Delete assignment where id = 3
        $deleteAssignment = $assignmentRepository->find(3);
        if ($deleteAssignment) {
            $em->remove($deleteAssignment);
            $em->flush();
        }

        return $this->render('test/assignment.html.twig', [
            'controller_name' => 'TestController',
            'assignments' => $assignments,
            'newAssignment' => $newAssignment,
            'updateAssignment' => $updateAssignment,
            'assignment7' => $assignment7,
            'deleteAssignment' => $deleteAssignment,
        ]);
    }

    #[Route ('/resource', name: 'app_test_resource')]
    public function resource(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $resourceRepository = $em->getRepository(Resource::class);
        $languageRepository = $em->getRepository(Language::class);

        // Find all resources
        $resources = $resourceRepository->findAll();

        // Create a new resource
        $newResource = new Resource();
        $newResource->setType('Type');
        $newResource->setTitle('Title');
        $newResource->setContent('Content');
        $newResource->setPublishedDate(new DateTime('2023-01-01'));
        $newResource->setLanguage($languageRepository->find(1));
        
        $em->persist($newResource);
        $em->flush();

        // Find resource where id = 7
        $resource7 = $resourceRepository->find(7);

        // Update resource where id = 2
        $updateResource = $resourceRepository->find(2);
        if ($updateResource) {
            $updateResource->setType('Type2');
            $updateResource->setTitle('Title2');
            $updateResource->setContent('Content2');
            $updateResource->setPublishedDate(new DateTime('2023-01-01'));
            $updateResource->setLanguage($languageRepository->find(1));
            

            $em->persist($updateResource);
            $em->flush();
        }

        $deleteResource = $resourceRepository->find(3);
        if ($deleteResource) {
            $em->remove($deleteResource);
            $em->flush();
        }

        return $this->render('test/resource.html.twig', [
            'controller_name' => 'TestController',
            'resources' => $resources,
            'newResource' => $newResource,
            'updateResource' => $updateResource,
            'resource7' => $resource7,
            'deleteResource' => $deleteResource,
        ]);
    }

    #[Route ('/quiz', name: 'app_test_quiz')]
    public function quiz(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository 
        $quizRepository = $em->getRepository(Quiz::class);
        $languageRepository = $em->getRepository(Language::class);

        // Find all quizzes
        $quizzes = $quizRepository->findAll();

        // Create a new quiz
        $newQuiz = new Quiz();
        $newQuiz->setTitle('Title');
        $newQuiz->setQuestion('Question');
        $newQuiz->setAnswer('Answer');
        $newQuiz->setScore(10);
        $newQuiz->setLevel(1);
        $newQuiz->setLanguage($languageRepository->find(4));

        $em->persist($newQuiz);
        $em->flush();

        // Find quiz where id = 7
        $quiz7 = $quizRepository->find(7);

        // Update quiz where id = 2
        $updateQuiz2 = $quizRepository->find(2);
        if ($updateQuiz2) {
            $updateQuiz2->setTitle('Title2');
            $updateQuiz2->setQuestion('Question2');
            $updateQuiz2->setAnswer('Answer2');
            $updateQuiz2->setScore(20);
            $updateQuiz2->setLevel(2);
            $updateQuiz2->setLanguage($languageRepository->find(4));

            $em->persist($updateQuiz2);
            $em->flush();
        }

        // Delete quiz where id = 3
        $deleteQuiz = $quizRepository->find(3);
        if ($deleteQuiz) {
            $em->remove($deleteQuiz);
            $em->flush();
        }
        return $this->render('test/quiz.html.twig', [
            'controller_name' => 'TestController',
            'quizzes' => $quizzes,
            'newQuiz' => $newQuiz,
            'updateQuiz2' => $updateQuiz2,
            'quiz7' => $quiz7,
            'deleteQuiz' => $deleteQuiz,
        ]);
    }

    #[Route ('/payment', name: 'app_test_payment')]
    public function payment(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $paymentRepository = $em->getRepository(Payment::class);
        $studentRepository = $em->getRepository(Student::class);
        $formationRepository = $em->getRepository(Formation::class);

        // Find all payments
        $payments = $paymentRepository->findAll();

        // Create a new payment
        $newPayment = new Payment();
        $newPayment->setDate(new DateTime('2023-01-01 15:34:25'));
        $newPayment->setType('Type');
        $newPayment->setFormation($formationRepository->find(1));
        $newPayment->setStudent($studentRepository->find(1));

        $em->persist($newPayment);
        $em->flush();

        // Find payment where id = 7
        $payment7 = $paymentRepository->find(7);

        // Update payment where id = 2
        $updatePayment2 = $paymentRepository->find(2);
        if ($updatePayment2) {
            $newPayment->setDate(new DateTime('2023-05-01 00:59:30'));
            $updatePayment2->setType('Type2');
            $updatePayment2->setFormation($formationRepository->find(1));
            $updatePayment2->setStudent($studentRepository->find(1));

            $em->persist($updatePayment2);
            $em->flush();

        }

        // Delete payment where id = 3
        $deletePayment = $paymentRepository->find(3);
        if ($deletePayment) {
            $em->remove($deletePayment);
            $em->flush();
        }

        return $this->render('test/payment.html.twig', [
            'controller_name' => 'TestController',
            'payments' => $payments,
            'newPayment' => $newPayment,
            'updatePayment2' => $updatePayment2,
            'payment7' => $payment7,
            'deletePayment' => $deletePayment,
        ]);
    }

    #[Route ('/lesson', name: 'app_test_lesson')]
    public function lesson(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $lessonRepository = $em->getRepository(Lesson::class);
        $languageRepository = $em->getRepository(Language::class);

        // Find all lessons
        $lessons = $lessonRepository->findAll();

        // Create a new lesson
        $newLesson = new Lesson();
        $newLesson->setTitle('Title');
        $newLesson->setContent('Content');
        $newLesson->setLevel('Level');
        $newLesson->setLanguage($languageRepository->find(1));

        $em->persist($newLesson);
        $em->flush();

        // Find lesson where id = 7
        $lesson7 = $lessonRepository->find(7);

        // Update lesson where id = 2
        $updateLesson2 = $lessonRepository->find(2);
        if ($updateLesson2) {
            $updateLesson2->setTitle('Title2');
            $updateLesson2->setContent('Content2');
            $updateLesson2->setLevel('Level2');
            $updateLesson2->setLanguage($languageRepository->find(1));

            $em->persist($updateLesson2);
            $em->flush();
        }

        $deleteLesson3 = $lessonRepository->find(3);
        if ($deleteLesson3) {
            $em->remove($deleteLesson3);
            $em->flush();
        }

        return $this->render('test/lesson.html.twig', [
            'controller_name' => 'TestController',
            'lessons' => $lessons,
            'newLesson' => $newLesson,
            'updateLesson2' => $updateLesson2,
            'deleteLesson3' => $deleteLesson3,
            'lesson7' => $lesson7,
        ]);
    }

    #[Route ('/language', name: 'app_test_language')]
    public function language(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $languageRepository = $em->getRepository(Language::class);
        $formationRepository = $em->getRepository(Formation::class);

        // Find all languages
        $languages = $languageRepository->findAll();

        // Create a new language
        $newLanguage = new Language();
        $newLanguage->setName('Chinese');
        $newLanguage->addFormation($formationRepository->find(1));


        $em->persist($newLanguage);
        $em->flush();

        // Find language where id = 7
        $language7 = $languageRepository->find(7);
        
        // Update language where id = 2
        $updateLanguage2 = $languageRepository->find(2);
        if ($updateLanguage2) {
            $updateLanguage2->setName('English');
            $updateLanguage2->addFormation($formationRepository->find(1));

            $em->persist($updateLanguage2);
            $em->flush();
        }


        return $this->render('test/language.html.twig', [   
            'controller_name' => 'TestController',
            'languages' => $languages
            , 'newLanguage' => $newLanguage
            , 'updateLanguage2' => $updateLanguage2
            , 'language7' => $language7
        ]);
    }

    #[Route ('/formation', name:'app_test_formation')]
    public function formation(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $formationRepository = $em->getRepository(Formation::class);
        $languageRepository = $em->getRepository(Language::class);
        $paymentRepository = $em->getRepository(Payment::class);

        // Find all formations
        $formations = $formationRepository->findAll();

        // Create a new formation
        $newFormation = new Formation();
        $newFormation->setTitle('Title');
        $newFormation->setObjective('Objective');
        $newFormation->setDuration(1);
        $newFormation->setCost(100);
        $newFormation->setStartDate(new DateTime('2023-01-01'));
        $newFormation->setSatisfaction('Satisfaction');
        $newFormation->setLanguage($languageRepository->find(4));
        $newFormation->addPayment($paymentRepository->find(1));

        $em->persist($newFormation);
        $em->flush();

        // Find formation where id = 7
        $formation7 = $formationRepository->find(7);

        // Update formation where id = 2
        $updateFormation2 = $formationRepository->find(2);
        if ($updateFormation2) {
            $updateFormation2->setTitle('Title2');
            $updateFormation2->setObjective('Objective2');
            $updateFormation2->setDuration(2);
            $updateFormation2->setCost(200);
            $updateFormation2->setStartDate(new DateTime('2023-05-01'));
            $updateFormation2->setSatisfaction('Satisfaction2');
            $updateFormation2->setLanguage($languageRepository->find(4));
            $updateFormation2->addPayment($paymentRepository->find(1));

            $em->persist($updateFormation2);
            $em->flush();
        }

        return $this->render('test/formation.html.twig', [
            'controller_name' => 'TestController',
            'formations' => $formations,
            'newFormation' => $newFormation,
            'updateFormation2' => $updateFormation2,
            'formation7' => $formation7,
        ]);
    }

    #[Route ('/flag', name: 'app_test_flag')]
    public function flag(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository Flag
        $flagRepository = $em->getRepository(Flag::class);
        $languageRepository = $em->getRepository(Language::class);

        // Find all flags
        $flags = $flagRepository->findAll();

        // Create a new flag
        $newFlag = new Flag();
        $newFlag->setCountry('Country');
        $newFlag->setIsoCode('IsoCode');
        $newFlag->setImage('Image');
        $newFlag->setLanguage($languageRepository->find(1));

        $em->persist($newFlag);
        $em->flush();

        // Find flag where id = 7
        $flag7 = $flagRepository->find(7);

        // Update flag where id = 2
        $updateFlag2 = $flagRepository->find(2);
        if ($updateFlag2) {
            $updateFlag2->setCountry('Country2');
            $updateFlag2->setIsoCode('IsoCode2');
            $updateFlag2->setImage('Image2');
            $updateFlag2->setLanguage($languageRepository->find(1));

            $em->persist($updateFlag2);
            $em->flush();
        }

        // Delete flag where id = 2
        $deleteFlag3 = $flagRepository->find(3);
        if ($deleteFlag3) {
            $em->remove($deleteFlag3);
            $em->flush();
        }

        return $this->render('test/flag.html.twig', [
            'controller_name' => 'TestController',
            'flags' => $flags,
            'newFlag' => $newFlag,
            'updateFlag2' => $updateFlag2,
            'flag7' => $flag7,
            'deleteFlag3'=> $deleteFlag3,
        ]);
    }

    #[Route ('/faq', name: 'app_test_faq')]
    public function faq(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $faqRepository = $em->getRepository(FAQ::class);

        // Find all faqs
        $faqs = $faqRepository->findAll();

        // Create a new faq
        $newFaq = new FAQ();
        $newFaq->setQuestion('Question');
        $newFaq->setAnswer('Answer');

        $em->persist($newFaq);
        $em->flush();

        return $this->render('test/faq.html.twig', [
            'controller_name' => 'TestController',
            'faqs' => $faqs,
            'newFaq' => $newFaq,
        ]);
    }
}
