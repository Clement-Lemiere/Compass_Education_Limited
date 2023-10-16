<?php

namespace App\Controller\Admin;

use App\Entity\Flag;
use App\Form\FlagType;
use App\Repository\FlagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/flag')]
class FlagController extends AbstractController
{
    #[Route('/', name: 'app_admin_flag_index', methods: ['GET'])]
    public function index(FlagRepository $flagRepository): Response
    {
        return $this->render('admin/flag/index.html.twig', [
            'flags' => $flagRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_flag_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $flag = new Flag();
        $form = $this->createForm(FlagType::class, $flag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($flag);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_flag_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/flag/new.html.twig', [
            'flag' => $flag,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_flag_show', methods: ['GET'])]
    public function show(Flag $flag): Response
    {
        return $this->render('admin/flag/show.html.twig', [
            'flag' => $flag,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_flag_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Flag $flag, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FlagType::class, $flag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_flag_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/flag/edit.html.twig', [
            'flag' => $flag,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_flag_delete', methods: ['POST'])]
    public function delete(Request $request, Flag $flag, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$flag->getId(), $request->request->get('_token'))) {
            $entityManager->remove($flag);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_flag_index', [], Response::HTTP_SEE_OTHER);
    }
}
