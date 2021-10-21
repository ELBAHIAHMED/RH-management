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

class ModifyInfos extends AbstractController
{
    /**
     * @Route("/modifyInfos/{id}",name="modifyInfos")
     */
    public function modifier(EntityManagerInterface $entityManager,$id,Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $infos=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
        $language=$entityManager->getRepository(Language::class)->findOneBy(['employeeId'=>$id]);
        $experience=$entityManager->getRepository(Experience::class)->findOneBy(['employeeIdExp'=>$id]);
        $education=$entityManager->getRepository(Education::class)->findOneBy(['employeeIdEduc'=>$id]);
        $skills=$entityManager->getRepository(Skills::class)->findOneBy(['employeeIdSkills'=>$id]);
        $PersonalSkills=$entityManager->getRepository(PersonalSkills::class)->findOneBy(['employeeIdPersonalSkills'=>$id]);
        $get = $this->getUser();
        $num=$get->getId();
        if ( $num == $id){
        if ($request->request->count() > 0) {
            $user=$entityManager->getRepository(Infos::class)->findOneBy(['id'=>$id]);
            $lang=$entityManager->getRepository(Language::class)->findOneBy(['employeeId'=>$id]);
            $experience=$entityManager->getRepository(Experience::class)->findOneBy(['employeeIdExp'=>$id]);
            $educ=$entityManager->getRepository(Education::class)->findOneBy(['employeeIdEduc'=>$id]);
            $ProSkills=$entityManager->getRepository(Skills::class)->findOneBy(['employeeIdSkills'=>$id]);
            $perskill=$entityManager->getRepository(PersonalSkills::class)->findOneBy(['employeeIdPersonalSkills'=>$id]);


            $user->setName($request->request->get('name'));
            $user->setBirthday($request->request->get('birthday'));
            $user->setAddress($request->request->get('address'));
            $user->setGender($request->request->get('gender'));
            $user->setRole($request->request->get('selectuserrole'));
            $user->setAwards($request->request->get('awards'));
            $user->setParticipated($request->request->get('participated'));
            $user->setExperience($request->request->get('experience'));
            $user->setPhone($request->request->get('mobno'));
            $user->setEmail($request->request->get('email'));
            $user->setJoinDate($request->request->get('join_Date'));
            $user->setDepartment($request->request->get('departement_head'));

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


            $lang->setFirstLan($request->request->get('firstLan'));
            $lang->setPercentageFirst($request->request->get('percentageFirst'));
            $lang->setSecondLan($request->request->get('secondLan'));
            $lang->setPercentageSecond($request->request->get('percentageSecond'));
            $lang->setThirdLan($request->request->get('thirdLan'));
            $lang->setPercentageThird($request->request->get('percentageThird'));


            $experience->setFirstExperience($request->request->get('firstExperience'));
            $experience->setSecondExperience($request->request->get('secondExperience'));
            $experience->setThirdExperience($request->request->get('thirdExperience'));


            $ProSkills->setFist($request->request->get('fistpro'));
            $ProSkills->setFirstPerc($request->request->get('firstPercPro'));
            $ProSkills->setSecond($request->request->get('secondLPro'));
            $ProSkills->setSecondPercent($request->request->get('secondPercentpro'));
            $ProSkills->setThird($request->request->get('thirdPro'));
            $ProSkills->setThirdPerc($request->request->get('thirdPerPro'));
            $ProSkills->setFourth($request->request->get('fourthPro'));
            $ProSkills->setFourthPerc($request->request->get('fourthPercPro'));


            $perskill->setFist($request->request->get('fistper'));
            $perskill->setSecond($request->request->get('secondper'));
            $perskill->setThird($request->request->get('thirdper'));
            $perskill->setFourth($request->request->get('fourthper'));


            $entityManager->flush();
            return $this->redirectToRoute('Profil',['id'=>$id]);
        }

        return $this->render('modifyinfosUser.html.twig',["infos"=>$infos, "language"=>$language,"experience"=>$experience,"education"=>$education,"skills"=>$skills,
            "personalSkills"=>$PersonalSkills]);
    }
        else{
            return $this->render('pageErreur.html.twig');

        }
}}