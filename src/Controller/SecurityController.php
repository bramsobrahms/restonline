<?php

namespace App\Controller;

use App\Form\Handler\UserHandler;
use App\Form\Type\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(UserHandler $formHandler, Request $request): Response
    {
        $form = $this->createForm(RegisterType::class);

        if($formHandler->Handle($form, $request)){
            return $this->redirectToRoute('list');
        }

        return $this->render('security/register.html.twig', ['form' => $form->createView()]);
    } 
}
