<?php


namespace App\Controller;


use App\Entity\Infos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Mission extends AbstractController
{
    /**
     * @Route("/usersmission/{id}",name="usersMission")
     */
    public function add(EntityManagerInterface $entityManager,$id){
        $get = $this->getUser();
        $role=$get->getRoles();
        if ($role[0]=="ROLE_DEPARTMENT_HEAD") {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $users=$entityManager->getRepository(Infos::class)->findAll();

        return $this->render('mission.html.twig',["users"=>$users,"infos"=>$infos]);
    }
        elseif ($role[0]=="ROLE_ADMINISTRATOR") {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $users=$entityManager->getRepository(Infos::class)->findAll();

        return $this->render('mission.html.twig',["users"=>$users,"infos"=>$infos]);
    }
        else{
            return $this->render('pageErreur.html.twig');

        }
}}