<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypesController extends AbstractController
{
	/**
	 * @Route("/types", name="types")
	 */
	public function index()
	{
		return $this->render('types/index.html.twig', [
			'controller_types' => 'types',
		]);
	}
}
