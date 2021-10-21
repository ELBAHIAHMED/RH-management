<?php

namespace App\Repository;

use App\Entity\PersonalSkills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonalSkills|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonalSkills|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonalSkills[]    findAll()
 * @method PersonalSkills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalSkillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonalSkills::class);
    }

    // /**
    //  * @return PersonalSkills[] Returns an array of PersonalSkills objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonalSkills
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
