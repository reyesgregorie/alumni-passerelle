<?php

namespace App\Controller;

use App\Entity\Groups;
use App\Form\GroupType;
use App\Repository\GroupsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminGroupController extends AbstractController
{
    /**
     * @Route("/admin/group")
     */
    public function index(GroupsRepository $groupsRepository)
    {

        $groups = $groupsRepository->findby([], ['name' => 'ASC']);
        return $this->render('admin_group/index.html.twig', [
            'groups' => $groups,
        ]);
    }

    /**
     *
     * @Route("/admin/groups/edition/{id}", defaults={"id": null}, requirements={"id": "\d+"})
     */
    public  function edit(
        $id,
        GroupsRepository $groupsRepository,
        Request $request,EntityManagerInterface $entityManager
    )
    {
        if (is_null($id))
        {
            $groups = new Groups();
            $groups
                ->setDate(new \DateTime());
                //->setAuthor($this->getUser()) ;
        }
        else
        {
            $groups = $groupsRepository->find($id);
        }

        $form = $this->createForm(GroupType::class, $groups);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if ($form->isValid())
            {
                $entityManager->persist($groups);
                $entityManager->flush();

                return $this->redirectToRoute('app_admingroup_index');
            }

        }

        return $this->render(
            'admin_group/edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("admin/creation-group/{id}",defaults={"id": null}, requirements={"id": "\d+"})
     */

    public function create(
        $id,
        GroupsRepository $groupsRepository,
        Request $request,EntityManagerInterface $entityManager)
        {
            if (is_null($id))
            {
                $groups = new Groups();
                $groups
                    ->setDate(new \DateTime())
    //                ->setAuthor($this->getUser())
                ;
            }
            else
            {
                $groups = $groupsRepository->find($id);
            }
            $form = $this->createForm(GroupType::class, $groups);
            $form->handleRequest($request);

            if($form->isSubmitted())
            {
                if ($form->isValid())
                {
                    $entityManager->persist($groups);
                    $entityManager->flush();


                    return $this->redirectToRoute('app_admingroup_index');
                }

            }
            return $this->render(
                'admin_group/creation.html.twig',
                [
                    'form' => $form->createView()
                ]
            );
        }

    /**
     * @Route("admin/suppression-group/{id}", requirements={"id": "\d+"})
     */
    public function delete(Groups $groups,EntityManagerInterface $entityManager)
    {
        $entityManager->remove($groups);
        $entityManager->flush();

        return $this->redirectToRoute('app_admingroup_index');
    }

}





