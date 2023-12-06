<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Language;
use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


#[Route('/')]
class FrontController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        
        return $this->render('front/home.html.twig');
    }

    #[Route('/languages', name: 'languages')]
    public function languages(): Response
    {
        return $this->render('front/languages.html.twig');
    }

    #[Route('/prices', name: 'prices')]
    public function prices(): Response
    {

        return $this->render('front/prices.html.twig');
    }

    #[Route('/team', name: 'team')]
    public function team(): Response
    {

        return $this->render('front/team.html.twig');
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {

        return $this->render('front/about.html.twig');
    }

    #[Route('/faq', name: 'faq')]
    public function faq(): Response
    {

        return $this->render('front/faq.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {

        return $this->render('front/contact.html.twig');
    }

    #[Route('/signUp', name: 'signUp')]
    public function signUp(): Response
    {

        return $this->render('front/signUp.html.twig');
    }

    #[Route('/newStudent', name: 'app_new_student', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        $user = $student->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['student']);
            $entityManager->persist($student);
            $entityManager->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front/newStudent.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }
}
