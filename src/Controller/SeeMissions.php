<?php


namespace App\Controller;


use App\Entity\Infos;
use \App\Entity\Mission;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SeeMissions extends AbstractController
{
    /**
     * @Route ("/{id}/missions/{m}",name="seeMission")
     */
    public function SeeMission( $id,$m)
    {

        $get = $this->getUser();
        $num = $get->getId();
        $role = $get->getRoles();
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $entityManager = $this->getDoctrine()->getManager();
        if ($num == $m) {
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);
            $users = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
            $mission = $entityManager->getRepository(Mission::class)->findBy(['employeeIdMiss' => $m]);


            return $this->render('seemission.html.twig', ['infos' => $infos, 'users' => $users, 'mission' => $mission]);
        } elseif ($role[0] == "ROLE_DEPARTMENT_HEAD") {
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);
            $users = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
            $mission = $entityManager->getRepository(Mission::class)->findBy(['employeeIdMiss' => $m]);


            return $this->render('seemission.html.twig', ['infos' => $infos, 'users' => $users, 'mission' => $mission]);
        } elseif ($role[0] == "ROLE_ADMINISTRATOR") {
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);
            $users = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
            $mission = $entityManager->getRepository(Mission::class)->findBy(['employeeIdMiss' => $m]);


            return $this->render('seemission.html.twig', ['infos' => $infos, 'users' => $users, 'mission' => $mission]);
        } else {
            return $this->render('pageErreur.html.twig');

        }
    }


        /**
     * @Route ("/{id}/missions/done/{m}",name="doneMission")
     */
    public function DoneMission( $id,$m){
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $mission=$entityManager->getRepository(Mission::class)->findOneBy(['id'=>$m]);
        $users=$entityManager->getRepository(Infos::class)->findAll();
        $mission->setValidation('Done');
        $entityManager->flush();



        return $this->render('mission.html.twig',["users"=>$users,'infos'=>$infos,'mission'=>$mission]);
    }    /**
     * @Route ("/{id}/missions/comments/{m}",name="commentsMission")
     */
    public function commentMission( $id,$m,Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $users=$entityManager->getRepository(Infos::class)->findAll();
        $mission=$entityManager->getRepository(Mission::class)->findOneBy(['id'=>$m]);
        $mission->setComment($request->request->get('comment'));
        $entityManager->flush();



        return $this->render('mission.html.twig',["users"=>$users,'infos'=>$infos,'mission'=>$mission]);
    }
}