<?php
namespace App\Form\Handler;
use App\Entity\Users;
use App\Model\User as UserModel;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserHandler
{
	/**
	 * @var ObjectManager
	 */
	private $objectManager;

	/**
	 * @var LoggerInterface
	 */
	private $LoggerInterface;

	public function __construct (ObjectManager $objectManager, LoggerInterface $loggerInterface)
	{
		$this->objectManager = $objectManager;
		$this->loggerInterface = $loggerInterface;
	}

	public function handle(FormInterface $form, Request $request, UserPasswordEncoderInterface $encoder)
	{
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()){
			/**
			 * @var UserModel $userModel
			 */
			$userModel = $form->getData();

			/**
			 * @var Users $user
			 */
			
			// Save all data from Enity Users inside $user
			$user = new Users();
			$user->setName($userModel -> name);
			$user->setFirstName($userModel -> first_name);
			$user->setEmail($userModel -> email);
			$user->setBirthday($userModel -> birthday);
			$user->setSexe($userModel -> sexe);
			$user->setStreet($userModel -> street);
			$user->setZipCode($userModel -> zip_code);
			$user->setCity($userModel -> city);
			$user->setPhone($userModel -> phone);
			
			$user->setRole($userModel -> role);
			$user->setDateCreate($userModel -> date_create);
			$user->setRoles(['ROLE_USER']);

			$passEncoded = $encoder->encodePassword($user, $userModel->password);
			$user->setPassword($passEncoded);


			try{
				$this->objectManager->persist($user);
			} catch (ORMException $e){
				$this->loggerInterface->error($e->getMessage());
				$form->addError(new FormError('error when inserting into user database'));
				return false;
			}

			$this->objectManager->flush();

			return true;
		}
		return false;
	}
}