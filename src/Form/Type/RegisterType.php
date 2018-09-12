<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Name']])
            ->add('first_name', TextType::class, ['attr' => ['placeholder' => 'First name']])
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Email']])
            ->add('birthday',DateType::class, ['attr' =>['placeholder' => 'Birthday']])
            ->add('sexe', TextType::class, ['attr' => ['placeholder' => 'sexe']])
            ->add('street', TextType::class, ['attr' => ['placeholder' => 'street']])
            ->add('zip_code', TextType::class, ['attr' => ['placeholder' => 'zip code']])
            ->add('city', TextType::class, ['attr' => ['placeholder' => 'city']])
            ->add('phone', TextType::class, ['attr' => ['placeholder' => 'phone']])
            ->add('date_create', DateType::class, ['attr' => ['placeholder' => 'date Create']])
            ->add('role', TextType::class, ['attr' => ['placeholder' => 'role']])
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat the password'),
            ))
            ->add('submit', SubmitType::class,[
                'label' => 'Register',
                'attr' => ['class' => 'btn btn-primary btn-lg']]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Model\Users'
        ));
    }

}