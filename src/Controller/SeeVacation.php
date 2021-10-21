<?php


namespace App\Controller;


use App\Entity\Infos;
use App\Entity\Mission;
use App\Entity\Vacation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SeeVacation extends AbstractController
{
    /**
     * @Route("/{id}/vacationRequests",name="seeRequests")
     */
    public function seeyour($id){
        $get = $this->getUser();
        $num=$get->getId();
        if ( $num == $id) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $vacation=$entityManager->getRepository(Vacation::class)->findBy(['employeeIdVacation'=>$id]);




        return $this->render('seevacation.html.twig',['infos'=>$infos,'vacation'=>$vacation]);
    }
        else{
            return $this->render('pageErreur.html.twig');

        }}

    /**
     * @Route("/{id}/UservacationRequests",name="seeUserRequests")
     */
    public function seeRequests($id){
        $get = $this->getUser();
        $role=$get->getRoles();
        if ($role[0]=="ROLE_DEPARTMENT_HEAD") {
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $vacation=$entityManager->getRepository(Vacation::class)->findAll();




        return $this->render('seeUsersvacation.html.twig',['infos'=>$infos,'vacation'=>$vacation]);
    }  elseif ($role[0]=="ROLE_ADMINISTRATOR") {
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $vacation=$entityManager->getRepository(Vacation::class)->findAll();




        return $this->render('seeUsersvacation.html.twig',['infos'=>$infos,'vacation'=>$vacation]);
    }
        else{
            return $this->render('pageErreur.html.twig');

        }}
        /**
     * @Route ("/{id}/request/approved/{m}",name="approvedMission")
     */
    public function ApprovedMission( $id,$m){
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $vacation=$entityManager->getRepository(Vacation::class)->findOneBy(['id'=>$m]);
        $vacation->setValidation('Approved');
        $entityManager->flush();



        return $this->redirectToRoute('seeUserRequests',['id'=>$id]);

    }
/**
     * @Route ("/{id}/request/Notapproved/{m}",name="notapprovedMission")
     */
    public function NotApprovedMission( $id,$m){
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $vacation=$entityManager->getRepository(Vacation::class)->findOneBy(['id'=>$m]);
        $vacation->setValidation('Not Approved');
        $entityManager->flush();



        return $this->redirectToRoute('seeUserRequests',['id'=>$id]);
    }




}