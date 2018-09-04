<?php

namespace App\Repository;

use App\Entity\RestoFoods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RestoFoods|null find($id, $lockMode = null, $lockVersion = null)
 * @method RestoFoods|null findOneBy(array $criteria, array $orderBy = null)
 * @method RestoFoods[]    findAll()
 * @method RestoFoods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestoFoodsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RestoFoods::class);
    }

//    /**
//     * @return RestoFoods[] Returns an array of RestoFoods objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RestoFoods
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
