<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CitiesController extends AbstractController
{
    /**
     * @Route("/cities", name="cities")
     */
    public function index()
    {
        return $this->render('cities/index.html.twig', [
            'controller_name' => 'CitiesController',
        ]);
    }
}
