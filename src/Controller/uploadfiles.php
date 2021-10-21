<?php


namespace App\Controller;


use App\Entity\Infos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;

class uploadfiles extends AbstractController
{
    /**
     * @Route ("/{id}/uploadimage",name="Upload_image")
     */

    public function uploadImage(EntityManagerInterface $entityManager, $id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);



        return $this->render('uploadpdp.html.twig',["infos" => $infos]);




    }
    /**
     * @Route ("/{id}/saveimage",name="save_image")
     */

    public function saveImage(EntityManagerInterface $entityManager, $id, Request $request)
    {
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);

            $image=$request->files->get("image");
            $image_name=uniqid().'-'.$image->getClientOriginalName();
            $image->move($this->getParameter("image_directory"),$image_name);
            $infos->setImage($image_name);
            $entityManager->persist($infos);
            $entityManager->flush();

        return $this->redirectToRoute('Profil',['id'=>$id]);




    }
    /// resume
    /**
     * @Route ("/{id}/uploadresume",name="Upload_resume")
     */

    public function uploadResume(EntityManagerInterface $entityManager, $id)
    {
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);



        return $this->render('uploadresume.html.twig',["infos" => $infos]);




    }
    /**
     * @Route ("/{id}/saveresume",name="save_resume")
     */

    public function saveResume(EntityManagerInterface $entityManager, $id, Request $request)
    {
        $infos = $entityManager->getRepository(Infos::class)->findOneBy(['id' => $id]);

            $resume=$request->files->get("resume");
            $resume_name=uniqid().'-'.$resume->getClientOriginalName();
            $resume->move($this->getParameter("image_directory"),$resume_name);
            $infos->setResume($resume_name);
            $entityManager->persist($infos);
            $entityManager->flush();

        return $this->redirectToRoute('Profil',['id'=>$id]);




    }
}