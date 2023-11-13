<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class StudentDashboardController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {

        return $this->render('front/home.html.twig');
    }

    #[Route('/sprofile', name:'profile')]
    public function about(): Response
    {
        return $this->render('studentDashboard/student_profile.html.twig');
    }
}
