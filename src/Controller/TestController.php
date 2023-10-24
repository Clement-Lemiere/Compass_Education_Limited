<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Entity\Student;
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
        $newStudent->setUser($this->getUser());

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
            $student2->setUser($this->getUser());

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
}
