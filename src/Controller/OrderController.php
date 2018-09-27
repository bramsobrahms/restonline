<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
	/**
	 * @Route("/order", name="order")
	 */
	/*public function order()
	{
		return $this->render('order/index.html.twig');
	}*/

	/**
	 * @Route("/checkout", name="order_checkout")
	 */
	public function checkout(Request $request)
	{
		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_54d02T37Y5GarDH0PuQi7Y3d");

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];

		$charge = \Stripe\Charge::create([
			'amount' => 500,
			'currency' => 'eur',
			'description' => 'resto.name',
			'source' => $token,
			'statement_descriptor' => 'Jean',
			'metadata' => ['order_id' => 6735],
		]);

		return $this->render('order/proof.html.twig');

	}

}
