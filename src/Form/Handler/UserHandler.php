<?php

namespace App\Form\Handler;

use App\Entity\User;
use App\Model\User as UserModel;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

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

    public function handle(FormInterface $form, Request $request)
    {
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            /**
             * @var UserModel $userModel
             */
            $userModel = $form->getData();

            /**
             * @var User $user
             */
            $user = new User();
            $user->setName($userModel -> name);
            $user->setFirstName($userModel -> firs_name);
            $user->setEmail($userModel -> email);
            $user->setPassword();
            $user->setRoles(['ROLE_USER']);

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