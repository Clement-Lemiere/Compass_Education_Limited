<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentDashboardController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {

        return $this->render('front/home.html.twig');
    }

    #[Route('/sprofile', name:'app_student_dashboard')]
    public function studentProfile(): Response
    {
        return $this->render('studentDashboard/student_profile.html.twig');
    }

    #[Route('/editSprofile', name: 'app_student_edit_dashboard')]
    public function editSprofile(): Response
    {
        return $this->render('studentDashboard/edit_profile.html.twig');
    }
}
