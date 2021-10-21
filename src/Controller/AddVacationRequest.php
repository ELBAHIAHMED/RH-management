<?php


namespace App\Controller;


use App\Entity\Infos;
use App\Entity\Vacation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddVacationRequest extends AbstractController
{
    /**
     * @Route ("/{id}/addVacationRequest",name="addvacation")
     */
        public function addVacation(EntityManagerInterface $entityManager,$id,Request $request){
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);
            $vacation= new Vacation();
            $name=$infos->getName();
            $role=$infos->getRole();
            $get = $this->getUser();
            $num=$get->getId();
            if ( $num == $id) {
            if ($request->request->count()==4) {
                $vacation->setEmployeeIdVacation($id);
                $vacation->setName($name);
                $vacation->setRole($role);
                $vacation->setFirstDay($request->request->get('startDate'));
                $vacation->setLastDay($request->request->get('endDate'));
                $vacation->setReason($request->request->get('reason'));
                $vacation->setValidation($request->request->get('validation'));

                $entityManager->persist($vacation);
                $entityManager->flush();

            }

            return $this->render('addvacatin.html.twig',["infos" => $infos]);
        }
            else{
                return $this->render('pageErreur.html.twig');

            }

}}