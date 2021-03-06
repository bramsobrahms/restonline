<?php
namespace App\Controller;

use App\Entity\Foods;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BasketController extends AbstractController
{
	/**
	 * @Route("/basket", name="basket")
	 */
	public function basket()
	{
		$request = $this->get('request_stack')->getCurrentRequest();
		$session = $request->getSession();
		
		if(!$session->has('basket')) $session->set('basket', array());

		/*var_dump($session->has('basket'));
		die();*/

		$em = $this->getDoctrine()->getManager();
		$foods = $em->getRepository(Foods::class)->findArray(array_keys($session->get('basket')));


		return $this->render('/basket/index.html.twig', [
			'controller_name' => 'basket',

			'foods'=>$foods,
		]);
 
	}

	/**
	 * @Route("/basket", name="addBasket")
	 */
	public function addBasket($id)
	{
		$request = $this->container->get('request_stack')->getCurrentRequest();
		$session = $request->getSession();
		$basket = $session->get('basket');

		if(!$session->has('basket')) $session->set('basket', array());
		$basket = $session->get('basket');

		
		if(array_key_exists($id, $basket)){
			
			if($request->quer->get('qty') !=null) $basket[$id] = $request->query->get('qty');
			$this->get('session')->getFlashBag()->add('success','you change! ');
			
		}else{

			if($request->query('qty') != null)
				$basket[$id] = $this->get('request_stack')->getCurrentRequest('qty');
			else
				$basket[$id] = 1;
			$this->get('session')->getFlashBag()->add('success','you add this meal');
		}

		$session->set('basket', $basket);
		
	
		return $this->render('/basket/index.html.twig', [
			'controller_name' => 'basket',

			'basket'=>$basket,

		]);
	}

	/**
	 * @Route("/basket", name="DeleteBasket")
	 */
	public function deleteBasket($id)
	{
		$request = $this->container->get('request_stack')->getCurrentRequest();
		$session = $request->getSession();
		$basket = $session->get('basket');

		if (array_key_exists($id, $basket)){
			unset($basket[$id]);
			$basket->set('basket',$basket);
			$this->get('session')->getFlashBag()->add('success','The food has been delete');
		}

		return $this->render('/basket/index.html.twig', [
			'controller_name' => 'basket',
		]);
	}

}
