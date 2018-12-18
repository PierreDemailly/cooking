<?php
/**
 * Class representing an ingredient
 */
class Ingredient extends Entity {
    /**
     * @var int $id
     * @var string $description
     * @var int $recipe_id
     */
    protected $id,
              $content_ingredient,
              $quantity,
              $recipe_id;


    /**
     * Get $recipe_id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set $recipe_id
     *
     * @param  int  $id  $recipe_id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of recipe_id
     */ 
    public function getRecipe_id()
    {
        return $this->recipe_id;
    }

    /**
     * Set the value of recipe_id
     *
     * @return  self
     */ 
    public function setRecipe_id($recipe_id)
    {
        $this->recipe_id = $recipe_id;

        return $this;
    }



    /**
     * Get the value of content_ingredient
     */ 
    public function getContent_ingredient()
    {
        return $this->content_ingredient;
    }

    /**
     * Set the value of content_ingredient
     *
     * @return  self
     */ 
    public function setContent_ingredient($content_ingredient)
    {
        $this->content_ingredient = $content_ingredient;

        return $this;
    }
}