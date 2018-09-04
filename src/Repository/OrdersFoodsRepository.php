<?php

namespace App\Repository;

use App\Entity\OrdersFoods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrdersFoods|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdersFoods|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdersFoods[]    findAll()
 * @method OrdersFoods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdersFoodsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrdersFoods::class);
    }

//    /**
//     * @return OrdersFoods[] Returns an array of OrdersFoods objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrdersFoods
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
