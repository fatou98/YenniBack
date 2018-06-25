<?php

namespace App\Repository;

use App\Entity\PriseDerendezvous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PriseDerendezvous|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriseDerendezvous|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriseDerendezvous[]    findAll()
 * @method PriseDerendezvous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriseDerendezvousRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PriseDerendezvous::class);
    }

//    /**
//     * @return PriseDerendezvous[] Returns an array of PriseDerendezvous objects
//     */
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
    public function findOneBySomeField($value): ?PriseDerendezvous
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
