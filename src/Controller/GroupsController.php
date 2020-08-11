<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Form\QuestionType;
use App\Repository\GroupsRepository;
use App\Repository\QuestionsRepository;
use Doctrine\ORM\EntityManager;
use \Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param $id
     * @param QuestionsRepository $questionsRepository
     * @param Request $request
     * @param EntityManager $entityManager
     * @Route("")
     */

    public function newQuestion($id, QuestionsRepository $questionsRepository, Request $request, EntityManager $entityManager){
        if(is_null($id)){
            $question = new Questions();
        }
        else{
            $question = $questionsRepository->find($id);
        }

        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->persist($question);
                $entityManager->flush();

                return $this->redirectToRoute('app');
            }
        }
        return $this->render();
    }
}
