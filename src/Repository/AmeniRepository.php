<?php

namespace App\Repository;

use App\Entity\Ameni;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ameni|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ameni|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ameni[]    findAll()
 * @method Ameni[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmeniRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ameni::class);
    }

    // /**
    //  * @return Ameni[] Returns an array of Ameni objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ameni
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
