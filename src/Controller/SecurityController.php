<?php

namespace App\Controller;

use App\Entity\users;
use App\Form\Handler\UserHandler;
use App\Form\Type\RegisterType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(UserHandler $formHandler, Request $request, UserPasswordEncoderInterface $encoder): Response
    {
    	$form = $this->createForm(RegisterType::class);

        if($formHandler->handle($form, $request, $encoder)){
            return $this->redirectToRoute('restaurants');
        }

        return $this->render('security/register.html.twig', [ 'form' => $form->createView()]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationsUtils): Response
    {
        return $this->render('security/login.html.twhig',[
            'error' => $authenticationsUtils->getLastAuthenticationError(),
            'last_email' => $authenticationsUtils->getLastEmail()
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(): void
    {

    }
}
