<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{nom<[A-Za-z]+>?toi}", name="hello")
     */
    public function index($nom): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'nom' => $nom,
        ]);
    }
}
