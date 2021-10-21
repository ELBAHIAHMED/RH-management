<?php


namespace App\Controller;


use App\Entity\Infos;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Delete extends AbstractController
{
    /**
     * @Route("/Delete/{id}/{m}",name="Delete")
     * @throws Exception
     */

    public function Delete(EntityManagerInterface $entityManager,$id,$m) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $get = $this->getUser();
        $role=$get->getRoles();
        if ($role[0]=="ROLE_DEPARTMENT_HEAD") {
        $delet = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
        $user = $entityManager->getRepository(User::class)->findOneBy(['id' => $m]);
        $entityManager->remove($delet);
        $entityManager->remove($user);
        $entityManager->flush();






        return $this->redirectToRoute('User_Liste',['id'=>$id]);

    }        elseif ($role[0]=="ROLE_ADMINISTRATOR") {
        $delet = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
        $user = $entityManager->getRepository(User::class)->findOneBy(['id' => $m]);
        $entityManager->remove($delet);
        $entityManager->remove($user);
        $entityManager->flush();






        return $this->redirectToRoute('User_Liste',['id'=>$id]);

    }
        else{
            return $this->render('pageErreur.html.twig');

        }
}}

