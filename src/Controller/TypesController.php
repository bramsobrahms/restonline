<?php
namespace App\Controller;

use App\Entity\Specialities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypesController extends AbstractController
{
	/**
	 * @Route("/types", name="types")
	 */
	public function index()
	{
		//Take data about repository and send in this variable -> Vegetarian
		$typeVeg = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findByTypeVeg();

		//Take data about repository and send in this variable -> Meats
		$typeMeat = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findByTypeMeat();

		//Take data about repository and send in this variable -> Fishs
		$typeFish = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findByTypeFish();

		/*
		* This is a if else about diet
		* if there isn't, it's pass to nex
		* until the last, who there is nothing. 
		*/
		if(!$typeVeg){
			throw $this->createNotFoundException('whe don\'t have this type vegetable');
		}elseif(!$typeMeat){
			throw $this->createNotFoundException('whe don\'t have this type meat');
		}elseif(!$typeFish){
			throw $this->createNotFoundException('whe don\'t have this type fish');
		}

		// redering to templates (views)
		return $this->render('types/index.html.twig', [
			'controller_types' => 'types',
			'typeVeg'=> $typeVeg,
			'typeMeat'=> $typeMeat,
			'typeFish'=> $typeFish,
		]);
	}
}
