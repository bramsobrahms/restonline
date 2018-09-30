<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class infosController extends AbstractController
{
    /**
	 * @Route("/FAQ", name="faq")
	 */
    public function faq()
	{
		// redirect to template faq
		return $this->render('infos/faq.html.twig', [
			'controller_faq' => 'faq',			
		]);
    }
    
    /**
	 * @Route("/termsAndConditions", name="termsAndConditions")
	 */
    public function termsAndConditions()
	{
		// redirect to template termsAndConditions
		return $this->render('infos/condition.html.twig', [
			'controller_faq' => 'faq',			
		]);
	}
}