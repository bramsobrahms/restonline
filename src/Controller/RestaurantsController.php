<?php

namespace App\Controller;

use App\Entity\Restaurants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class RestaurantsController extends AbstractController
{
    /**
     * @Route("/", name="restaurants")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $restaurant = new Restaurants();
        $restaurant->setPicture('chou');
        $restaurant->setName('Chou');
        $restaurant->setStreet('Place de Londres 5');
        $restaurant->setZipCode('1050');
        $restaurant->setCity('Ixelles');
        $restaurant->setPhone('+32 2 684 36 98');
        $restaurant->setEmail('chou@gmail.com');
        $restaurant->setTva('BCE 0485789635');
        $restaurant->setWebsite('www.chou.be');


        $entityManager->persist($restaurant);

        $entityManager->flush();

        //return new Response('Restaurant: '.$restaurant->getName());
        return $this->render('restaurants/index.html.twig', [
            'controller_restaurants' => 'restaurants',
            
            'picture'=> $restaurant->getPicture(),
            'name'=> $restaurant->getName(),
            'street'=> $restaurant->getStreet(),
            'zipCode'=> $restaurant->getZipCode(),
            'city'=> $restaurant->getCity(),
            'phone'=> $restaurant->getPhone(),
            'email'=> $restaurant->getEmail(),
            'web'=>$restaurant->getWebsite(),
        ]);
    }

    /**
     * @Route("/restaurant/{id}", name="restaurant_id")
     */
    public function showRestaurant($id)
    {
        $restaurant = $this->getDoctrine()
            ->getRepository(Restaurants::class)
            ->find($id);

        if(!$restaurant){
            throw $this->createNotFoundException('restaurant found for id'.$id);
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
        ]);
    }


    
}
