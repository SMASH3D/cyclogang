<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpotController extends AbstractController
{
    /**
     * @Route("/spot", name="spot")
     */
    public function index()
    {
        return new JsonResponse(['ping' => 'pong']);
        /*return $this->render('spot/index.html.twig', [
            'controller_name' => 'SpotController',
        ]);*/
    }
    /**
     * @Route("/spot", name="spot")
     */
    public function addAction()
    {
        return $this->render('spot/add.html.twig', [
            'controller_name' => 'SpotController',
        ]);
    }
}
