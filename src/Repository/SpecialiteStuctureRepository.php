<?php

namespace App\Repository;

use App\Entity\SpecialiteStucture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SpecialiteStucture|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialiteStucture|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialiteStucture[]    findAll()
 * @method SpecialiteStucture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialiteStuctureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SpecialiteStucture::class);
    }

//    /**
//     * @return SpecialiteStucture[] Returns an array of SpecialiteStucture objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecialiteStucture
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
