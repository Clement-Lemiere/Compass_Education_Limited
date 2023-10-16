<?php

namespace App\Controller\Admin;

use App\Entity\FAQ;
use App\Form\FAQType;
use App\Repository\FAQRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/faq')]
class FAQController extends AbstractController
{
    #[Route('/', name: 'app_admin_faq_index', methods: ['GET'])]
    public function index(FAQRepository $FAQRepository): Response
    {
        return $this->render('admin/faq/index.html.twig', [
            'faqs' => $FAQRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_faq_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $faq = new FAQ();
        $form = $this->createForm(FAQType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($faq);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_faq_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/faq/new.html.twig', [
            'faq' => $faq,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_faq_show', methods: ['GET'])]
    public function show(FAQ $faq): Response
    {
        return $this->render('admin/faq/show.html.twig', [
            'faq' => $faq,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_faq_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FAQ $faq, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FAQType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_faq_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/faq/edit.html.twig', [
            'faq' => $faq,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_faq_delete', methods: ['POST'])]
    public function delete(Request $request, FAQ $faq, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$faq->getId(), $request->request->get('_token'))) {
            $entityManager->remove($faq);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_faq_index', [], Response::HTTP_SEE_OTHER);
    }
}
