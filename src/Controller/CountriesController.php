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

		$theCountryResto = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findCountry();

		$theCountryResto1 = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findCountry1();

		$theCountryResto2 = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findCountry2();


		if(!$theCountryResto){
			throw $this->createNotFoundException('We don\'t found for id'.$id);
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

		$allBelgianResto = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findAllCountry();


		if(!$allBelgianResto){
			throw $this->createNotFoundException('We don\'t found for id'.$id);
		}
		return $this->render('countries/allCountryResto.html.twig', [
			'controller_countries' => 'countries',

			'allBelgianResto'=>$allBelgianResto,
	

			
		]);
	}
}