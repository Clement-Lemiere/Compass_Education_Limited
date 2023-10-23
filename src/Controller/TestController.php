<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(ManagerRegistry $doctrine): Response
    {
                $em = $doctrine->getManager();
                $userRepository = $this->$em()->getRepository(User::class);
                $user = $userRepository->findAll();
                $entityManager = $this->$em()->getManager();

        
                $user = $userRepository->find(7);
                // Soft delete the user.
                $user->setDeletedAt(new \DateTimeImmutable());
                $entityManager->persist($user);
                $entityManager->flush();
                
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
