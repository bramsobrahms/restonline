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
		// take data to Repository and save the variable 
		$city = $this->getDoctrine()
		->getRepository(Restaurants::class)
		->findByCity();


		$nameCity = 'Bruxelles';
		
		/*$nameCity= $this->getDoctrine()
		->getRepository(Restaurants::class)
		->findByOneCity();*/

		/*var_dump($nameCity);
		die();*/
		
		return $this->render('/cities/index.html.twig', [
			'controller_cities' => 'cities',

			//redering with datas
			'nameCity' => $nameCity,
			'city'=> $city,
			
		]);
	}
	
}
