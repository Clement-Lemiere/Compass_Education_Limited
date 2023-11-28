<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class UserController extends AbstractController
{

    #[Route("/api/me", name: "get_current_user", methods: "GET")]
    public function getCurrentUser(Security $security): JsonResponse
    {
        // Utilise $this->getUser() pour accéder à l'utilisateur actuellement connecté.
        $user = $this->getUser();

        // Vérifie si un utilisateur est connecté.
        if (!$user) {
            // Gère le cas où aucun utilisateur n'est connecté.
            return new JsonResponse(['message' => 'Aucun utilisateur n\'est connecté.'], Response::HTTP_UNAUTHORIZED);
        }

        // Ici, tu peux renvoyer l'utilisateur connecté au format JSON avec les groupes de sérialisation spécifiés.
        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'user:item']);
    }
}
