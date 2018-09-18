<?php

namespace App\Controller;

use App\Entity\Restaurants;
use App\Entity\Foods;
use App\Entity\RestoFoods;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RestaurantsController extends AbstractController
{
    /**
     * @Route("/", name="restaurants")
     */
    public function index()
    {
        $restaurants= $this->getDoctrine()->getRepository
        (Restaurants::class)->findAll();

        //return new Response('Restaurant: '.$restaurant->getName());
        return $this->render('restaurants/index.html.twig', array('restaurants' => $restaurants));
    }

    /**
     * @Route("/restaurant/{id}", name="restaurant_id")
     */
    public function showRestaurant($id)
    {
        $restaurant = $this->getDoctrine()
            ->getRepository(Restaurants::class)
            ->find($id);

        $food = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository(Foods::class)
            ->findAll();

        $restoFood = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository(RestoFoods::class)
            ->findAll();
                    

        if(!$restaurant){
            throw $this->createNotFoundException('We don\'t found for id'.$id);
        }
        return $this->render('restaurants/oneResto.html.twig', [
            'controller_oneResto' => 'oneResto',
            
            'pictureResto'=> $restaurant->getPicture(),
            'nameResto'=> $restaurant->getName(),
            'streetResto'=> $restaurant->getStreet(),
            'zipCodeResto'=> $restaurant->getZipCode(),
            'cityResto'=> $restaurant->getCity(),
            'phoneResto'=> $restaurant->getPhone(),
            'emailResto'=> $restaurant->getEmail(),
            'webResto'=>$restaurant->getWebsite(),

            'foods'=>$food,
            'restoFoods'=>$restoFood,
        ]);
        
    }
  
}
