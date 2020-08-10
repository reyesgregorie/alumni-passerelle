<?php

namespace App\Controller;

use App\Repository\GroupsRepository;
use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    /**
     * @Route("/group/{principal}/{secondaire}")
     */
    public function index(QuestionsRepository $questionsRepository, string $principal, string $secondaire){
        //$question = $questionsRepository->findAll();
        //$group = $groupsRepository->find($id);
//        echo $principal.'<br>';
//        echo $secondaire.'<br>';
        return $this->render('groups/index.html.twig', [
           //'question' => $question,
        ]);
    }

    public function list(){

    }
}
