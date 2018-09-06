<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantsController extends AbstractController
{
    /**
     * @Route("/", name="restaurants")
     */
    public function index()
    {
        return $this->render('restaurants/index.html.twig', [
            'controller_restaurants' => 'restaurants',
        ]);
    }
}
