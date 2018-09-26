<?php

namespace App\Controller;

use App\Entity\Restaurants;
use App\Entity\Foods;
use App\Entity\RestoFoods;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RestaurantsController extends AbstractController
{
	/**
	 * @Route("/", name="restaurants")
	 */
	public function index()
	{
		$restaurants= $this->getDoctrine()->getRepository
		(Restaurants::class)->findAll();

		//return new Response('Restaurant: '.$restaurant->getName());
		return $this->render('restaurants/index.html.twig', array('restaurants' => $restaurants));
	}

	/**
	 * @Route("/restaurant/{id}", name="restaurant_id")
	 */
	public function showRestaurant($id)
	{
		$resto = $this->getDoctrine()
			->getRepository(Restaurants::class)
			->findByresto($id);

		   // $id = $restaurant->getId();

		$starters = $this->getDoctrine()
			->getRepository(Foods::class)
			->findStarter($id);

		$dishs = $this->getDoctrine()
			->getRepository(Foods::class)
			->findDish($id);

		$drinks = $this->getDoctrine()
			->getRepository(Foods::class)
			->findDrink($id);
		
		$desserts = $this->getDoctrine()
			->getRepository(Foods::class)
			->findDessert($id);
				
		  

	

		return $this->render('restaurants/oneResto.html.twig', [
			'controller_oneResto' => 'oneResto',
			
			'resto'=>$resto,
			'starters'=> $starters,
			'dishs'=> $dishs,
			'drinks'=>$drinks,
			'desserts'=>$desserts,

		]);
		
	}

}
