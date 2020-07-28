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
    public function index(GroupRepository $groupRepository)
    {

        $group = $groupRepository->findby();
        return $this->render('admin_group/index.html.twig', [
            'group' => $group,
        ]);
    }
}


