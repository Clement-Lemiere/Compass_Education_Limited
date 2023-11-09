<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/tips', name: 'tips')]
    public function tips(): Response
    {

        return $this->render('front/tips.html.twig');
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
}
