<?php

namespace App\Controller\Admin;

use App\Entity\Resource;
use App\Form\ResourceType;
use App\Repository\ResourceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/resource')]
class ResourceController extends AbstractController
{
    #[Route('/', name: 'app_admin_resource_index', methods: ['GET'])]
    public function index(ResourceRepository $resourceRepository): Response
    {
        return $this->render('admin/resource/index.html.twig', [
            'resources' => $resourceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_resource_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $resource = new Resource();
        $form = $this->createForm(ResourceType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($resource);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_resource_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/resource/new.html.twig', [
            'resource' => $resource,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_resource_show', methods: ['GET'])]
    public function show(Resource $resource): Response
    {
        return $this->render('admin/resource/show.html.twig', [
            'resource' => $resource,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_resource_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Resource $resource, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ResourceType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_resource_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/resource/edit.html.twig', [
            'resource' => $resource,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_resource_delete', methods: ['POST'])]
    public function delete(Request $request, Resource $resource, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resource->getId(), $request->request->get('_token'))) {
            $entityManager->remove($resource);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_resource_index', [], Response::HTTP_SEE_OTHER);
    }
}
