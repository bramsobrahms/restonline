<?php

namespace App\Repository;

use App\Entity\Foods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @method Foods|null find($id, $lockMode = null, $lockVersion = null)
 * @method Foods|null findOneBy(array $criteria, array $orderBy = null)
 * @method Foods[]    findAll()
 * @method Foods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Foods::class);
    }

    /*
    public function findOneBySomeField($value): ?Foods
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
