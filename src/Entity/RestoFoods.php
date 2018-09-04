<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestoFoodsRepository")
 */
class RestoFoods
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $restaurant_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $food_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurantId(): ?int
    {
        return $this->restaurant_id;
    }

    public function setRestaurantId(int $restaurant_id): self
    {
        $this->restaurant_id = $restaurant_id;

        return $this;
    }

    public function getFoodId(): ?int
    {
        return $this->food_id;
    }

    public function setFoodId(int $food_id): self
    {
        $this->food_id = $food_id;

        return $this;
    }
}
