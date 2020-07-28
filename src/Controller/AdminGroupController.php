<?php

namespace App\Controller;

use App\Repository\GroupsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}


