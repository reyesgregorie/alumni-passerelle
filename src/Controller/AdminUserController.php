<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminUserController extends AbstractController
{
    /**
     * @Route("/admin/user")
     */
    public function index(UsersRepository $usersRepository)
    {


        $users = $usersRepository->findAll();
        return $this->render('admin_user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/admin/user/edition{id}",defaults={"id":null})
     */
/*
    public  function  edit (
        $id,
        UsersRepository $usersRepository,
        Request $request,EntityManagerInterface $entityManager
    )
    {

        if(is_null($id)) // création
        {
            $user = new Article();
            $user->setPublicationDate(new \DateTime());
        }
        else // modification
        {
            $user = $usersRepository->find($id);
        }


        $form = $this->createForm(ArticleType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('app_adminarticle_index');
            }
        }

        return  $this->render(
            'admin_user/edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );


    }*/

}
