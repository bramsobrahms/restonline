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
		return $this->render('restaurants/index.html.twig',
			array('restaurants' => $restaurants)
		);
	}

	/**
	 * @Route("/restaurant/{id}", name="restaurant_id")
	 */
	public function showRestaurant($id)
	{
		//Take data from repository and save datas for all Restos
		$resto = $this->getDoctrine()
			->getRepository(Restaurants::class)
			->findByresto($id);

		//Take data from repository and save datas for starters
		$starters = $this->getDoctrine()
			->getRepository(Foods::class)
			->findStarter($id);

		//Take data from repository and save datas for dishs
		$dishs = $this->getDoctrine()
			->getRepository(Foods::class)
			->findDish($id);

		//Take data from repository and save datas for drinks
		$drinks = $this->getDoctrine()
			->getRepository(Foods::class)
			->findDrink($id);

		//Take data from repository and save datas for
		$desserts = $this->getDoctrine()
			->getRepository(Foods::class)
			->findDessert($id);	

		//Rendering to template
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
