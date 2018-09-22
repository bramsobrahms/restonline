<?php

namespace App\Controller;

use App\Entity\Restaurants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CitiesController extends AbstractController
{
	/**
	 * @Route("/cities", name="cities")
	 */
	public function index()
	{
		$city = $this->getDoctrine()
		->getRepository(Restaurants::class)
		->findByCity();

		$nameCity = 'Bruxelles';
		
		return $this->render('/cities/index.html.twig', [
			'controller_cities' => 'cities',

			'nameCity' => $nameCity,
			'city'=> $city,
			
		]);
	}
}
