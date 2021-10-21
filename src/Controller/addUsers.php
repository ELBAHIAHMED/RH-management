<?php


namespace App\Controller;


use App\Entity\Infos;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class addUsers extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route ("/{id}/AddUser",name="Add_User")
     */
    public function Adduser(EntityManagerInterface $entityManager,$id,Request $request ,UserPasswordEncoderInterface $passwordEncoder , FlashBagInterface $flashMessage,AuthenticationUtils $authenticationUtils): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;
        $users = new User();
        $form = $this->createForm(RegistrationFormType::class, $users);
        $form->handleRequest($request);
        $get = $this->getUser();
        $role=$get->getRoles();

        if ($role[0]=="ROLE_DEPARTMENT_HEAD") {
            if ($request->request->count() > 0) {


                $user = new Infos();
                if ($form->isSubmitted() && $form->isValid()) {

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
                    $user->setJob('Employee');



                    $entityManager->persist($user);

                    // encode the plain password
                    $users->setPassword(
                        $passwordEncoder->encodePassword(
                            $users,
                            $form->get('plainPassword')->getData()
                        )
                    );

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($users);
                    $entityManager->flush();
                    $flashMessage->add("success", "add user");

                    return $this->redirectToRoute('User_Liste', ['id' => $id]);
                }
            }
            return $this->render('addUsers.html.twig',["infos" => $infos,'registrationForm' => $form->createView()]);

        }
        elseif ($role[0]=="ROLE_ADMINISTRATOR") {
            if ($request->request->count() > 0) {


                $user = new Infos();
                if ($form->isSubmitted() && $form->isValid()) {

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
                    $user->setJob('Employee');



                    $entityManager->persist($user);

                    // encode the plain password
                    $users->setPassword(
                        $passwordEncoder->encodePassword(
                            $users,
                            $form->get('plainPassword')->getData()
                        )
                    );

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($users);
                    $entityManager->flush();
                    $flashMessage->add("success", "add user");

                    return $this->redirectToRoute('User_Liste', ['id' => $id]);
                }
            }
            return $this->render('addUsers.html.twig',["infos" => $infos,'registrationForm' => $form->createView()]);

        }
        else{
            return $this->render('pageErreur.html.twig');

        }









    }
    /**
     * @Route ("/{id}/AddUserDepartementHead",name="Add_departement_head")
     */
    public function Adduserdepartement(EntityManagerInterface $entityManager,$id,Request $request ,UserPasswordEncoderInterface $passwordEncoder , FlashBagInterface $flashMessage,AuthenticationUtils $authenticationUtils): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;

        $users = new User();
        $form = $this->createForm(RegistrationFormType::class, $users);
        $form->handleRequest($request);
        $get = $this->getUser();
        $roles=$get->getRoles();
        if ($roles[0]=="ROLE_DEPARTMENT_HEAD") {
            if ($request->request->count() > 0) {


                $user = new Infos();
                if ($form->isSubmitted() && $form->isValid()) {

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
                    $user->setDepartment($request->request->get('name'));
                    $user->setJob('Departement Head');



                    $entityManager->persist($user);

                    // encode the plain password
                    $users->setPassword(
                        $passwordEncoder->encodePassword(
                            $users,
                            $form->get('plainPassword')->getData()
                        )
                    );
                    $role[] = 'ROLE_DEPARTMENT_HEAD';
                    $users->setRoles($role);

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($users);
                    $entityManager->flush();
                    $flashMessage->add("success", "add user");

                    return $this->redirectToRoute('User_Liste', ['id' => $id]);
                }
            }
            return $this->render('adduserdepartmenthead.html.twig', ["infos" => $infos, 'registrationForm' => $form->createView()]);
        }
        elseif ($roles[0]=="ROLE_ADMINISTRATOR") {
            if ($request->request->count() > 0) {


                $user = new Infos();
                if ($form->isSubmitted() && $form->isValid()) {

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
                    $user->setDepartment($request->request->get('name'));
                    $user->setJob('Departement Head');


                    $entityManager->persist($user);

                    // encode the plain password
                    $users->setPassword(
                        $passwordEncoder->encodePassword(
                            $users,
                            $form->get('plainPassword')->getData()
                        )
                    );
                    $role[] = 'ROLE_DEPARTMENT_HEAD';
                    $users->setRoles($role);

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($users);
                    $entityManager->flush();
                    $flashMessage->add("success", "add user");

                    return $this->redirectToRoute('User_Liste', ['id' => $id]);
                }
            }
            return $this->render('adduserdepartmenthead.html.twig', ["infos" => $infos, 'registrationForm' => $form->createView()]);
        }
        else{
            return $this->render('pageErreur.html.twig');
        }







    }
    /**
     * @Route ("/{id}/AddUserAdministrator",name="Add_Administrator")
     */
    public function Adduserdministrator(EntityManagerInterface $entityManager,$id,Request $request ,UserPasswordEncoderInterface $passwordEncoder , FlashBagInterface $flashMessage,AuthenticationUtils $authenticationUtils): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);;

        $users = new User();
        $form = $this->createForm(RegistrationFormType::class, $users);
        $form->handleRequest($request);
        $get = $this->getUser();
        $roles=$get->getRoles();
        if ($roles[0]=="ROLE_DEPARTMENT_HEAD") {
        if ($request->request->count()>0) {


            $user = new Infos();
            if ($form->isSubmitted() && $form->isValid()) {

            $user->setName($request->request->get('name'));
            $user->setBirthday($request->request->get('birthday'));
            $user->setAddress($request->request->get('address'));
            $user->setGender($request->request->get('gender'));
            $user->setRole("Administrator");
            $user->setAwards($request->request->get('awards'));
            $user->setParticipated($request->request->get('participated'));
            $user->setExperience($request->request->get('experience'));
            $user->setPhone($request->request->get('mobno'));
            $user->setEmail($request->request->get('email'));
            $user->setJoinDate($request->request->get('join_Date'));
            $user->setDepartment(" ");
            $user->setJob('Administrator');



            $entityManager->persist($user);

            // encode the plain password
            $users->setPassword(
                $passwordEncoder->encodePassword(
                    $users,
                    $form->get('plainPassword')->getData()
                )
            );
            $role[]='ROLE_ADMINISTRATOR';
            $users->setRoles($role);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
            $flashMessage->add("success","add user");

                return $this->redirectToRoute('User_Liste',['id'=>$id]);
        }}

        return $this->render('addAdministrator.html.twig',["infos" => $infos,'registrationForm' => $form->createView()]);
    }
        elseif ($roles[0]=="ROLE_ADMINISTRATOR") {
        if ($request->request->count()>0) {


            $user = new Infos();
            if ($form->isSubmitted() && $form->isValid()) {

            $user->setName($request->request->get('name'));
            $user->setBirthday($request->request->get('birthday'));
            $user->setAddress($request->request->get('address'));
            $user->setGender($request->request->get('gender'));
            $user->setRole("Administrator");
            $user->setAwards($request->request->get('awards'));
            $user->setParticipated($request->request->get('participated'));
            $user->setExperience($request->request->get('experience'));
            $user->setPhone($request->request->get('mobno'));
            $user->setEmail($request->request->get('email'));
            $user->setJoinDate($request->request->get('join_Date'));
            $user->setDepartment(" ");
            $user->setJob('Administrator');




                $entityManager->persist($user);

            // encode the plain password
            $users->setPassword(
                $passwordEncoder->encodePassword(
                    $users,
                    $form->get('plainPassword')->getData()
                )
            );
            $role[]='ROLE_ADMINISTRATOR';
            $users->setRoles($role);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
            $flashMessage->add("success","add user");

                return $this->redirectToRoute('User_Liste',['id'=>$id]);
        }}

        return $this->render('addAdministrator.html.twig',["infos" => $infos,'registrationForm' => $form->createView()]);
    }
        else{
            return $this->render('pageErreur.html.twig');
        }

    }
}