<?php

namespace App\Controller;

use App\Entity\FAQ;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class FAQController extends AbstractController
{
    #[Route('/faq', name: 'app_front_faq')]
    public function faq(ManagerRegistry $doctrine): Response
    {
        // call doctrine
        $em = $doctrine->getManager();

        // call repository
        $faqRepository = $em->getRepository(FAQ::class);

        // Find all faqs
        $faqs = $faqRepository->findAll();

        // Find faq by id
        $faq = $faqRepository->find(1);

        return $this->render('front/faq.html.twig', [
            'controller_name' => 'FAQController',
            'faqs' => $faqs,
            'faq' => $faq,
        ]);
    }
}
