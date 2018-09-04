<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CountriesController extends AbstractController
{
    /**
     * @Route("/countries", name="countries")
     */
    public function index()
    {
        return $this->render('countries/index.html.twig', [
            'controller_name' => 'CountriesController',
        ]);
    }
}
