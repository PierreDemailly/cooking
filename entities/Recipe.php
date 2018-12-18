<?php
/**
 * Class representing a recipe
 */
class Recipe extends Entity {
    /**
     * @var int $id 
     * @var string $name 
     * @var string $picture 
     * @var int $user_id
     * @var string $type
     * @var string $difficulty
     * @var string $cost
     * @var int $preparation_time
     * @var int $cooking_time
     * @var string $quantity
     */
    protected $id,
              $name,
              $picture,
              $user_id,
              $type,
              $difficulty,
              $cost,
              $preparation_time,
              $cooking_time;

    const TYPES = array(
        'starter', 'main-course', 'dessert', 'side', 'appetizer', 'drink', 'candy', 'sauce', 'tip'
    );
    const DIFFICULTIES = array(
        'very-easy', 'easy', 'medium', 'hard'
    );
    const COSTS = array(
        'cheap', 'average', 'quite-expensive', 'expensive'
    );

    /**
     * Get the value of id
     * @return int
     */ 
    public function getId() { return $this->id; }

    /**
     * Set the value of id
     * @return self
     */ 
    public function setId($id) { $this->id = $id; return $this; }

    /**
     * Get the value of name
     * @return string
     */ 
    public function getName() { return $this->name; }

    /**
     * Set the value of name
     * @return self
     */ 
    public function setName($name) { $this->name = $name; return $this; }

    /**
     * Get the value of user_id
     * @return int
     */ 
    public function getUser_id() { return $this->user_id; }

    /**
     * Set the value of user_id
     * @return self
     */ 
    public function setUser_id($user_id) { $this->user_id = $user_id; return $this; }

    /**
     * Get the value of picture
     * @return string
     */ 
    public function getPicture() { return $this->picture; }

    /**
     * Set the value of picture
     * @return self
     */ 
    public function setPicture($picture) { $this->picture = $picture; return $this; }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of difficulty
     */ 
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     *
     * @return  self
     */ 
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get the value of cost
     */ 
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set the value of cost
     *
     * @return  self
     */ 
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get the value of preparation_time
     */ 
    public function getPreparation_time()
    {
        return $this->preparation_time;
    }

    /**
     * Set the value of preparation_time
     *
     * @return  self
     */ 
    public function setPreparation_time($preparation_time)
    {
        $this->preparation_time = $preparation_time;

        return $this;
    }


    /**
     * Get the value of cooking_time
     */ 
    public function getCooking_time()
    {
        return $this->cooking_time;
    }

    /**
     * Set the value of cooking_time
     *
     * @return  self
     */ 
    public function setCooking_time($cooking_time)
    {
        $this->cooking_time = $cooking_time;

        return $this;
    }

 


}
