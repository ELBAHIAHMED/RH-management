<?php


namespace App\Controller;


use App\Entity\Infos;
use Doctrine\ORM\EntityManagerInterface;
use \App\Entity\User;
use \App\Entity\Mission;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Addmission extends AbstractController
{
    /**
     * @Route ("/{id}/addmission/{m}",name="addmission")
     */
        public function addmission(EntityManagerInterface $entityManager,$id,Request $request,$m){

            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;
            $user = $entityManager->getRepository(User::class)->findOneBy(['id' => $m]);
            $mission=new Mission();
            $get = $this->getUser();
            $role=$get->getRoles();

            if ($role[0]=="ROLE_DEPARTMENT_HEAD") {
            if ($request->request->count()>0) {
                $mission->setEmployeeIdMiss($m);
                $mission->setClientName($request->request->get('clientName'));
                $mission->setStartDate($request->request->get('startDate'));
                $mission->setEndDate($request->request->get('endDate'));
                $mission->setValidation($request->request->get('validation'));

                $entityManager->persist($mission);
                $entityManager->flush();

            }

            return $this->render('addmission.html.twig',["infos" => $infos,"user"=>$user]);
        }
            elseif ($role[0]=="ROLE_ADMINISTRATOR") {
            if ($request->request->count()>0) {
                $mission->setEmployeeIdMiss($m);
                $mission->setClientName($request->request->get('clientName'));
                $mission->setStartDate($request->request->get('startDate'));
                $mission->setEndDate($request->request->get('endDate'));
                $mission->setValidation($request->request->get('validation'));

                $entityManager->persist($mission);
                $entityManager->flush();

            }

            return $this->render('addmission.html.twig',["infos" => $infos,"user"=>$user]);
        }
            else{
                return $this->render('pageErreur.html.twig');

            }

        }
}