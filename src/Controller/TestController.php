<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test')]
class TestController extends AbstractController
{
    #[Route('/user', name: 'app_test_user')]
    public function index(ManagerRegistry $doctrine): Response
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
            'users'=> '$users',
            'user7'=> '$user7',
            'user2'=> '$user2'
        ]);
    }
}
