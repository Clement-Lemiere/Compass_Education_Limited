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

    #[Route('/scalendar', name: 'app_student_calendar_dashboard')]
    public function studentCalendar(): Response
    {
        return $this->render('studentDashboard/student_calendar.html.twig');
    }

    #[Route('/studentLesson', name: 'app_student_lesson_dashboard')]
    public function studentLesson(): Response
    {
        return $this->render('studentDashboard/student_lesson.html.twig');
    }
    

    #[Route('/sprogress', name: 'app_student_progress_dashboard')]
    public function studentProgress(): Response
    {
        return $this->render('studentDashboard/student_progress.html.twig');
    }

    #[Route('/editSprofile', name: 'app_student_edit_dashboard')]
    public function editSprofile(): Response
    {
        return $this->render('studentDashboard/edit_profile.html.twig');
    }
}
