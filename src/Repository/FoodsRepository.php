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

	public function findArray($array)
	{
		$qb = $this->createQueryBuilder('u')
			->Select('u')
			->Where('u.id IN (:array)')
			->setParameter('array',$array);
		
		return $qb->getQuery()->getResult();
	}

	public function findStarter($id): array
	{
		//request for find starter
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT  f.id, f.name, f.category, f.price, f.ingredient, f.picture
			FROM App\Entity\Foods f, App\Entity\Restaurants r, App\Entity\RestoFoods rf
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.category = 'starter' and r.id = :id
		")->setParameter('id', $id);

		// returns an array of starter objects
		return $query->execute();
	}

	public function findDish($id): array
	{
		//request for find dish
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT  f.name, f.category, f.price, f.ingredient, f.picture
			FROM App\Entity\Foods f, App\Entity\Restaurants r, App\Entity\RestoFoods rf
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.category = 'dish' and r.id = :id
		")->setParameter('id', $id);

		// returns an array of dish objects
		return $query->execute();
	}

	public function findDrink($id): array
	{
		//request for find drink
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT  f.name, f.category, f.price, f.ingredient, f.picture
			FROM App\Entity\Foods f, App\Entity\Restaurants r, App\Entity\RestoFoods rf
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.category = 'drink' and r.id = :id
		")->setParameter('id', $id);

		// returns an array of drink objects
		return $query->execute();
	}

	public function findDessert($id): array
	{
		//request for find dessert
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT  f.name, f.category, f.price, f.ingredient, f.picture
			FROM App\Entity\Foods f, App\Entity\Restaurants r, App\Entity\RestoFoods rf
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.category = 'dessert' and r.id = :id
		")->setParameter('id', $id);

		// returns an array of dessert objects
		return $query->execute();
	}
	
}
