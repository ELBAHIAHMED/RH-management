<?php


namespace App\Controller;

use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\Infos;
use App\Entity\Language;
use App\Entity\PersonalSkills;
use App\Entity\Skills;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class addinfosusers extends AbstractController
{
    /**
     * @Route ("/{id}/AddInfoUser",name="Add_info_user")
     */
    public function Addifos(EntityManagerInterface $entityManager, $id, Request $request,AuthenticationUtils $authenticationUtils)
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $get = $this->getUser();
        $num=$get->getId();
        $role=$get->getRoles();
        $username=$authenticationUtils->getLastUsername();

        if ( $num == $id) {

            $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;

            if ($request->request->count() > 0) {
                $educ = new Education();
                $perskill = new PersonalSkills();
                $ProSkills = new Skills();
                $lang = new Language();
                $experience = new Experience();

                $educ->setEmployeeIdEduc($id);
                $educ->setElementarySchool($request->request->get('elementarySchool'));
                $educ->setElementarySchool1($request->request->get('elementarySchool1'));
                $educ->setHighSchool($request->request->get('highSchool'));
                $educ->setHighSchool1($request->request->get('highSchool1'));
                $educ->setCollege($request->request->get('college'));
                $educ->setCollege1($request->request->get('college1'));
                $educ->setUniversity($request->request->get('university'));
                $educ->setUniversity1($request->request->get('university1'));
                $educ->setMaster($request->request->get('master'));
                $educ->setMaster1($request->request->get('master1'));

                $lang->setEmployeeId($id);
                $lang->setFirstLan($request->request->get('firstLan'));
                $lang->setPercentageFirst($request->request->get('percentageFirst'));
                $lang->setSecondLan($request->request->get('secondLan'));
                $lang->setPercentageSecond($request->request->get('percentageSecond'));
                $lang->setThirdLan($request->request->get('thirdLan'));
                $lang->setPercentageThird($request->request->get('percentageThird'));

                $experience->setEmployeeIdExp($id);
                $experience->setFirstExperience($request->request->get('firstExperience'));
                $experience->setSecondExperience($request->request->get('secondExperience'));
                $experience->setThirdExperience($request->request->get('thirdExperience'));

                $ProSkills->setEmployeeIdSkills($id);
                $ProSkills->setFist($request->request->get('fistpro'));
                $ProSkills->setFirstPerc($request->request->get('firstPercPro'));
                $ProSkills->setSecond($request->request->get('secondLPro'));
                $ProSkills->setSecondPercent($request->request->get('secondPercentpro'));
                $ProSkills->setThird($request->request->get('thirdPro'));
                $ProSkills->setThirdPerc($request->request->get('thirdPerPro'));
                $ProSkills->setFourth($request->request->get('fourthPro'));
                $ProSkills->setFourthPerc($request->request->get('fourthPercPro'));

                $perskill->setEmployeeIdPersonalSkills($id);
                $perskill->setFist($request->request->get('fistper'));
                $perskill->setSecond($request->request->get('secondper'));
                $perskill->setThird($request->request->get('thirdper'));
                $perskill->setFourth($request->request->get('fourthper'));


                $entityManager->persist($educ);
                $entityManager->persist($experience);
                $entityManager->persist($lang);
                $entityManager->persist($ProSkills);
                $entityManager->persist($perskill);


                $entityManager->flush();

            }
            return $this->render('addinfosUser.html.twig', ["infos" => $infos,]);
        }
        else{

            return $this->render('pageErreur.html.twig');
        }
    }
}