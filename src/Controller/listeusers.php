<?php


namespace App\Controller;
use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\Infos;
use App\Entity\Language;
use App\Entity\Mission;
use App\Entity\PersonalSkills;
use App\Entity\Profil;
use App\Entity\Skills;
use App\Entity\Vacation;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Question;
use App\Service\MarkdownHelper;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use function Zenstruck\Foundry\repository;

class listeusers extends AbstractController
{


    /**
     * @Route ("/UserList/{id}",name="User_Liste")
     * @throws Exception
     */

    public function users(EntityManagerInterface $entityManager,$id)
    {
        $get = $this->getUser();
        $role = $get->getRoles();
        if ($role[0] == "ROLE_DEPARTMENT_HEAD") {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;
            $users = $entityManager->getRepository(Infos::class)->findAll();


            return $this->render('userliste.html.twig', ["users" => $users, "infos" => $infos]);

        } elseif ($role[0] == "ROLE_ADMINISTRATOR") {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;
            $users = $entityManager->getRepository(Infos::class)->findAll();


            return $this->render('userliste.html.twig', ["users" => $users, "infos" => $infos]);

        } else {
            return $this->render('pageErreur.html.twig');

        }
    }
    /**
     * @Route ("/userprofil/{id}/{m}",name="User_Profil")
     * @throws Exception
     */

    public function userspage(EntityManagerInterface $entityManager,$id,$m,AuthenticationUtils $authenticationUtils) {
        $get = $this->getUser();
        $role=$get->getRoles();
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $get = $this->getUser();
        $num=$get->getId();
        $role=$get->getRoles();
        $username=$authenticationUtils->getLastUsername();

            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
            $user = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);
             $users = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $m]);
            $mission = $entityManager->getRepository(Mission::class)->findBy(['employeeIdMiss' => $m]);




        $language=$entityManager->getRepository(Language::class)->findOneBy(['employeeId'=>$m]);
        $experience=$entityManager->getRepository(Experience::class)->findOneBy(['employeeIdExp'=>$m]);
        $education=$entityManager->getRepository(Education::class)->findOneBy(['employeeIdEduc'=>$m]);
        $skills=$entityManager->getRepository(Skills::class)->findOneBy(['employeeIdSkills'=>$m]);
        $PersonalSkills=$entityManager->getRepository(PersonalSkills::class)->findOneBy(['employeeIdPersonalSkills'=>$m]);
        $vacation=$entityManager->getRepository(Vacation::class)->findBy(['employeeIdVacation'=>$m]);

            return $this->render('userpage.html.twig',[ 'users' => $users, 'mission' => $mission,"user"=>$user,"infos"=>$infos, 'username'=>$username,"language"=>$language,"experience"=>$experience,"education"=>$education,"skills"=>$skills,
                "personalSkills"=>$PersonalSkills,'vacation'=>$vacation]);
        }




}