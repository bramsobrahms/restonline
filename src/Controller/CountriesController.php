<?php
namespace App\Controller;

use App\Entity\Specialities;
use App\Entity\RestoFoods;
use App\Entity\Restaurants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CountriesController extends AbstractController
{
	/**
	 * @Route("/countries", name="countries")
	 */
	public function index()
	{
		// take datas and sotck in this variable
		$theCountryResto = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findCountry();

		// take datas and sotck in this variable
		$theCountryResto1 = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findCountry1();

		// take datas and sotck in this variable
		$theCountryResto2 = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findCountry2();

		// If it isn't a id
		if(!$theCountryResto){
			throw $this->createNotFoundException("There isn't a yet: ".$id);
		}
		return $this->render('countries/index.html.twig', [
			'controller_countries' => 'countries',

			'theCountryResto'=>$theCountryResto,
			'theCountryResto1'=>$theCountryResto1,
			'theCountryResto2'=>$theCountryResto2,			
		]);
	}

	/**
	 * @Route("/countries/Belgian", name="allCountries")
	 */

	public function allCountry()
	{

		//All meals from Belgian
		$allBelgianResto = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findAllCountry();


		if(!$allBelgianResto){
			$this->addFlash("warning", "There isn't a yet, sorry about that");
		}
		return $this->render('countries/allCountryResto.html.twig', [
			'controller_countries' => 'countries',
			//Send datas about all Belgians restaurants
			'allBelgianResto'=>$allBelgianResto,			
		]);
	}
}