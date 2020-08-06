<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\EditProfilType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\User;

class ProfileUserController extends AbstractController
{
    /**
     * @Route("/profil")
     */
    public function index(UsersRepository $usersRepository)
    {
        $users = $usersRepository->findAll();
        return $this->render('profile_user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/user/edition")
     */

    public function edit(Request $request){

        $user = $this->getUser();
        $form = $this->createForm(EditProfilType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour!');
            return $this->redirectToRoute('app_profileuser_index');
        }

        return  $this->render(
            'profile_user/edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/user/mdp/modifier")
     */

    public function editPass(Request $request, UserPasswordEncoderInterface $passwordEncoder){

        if ($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();

            // on vérifié si les 2 mdp sont identiques

            if ($request->request->get('password1') == $request->request->get('password2')){

            }else{
                $this->addFlash('error', 'Les deux mots de passe ne sont pas identiques!');
            }
        }

        return  $this->render(
            'profile_user/editPass.html.twig'
        );
    }
}
