<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserDashboardController extends AbstractController
{
    private $hasher;


    public function  __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    #[Route("/api/me", name: "get_current_user", methods: ["GET"])]
    public function getCurrentUser(Security $security, Request $request): JsonResponse
    {
        $user = $this->getUser();

        // Check if a user is logged in.
        if (!$user) {
            // Handle the case where no user is logged in.
            return new JsonResponse(['message' => 'Aucun utilisateur n\'est connecté.'], Response::HTTP_UNAUTHORIZED);
        }

        // Decode the JSON data from the request body.
        $data = json_decode($request->getContent(), true);

        // Return the connected user as JSON with specified serialization groups.
        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'user:item']);
    }

    #[Route("/update", name: "update_current_user", methods: "POST")]
    public function updateProfile(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        // Retrieve the logged-in user
        $user = $this->getUser();

        // Check if the user exists
        if (!$user) {
            return new JsonResponse(['message' => 'Aucun utilisateur n\'est connecté.'], Response::HTTP_UNAUTHORIZED);
        }

        // Retrieve the JSON data from the request body
        $data = json_decode($request->getContent(), true);

        // Update the user data based on the received data
        $this->updateUser($user, $data);

        $em = $doctrine->getManager();
        $em->flush();

        // Return a successful JSON response
        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'user:update']);
    }

    private function updateUser(User $user, array $data): void
    {
        foreach ($data as $key => $value) {
            $setterMethod = 'set' . ucfirst($key);

            if ($key === 'password') {
                if ($value !== '') {
                    $hashedPassword = $this->hasher->hashPassword($user, $value);
                    if (method_exists($user, $setterMethod)) {
                        $user->$setterMethod($hashedPassword);
                    }
                }
            } elseif (method_exists($user, $setterMethod)) {
                $user->$setterMethod($value);
            }
        }

        $teacher = $user->getTeacher();
        if ($teacher) {
            foreach ($data as $key => $value) {
                $setterMethod = 'set' . ucfirst($key);
                if (method_exists($teacher, $setterMethod)) {
                    $teacher->$setterMethod($value);
                }
            }
        }

        $student = $user->getStudent();
        if ($student) {
            foreach ($data as $key => $value) {
                $setterMethod = 'set' . ucfirst($key);
                if ($setterMethod === 'setBirthdate' && method_exists($student, $setterMethod)) {
                    $birthdate = new \DateTime($value);
                    $student->$setterMethod($birthdate);
                } elseif (method_exists($student, $setterMethod)) {
                    $student->$setterMethod($value);
                }
            }
        }
    }
}
