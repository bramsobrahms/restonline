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
		$typeVeg = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findByTypeVeg();

		$typeMeat = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findByTypeMeat();

		$typeFish = $this->getDoctrine()
		->getRepository(Specialities::class)
		->findByTypeFish();

		if(!$typeVeg){
			throw $this->createNotFoundException('whe don\'t have this type vegetable');
		}elseif(!$typeMeat){
			throw $this->createNotFoundException('whe don\'t have this type meat');
		}

		return $this->render('types/index.html.twig', [
			'controller_types' => 'types',
			'typeVeg'=> $typeVeg,
			'typeMeat'=> $typeMeat,
			'typeFish'=> $typeFish,
		]);
	}
}
