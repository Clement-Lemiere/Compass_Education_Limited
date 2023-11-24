<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

#[Route('/admin/search')]
class SearchUserController extends AbstractController
{

    #[ROUTE('/admin/search', name: 'app_admin_user_search')]
    public function search(Request $request, ManagerRegistry $doctrine): Response
    {

        $em = $doctrine->getManager();

        $term = $request->query->get('search');
        $users = $em->getRepository(User::class)->search($term);

        return $this->render('admin/user/search.html.twig', [
            'users' => $users,
        ]);
    }
}
