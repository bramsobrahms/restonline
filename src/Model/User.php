<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class User
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
     * @ASsert\NotNull(message= "Please write your email.")
     */
    public $email;

    /**
     * @var string
     * @ASsert\NotNull(message= "Can you write your password.")
     */
    public $password;
}