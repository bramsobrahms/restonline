<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Users
{   
    /**
     * @var string
     * @Assert\NotNull(message="What is your name.")
     */
    public $name;

    /**
     * @var string
     * @ASsert\NotNull(message= "What is your first name")
     */
    public $first_name;

    /**
     * @var string
     * @ASsert\NotNull(message= "This email is already use.")
     */
    public $email;

    /**
     * @var string
     * @ASsert\NotNull(message= "Can you write your password.")
     */
    public $password;

    /**
     * @var date
     * @Assert\NotNull(message="Enter you date birthday")
     */
    public $birthday;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your sexe")
     */
    public $sexe;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your street")
     */
    public $street;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your zip code")
     */
    public $zip_code;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your city")
     */
    public $city;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your phone")
     */
    public $phone;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your date create")
     */
    public $date_create;

    /**
     * @var string
     * @Assert\NotNull(message="Can you write your phone")
     */
    public $role;
}