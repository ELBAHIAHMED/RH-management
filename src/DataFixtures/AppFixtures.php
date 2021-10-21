<?php

namespace App\DataFixtures;

use App\Controller\profile;
use App\Entity\Infos;
use App\Entity\Language;
use App\Entity\Mission;
use App\Entity\User;
use App\Factory\EducationFactory;
use App\Factory\ExperienceFactory;
use App\Factory\InfosFactory;
use App\Factory\PersonalSkillsFactory;
use App\Factory\ProfilFactory;
use App\Factory\SkillsFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture{

            private $passwordHasher;

        public function __construct(UserPasswordHasherInterface $passwordHasher)
{
    $this->passwordHasher = $passwordHasher;}

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $language=new Language();
        $user =new User();
        $mission= new Mission();
        $user->setUsername('test');
        $user->setUserId('0');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,'test'));
        $mission->setClientName('salma salma');
        $mission->setEmployeeIdMiss(1);
        $mission->setEndDate('01-09-2021');
        $mission->setStartDate('01-08-2021');
        $mission->setValidation('not yet');





        $language->setEmployeeId(1)->setFirstLan('english')->setPercentageFirst(60)->setSecondLan('frensh')
            ->setPercentageSecond(80)->setThirdLan('arabic')->setPercentageThird(90);

        InfosFactory::new()->createMany(1);
        ExperienceFactory::new()->createMany(1);
        EducationFactory::new()->createMany(1);
        SkillsFactory::new()->createMany(1);
        PersonalSkillsFactory::new()->createMany(1);



        $manager->persist($language);
        $manager->persist($user);
        $manager->persist($mission);

        $manager->flush();
    }
}
