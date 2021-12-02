<?php

namespace App\Controller;

use App\Security\Authenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;




class GestionnaireController extends AbstractController 
{
    private $security;
    private UrlGeneratorInterface $urlGenerator;
    public const LOGIN_ROUTE = 'app_login';


    public function __construct(UrlGeneratorInterface $urlGenerator, Security $security){
        $this->security = $security;
        $this->urlGenerator = $urlGenerator;
        
    }
    /**
     * @Route("/gerer", name="gerer")
     */
    public function gerer(): Response
    {
        $user = $this->security->getUser();

        if($user!=null){
            if($user->getRoles()[0]=='ROLE_GEST'){
                $evts = $this->getDoctrine()->getManager()->getRepository("App\Entity\Evenement")->findBy(["user"=>$user]);
                return $this->render('gestionnaire/index.html.twig', [
                    'evts' => $evts,
                ]);
            }else{
                return new Response("Vous n'êtes pas gestionnaire.");
            }

        }else{

            return new RedirectResponse($this->urlGenerator->generate(self::LOGIN_ROUTE));
        }
    }

    /**
     * @Route("/gerer/{id<[0-9]+>}", name="gererid")
     */
    public function gererId($id): Response
    {
        $user = $this->security->getUser();

        if($user!=null){
            if($user->getRoles()[0]=='ROLE_GEST'){
                $ts = $this->getDoctrine()->getManager()->getRepository("App\Entity\Tournoi")->findBy(["id"=>$id]);
                return $this->render('gestionnaire/tournoi.html.twig', [
                    'tournoi' => $ts,
                ]);
            }else{
                return new Response("Vous n'êtes pas gestionnaire.");
            }

        }else{

            return new RedirectResponse($this->urlGenerator->generate(self::LOGIN_ROUTE));
        }
    }

    
}
