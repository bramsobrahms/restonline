<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchController extends AbstractController
{
	/**
	 * @Route("/search", name="searchResult")
	 */
	public function index()
	{
		return $this->render('search/index.html.twig', [
			'controller_name' => 'SearchController',
		]);
	}


}
