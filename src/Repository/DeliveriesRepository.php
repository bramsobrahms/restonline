<?php

namespace App\Repository;

use App\Entity\Deliveries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Deliveries|null find($id, $lockMode = null, $lockVersion = null)
 * @method Deliveries|null findOneBy(array $criteria, array $orderBy = null)
 * @method Deliveries[]    findAll()
 * @method Deliveries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveriesRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, Deliveries::class);
	}

//    /**
//     * @return Deliveries[] Returns an array of Deliveries objects
//     */
	/*
	public function findByExampleField($value)
	{
		return $this->createQueryBuilder('d')
			->andWhere('d.exampleField = :val')
			->setParameter('val', $value)
			->orderBy('d.id', 'ASC')
			->setMaxResults(10)
			->getQuery()
			->getResult()
		;
	}
	*/

	/*
	public function findOneBySomeField($value): ?Deliveries
	{
		return $this->createQueryBuilder('d')
			->andWhere('d.exampleField = :val')
			->setParameter('val', $value)
			->getQuery()
			->getOneOrNullResult()
		;
	}
	*/
}
