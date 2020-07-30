<?php

namespace App\Controller;


use App\Entity\Users;
use App\Form\UserType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\User;

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

    public  function  edit (
        $id,
        UsersRepository $usersRepository,
        Request $request,EntityManagerInterface $entityManager
    )
    {

        if(is_null($id)) // création
        {
            $user = new Users();
            $user->setPublicationDate(new \DateTime());
        }
        else // modification
        {
            $user = $usersRepository->find($id);
        }

        // création du formulaire lié a l'entitie Category

        $form = $this->createForm(UserType::class,$user);
        // traitement de la requête par le formulaire
        $form->handleRequest($request);
        // si la form été envoyé
        if($form->isSubmitted())
        {
            // si la validation des annotation @Assert dans l'entité passe
            if($form->isValid())
            {//enregistrement de la catégorie de bdd
                $entityManager->persist($user);
                $entityManager->flush();
                //redirection vers la list
                return $this->redirectToRoute('app_adminuser_index');
            }
        }

        return  $this->render(
            'admin_user/edit.html.twig',
            [
                // passage du form au template
                'form' => $form->createView()
            ]
        );


    }

//    /**
//     * @Route("/delete/{id}",name="product_delete")
//     */
//    public function delete(product $product)
//    {
//      $em = $this->getDoctrine()->getManagers();
//      $em->remove($product);
//      $em->flush();
//
//
//
//       return $this->redirectToRoute('product_delete');
//
//    }
    /**
     * @Route("admin/suppression-user/{id}",name="product_delete")
     */
    public function delete(User $user,EntityManagerInterface $entityManager)
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('product_delete');

    }


}
