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
                $em = $doctrine->getManager();
                $userRepository = $em->getRepository(User::class);

                // $newUser = new User ();
                // $newUser->setEmail('Xia.Zhang@qq.com');
                // $newUser->setPassword('123');
                // $newUser->setRoles(['ROLE_USER']);
                // $em->persist($newUser);
                // $em->flush();

                // Find all users
                $users = $userRepository->findAll();

                // Find user 7
                $user7 = $userRepository->find(7);

                // Update user 2
                $user2 = $userRepository->find(2);
                if ($user2) {
                    $user2->setEmail('corge@example.com');
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
            'newUser'=> '$newUser',
            'users'=> $users,
            'user7'=> $user7,
            'user2'=> $user2
        ]);  
    }

    #[Route ('/student', name: 'app_test_student')]
    public function student(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        // appel du répository Student
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
        $student2 = $studentRepository->find(2);
        if ($student2) {
            $student2->setFirstName('corge');
            $student2->setLastName('grault');
            $student2->setBirthdate(new DateTime('1996-01-01 00:00:00'));
            $student2->setNationality('French');
            $student2->setLevel(1);

            $em->persist($student2);
            $em->flush();
        }

        return $this->render('test/student.html.twig', [
            'controller_name' => 'TestController',
            'students'=> $students,
            'newstudent'=> $newStudent,
            'student2'=> $student2,
            'student7'=> $student7,
        ]);
    }
    // Create function session for test
    #[Route('/session', name: 'app_test_session')]
    public function session(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();
        // call repository Session
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
        // call repository Assignment
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
        // call repository Resource
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
        // call repository Quiz
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
        // call repository Payment
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
        // call repository Lesson
        $lessonRepository = $em->getRepository(Lesson::class);
        $languageRepository = $em->getRepository(Language::class);

        // Find all lessons
        $lessons = $lessonRepository->findAll();

        // Create a new lesson
        $newLesson = new Lesson();
        $newLesson->setTitle('Title');
        $newLesson->setContent('Content');
        $newLesson->setExercice('Exercice');
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
            $updateLesson2->setExercice('Exercice2');
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
        // call repository Language
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
}
