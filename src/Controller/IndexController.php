<?php

namespace App\Controller;

use App\Repository\AnswersRepository;
use App\Repository\GroupsRepository;
use App\Repository\QuestionsRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        //$group = $groupsRepository->find($id);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

//    public function search(QuestionsRepository $questionsRepository){
//
//        $tag = $questionsRepository->findBy(['tag' => $tag]);
//
//        return $this->render('index/index.html.twig', [
//            'tag' => $tag,
//        ]);
//    }
}
