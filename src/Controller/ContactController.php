<?php
namespace App\Controller;

use App\Form\Contact\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use \Swift_SmtpTransport,\Swift_Mailer,\Swift_Message,\newInstance;

class ContactController extends AbstractController
{
	/**
	 * @Route("/contact", name="contact")
	 */
	public function contactAction(Request $request)
	{
		// Create the form according to the FormType created previously.
		// And give the proper parameters
		$form = $this->createForm('App\Form\Contact\ContactType',null,array(
			// To set the action use $this->generateUrl('route_identifier')
			'action' => $this->generateUrl('contact'),
			'method' => 'POST'
		));

		if ($request->isMethod('POST')) {
			// Refill the fields in case the form is not valid.
			$form->handleRequest($request);

			if($form->isValid()){
				// Send mail
				if($this->sendEmail($form->getData())){

					// Everything OK, redirect to wherever you want ! :
					
					return $this->redirectToRoute('redirect_to_somewhere_now');
				}else{
					// An error ocurred, handle
					var_dump("Errooooor :(");
				}
			}
		}

		return $this->render('/contact/index.html.twig', [
			'controller_name ' => 'contact',
			//send data until the template
			'form' => $form->createView()

		]);
	}

	// send a mail for each restaurant personal 	
	private function sendEmail(){
		$myappContactMail = 'bramsobrahm@gmail.com';
		$myappContactPassword = '123';
		
		// In this case we'll use the ZOHO mail services.
		// If your service is another, then read the following article to know which smpt code to use and which port
		// http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
			->setUsername($myappContactMail)
			->setPassword($myappContactPassword); 

		$mailer = new Swift_Mailer($transport);
				
		$message = (new Swift_Message("Our Code World Contact Form ". $data["subject"]))
		->setFrom(array($myappContactMail => "Message by " .$data["name"]))
		->setTo(array(
			$myappContactMail => $myappContactMail
		))
		->setBody($data["message"]."<br>ContactMail : ".$data["email"]);
		
		return $mailer->send($message);
	}
}
