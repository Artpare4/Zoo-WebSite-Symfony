<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutorialController extends AbstractController
{
    #[Route('/tutorial', name: 'app_tutorial')]
    public function index(): Response
    {
        return $this->render('tutorial/index.html.twig', [
            'controller_name' => 'TutorialController',
        ]);
    }
    #[Route('/tutorial/1', name: 'app_tutorial_1')]
    public function tuto1(): Response
    {
        return $this->render('tutorial/tuto1.html.twig', [
            'controller_name' => 'TutorialController',
        ]);
    }

    #[Route('/tutorial/2', name: 'app_tutorial_2')]
    public function tuto2(): Response
    {
        return $this->render('tutorial/tuto2.html.twig', [
            'controller_name' => 'TutorialController',
        ]);
    }
    #[Route('/tutorial/3', name: 'app_tutorial_3')]
    public function tuto3(): Response
    {
        return $this->render('tutorial/tuto3.html.twig', [
            'controller_name' => 'TutorialController',
        ]);
    }
}
