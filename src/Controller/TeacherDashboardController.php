<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherDashboardController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {

        return $this->render('front/home.html.twig');
    }

    #[Route('/tprofile', name: 'app_teacher_dashboard')]
    public function teacherProfile(): Response
    {
        return $this->render('teacherDashboard/teacher_profile.html.twig');
    }

    #[Route('/tcalendar', name: 'app_teacher_calendar_dashboard')]
    public function teacherCalendar(): Response
    {
        return $this->render('teacherDashboard/teacher_calendar.html.twig');
    }

    #[Route('/editTprofile', name: 'app_teacher_edit_dashboard')]
    public function editTprofile(): Response
    {
        return $this->render('teacherDashboard/edit_teacher_profile.html.twig');
    }
}