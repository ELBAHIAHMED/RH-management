<?php

namespace App\Controller;

use App\Entity\Infos;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{


    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils,EntityManagerInterface $entityManager): Response
    {


        $username=$authenticationUtils->getLastUsername();
        $infos=$entityManager->getRepository(User::class)->findOneBy(['username'=>$username]);

         if ($this->getUser() ) {
             if($id=$infos->getId()){

             return $this->redirectToRoute('Profil',['id'=>$id]);
         }}

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        return new RedirectResponse($this->urlGenerator->generate('app_login'));
        //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
