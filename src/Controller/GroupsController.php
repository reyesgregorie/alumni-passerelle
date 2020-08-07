<?php

namespace App\Controller;

use App\Repository\GroupsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    /**
     * @Route("/group/{id}")
     */
    public function index(GroupsRepository $groupsRepository, $id)
    {
        //$group = $groupsRepository->find($id);

        return $this->render('groups/index.html.twig', [
            //'group' => $group,
        ]);
    }

    public function list(){

    }
}
