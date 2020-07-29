<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfileUserController extends AbstractController
{
    /**
     * @Route("/profile")
     */
    public function index(UsersRepository $usersRepository)
    {
        $users = $usersRepository->findAll();
        return $this->render('profile_user/index.html.twig', [
            'users' => $users,
        ]);
    }
}
