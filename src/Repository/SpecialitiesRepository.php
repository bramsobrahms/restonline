<?php
namespace App\Repository;

use App\Entity\Specialities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method Specialities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specialities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specialities[]    findAll()
 * @method Specialities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class SpecialitiesRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, Specialities::class);
	}

	
	/*
	* Find coutny by Fooods
	* CountriesController
	*/


	public function findCountry(): array
	{
		//request to find food contry Belgian
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery("
			SELECT DISTINCT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website, s.country
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\RestoFoods rf, App\Entity\Specialities s
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.country='Belgian'            
		");

		// returns an array with 8 objects
		return $query->setMaxResults(8)->execute();
	}

	public function findCountry1(): array
	{
		//request to find food contry Italian
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery("
			SELECT DISTINCT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website, s.country
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\RestoFoods rf, App\Entity\Specialities s
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.country='Italian'            
		");

		// returns an array with 8 objects
		return $query->setMaxResults(8)->execute();
	}

	public function findCountry2(): array
	{
		//request to find food contry American
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery("
			SELECT DISTINCT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website, s.country
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\RestoFoods rf, App\Entity\Specialities s
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.country='American'            
		");

		// returns an array with 8 objects
		return $query->setMaxResults(8)->execute();
	}

	// find all food contry belgian 
	public function findAllCountry(): array
	{
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery("
			SELECT DISTINCT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website, s.country
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\RestoFoods rf, App\Entity\Specialities s
			WHERE r.id = rf.restaurant_id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.country='Belgian'            
		");

		// returns an array with 8 objects
		return $query->execute();
	}


	/*
	* Find Foods by type
	* typesControoler
	*/


	public function findByTypeVeg(): array
	{
		//request to find food vegetable 
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\Specialities s, App\Entity\RestoFoods rf
			WHERE r.id = rf.id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.category = 'vegetable'
		");

		// returns an array of vegetable objects
		return $query->execute();
	}

	public function findByTypeMeat(): array
	{
		//request to find food meat
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\Specialities s, App\Entity\RestoFoods rf
			WHERE r.id = rf.id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.category = 'meat'
		");

		// returns an array of drink objects
		return $query->execute();
	}

	public function findByTypeFish(): array
	{
		//request to find food fish
		$entityManager = $this->getEntityManager();
		$query = $entityManager->createQuery(
			"SELECT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website
			FROM App\Entity\Restaurants r, App\Entity\Foods f, App\Entity\Specialities s, App\Entity\RestoFoods rf
			WHERE r.id = rf.id AND rf.food_id = f.id AND f.speciality_id = s.id AND s.category = 'fish'
		");

		// returns an array of drink objects
		return $query->execute();
	}

}
