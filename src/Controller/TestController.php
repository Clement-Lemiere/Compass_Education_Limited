<?php

namespace App\Controller;

use DateTime;
use App\Entity\Assignment;
use App\Entity\User;
use App\Entity\Student;
use App\Entity\Session;
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
}
