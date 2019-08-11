<?php

namespace App\Repository;

use App\Entity\Maison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Maison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maison[]    findAll()
 * @method Maison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaisonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Maison::class);
    }

    public function getLastMaisons()
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.createAt', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findMaisons($search)
    {
        return $this->createQueryBuilder('m')
            // join gouvernorat
            ->innerJoin('m.Gouvernorat', 'g')
            ->addSelect('g')
            ->andWhere('m.Gouvernorat = :id1')
            ->setParameter('id1', $search->gouvernorat)
            // join region
            ->innerJoin('m.region', 'r')
            ->addSelect('r')
            ->andWhere('m.region = :id2')
            ->setParameter('id2', $search->region)
            // join type
            ->innerJoin('m.type', 't')
            ->addSelect('t')
            ->andWhere('m.type = :id3')
            ->setParameter('id3', $search->type)
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }


    // /**
    //  * @return Maison[] Returns an array of Maison objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maison
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
