<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class Screen extends AbstractController
{
    /**
     * @Route("/login/connected", name="connected")
     */
    public function connected(AuthenticationUtils $authenticationUtils){
        $username=$authenticationUtils->getLastUsername();

        return $this->render('screen.html.twig',['username'=>$username]);
    }
}