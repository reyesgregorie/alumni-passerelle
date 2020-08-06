<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CreateGroupController extends AbstractController
{
    /**
     * @Route("/create/group")
     */
    public function index()
    {
        return $this->render('create_group/index.html.twig', [
            'controller_name' => 'CreateGroupController',
        ]);
    }
}
