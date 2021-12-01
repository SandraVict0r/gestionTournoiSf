<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TournoiController extends AbstractController
{
    /**
     * @Route("/tournoi", name="tournoi")
     */
    public function index(): Response
    {
        $evts = $this->getDoctrine()->getManager()->getRepository("App\Entity\Evenement")->findAll();

        return $this->render('tournoi/index.html.twig', [
            'evts' => $evts,
        ]);
    }
}
