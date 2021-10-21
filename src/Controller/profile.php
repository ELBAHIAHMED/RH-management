<?php


namespace App\Controller;
use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\Infos;
use App\Entity\Language;
use App\Entity\PersonalSkills;
use App\Entity\Profil;
use App\Entity\Skills;
use http\Client\Curl\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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


class profile extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route ("/{id}",name="Profil")
     */

    public function infos(EntityManagerInterface $entityManager ,$id,AuthenticationUtils $authenticationUtils){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $get = $this->getUser();
        $num=$get->getId();
        $role=$get->getRoles();
        $username=$authenticationUtils->getLastUsername();

        if ( $num == $id){

        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);;



        $language=$entityManager->getRepository(Language::class)->findOneBy(['employeeId'=>$id]);
        $experience=$entityManager->getRepository(Experience::class)->findOneBy(['employeeIdExp'=>$id]);
        $education=$entityManager->getRepository(Education::class)->findOneBy(['employeeIdEduc'=>$id]);
        $skills=$entityManager->getRepository(Skills::class)->findOneBy(['employeeIdSkills'=>$id]);
        $PersonalSkills=$entityManager->getRepository(PersonalSkills::class)->findOneBy(['employeeIdPersonalSkills'=>$id]);







        return $this->render('profil.html.twig',["infos"=>$infos, 'username'=>$username,"language"=>$language,"experience"=>$experience,"education"=>$education,"skills"=>$skills,
        "personalSkills"=>$PersonalSkills]);
}

        elseif ( $role[0]=="ROLE_DEPARTMENT_HEAD"){
            $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);;



            $language=$entityManager->getRepository(Language::class)->findOneBy(['employeeId'=>$id]);
            $experience=$entityManager->getRepository(Experience::class)->findOneBy(['employeeIdExp'=>$id]);
            $education=$entityManager->getRepository(Education::class)->findOneBy(['employeeIdEduc'=>$id]);
            $skills=$entityManager->getRepository(Skills::class)->findOneBy(['employeeIdSkills'=>$id]);
            $PersonalSkills=$entityManager->getRepository(PersonalSkills::class)->findOneBy(['employeeIdPersonalSkills'=>$id]);







            return $this->render('profil.html.twig',["infos"=>$infos, 'username'=>$username,"language"=>$language,"experience"=>$experience,"education"=>$education,"skills"=>$skills,
                "personalSkills"=>$PersonalSkills]);

        }
        elseif ( $role[0]=="ROLE_ADMINISTRATOR"){
            $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);;



            $language=$entityManager->getRepository(Language::class)->findOneBy(['employeeId'=>$id]);
            $experience=$entityManager->getRepository(Experience::class)->findOneBy(['employeeIdExp'=>$id]);
            $education=$entityManager->getRepository(Education::class)->findOneBy(['employeeIdEduc'=>$id]);
            $skills=$entityManager->getRepository(Skills::class)->findOneBy(['employeeIdSkills'=>$id]);
            $PersonalSkills=$entityManager->getRepository(PersonalSkills::class)->findOneBy(['employeeIdPersonalSkills'=>$id]);







            return $this->render('profil.html.twig',["infos"=>$infos, 'username'=>$username,"language"=>$language,"experience"=>$experience,"education"=>$education,"skills"=>$skills,
                "personalSkills"=>$PersonalSkills]);

        }
        else{

            return $this->render('screen.html.twig',['username'=>$username]);
        }
    }


}