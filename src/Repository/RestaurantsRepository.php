<?php

namespace App\Repository;

use App\Entity\Restaurants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Restaurants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restaurants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restaurants[]    findAll()
 * @method Restaurants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestaurantsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Restaurants::class);
    }

    public function findByCity()
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("
            SELECT DISTINCT r.id, r.picture, r.name, r.street, r.zip_code, r.city, r.phone, r.email, r.website
            FROM App\Entity\Restaurants r          
        ");

        // returns an array of starter objects
        return $query->execute();
    }


}
