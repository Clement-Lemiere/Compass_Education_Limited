<?php

namespace App\Controller\Admin;

use App\Entity\Teacher;
use App\Form\TeacherType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/admin')]
class AdminController extends AbstractController
{


    #[Route('/new', name: 'app_admin_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $teacher);
        $form->handleRequest($request);
        $user = $teacher->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['admin', 'teacher']);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_user_index', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/admin/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}




   

    