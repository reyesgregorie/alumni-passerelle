<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\EditProfilType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\User;

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

    /**
     * @Route("/admin/profil_user/edition{id}",defaults={"id":null})
     * @param $id
     * @param UsersRepository $usersRepository
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function edit($id,
                         UsersRepository $usersRepository,
                         Request $request,EntityManagerInterface $entityManager
    )
    {

        if (is_null($id))
        {
            $user = new Users();
        }else
            {
                $user = $usersRepository->find($id);

             }


        $form = $this->redirectToRoute(EditProfilType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if ($form->isValid())
            {

                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('app_adminuser_index');
            }

        }

        return  $this->render('profile_user/edit.html.twig',
            [
                'form' => $this->createView()

            ]


        );



    }
}
