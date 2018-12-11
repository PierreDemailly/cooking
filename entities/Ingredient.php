<?php

class Ingredient{
    protected $idIngredient,
            $descriptionIngredient,
            $recipeId;

    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of idIngredient
     */ 
    public function getIdIngredient()
    {
        return $this->idIngredient;
    }

    /**
     * Set the value of idIngredient
     *
     * @return  self
     */ 
    public function setIdIngredient($idIngredient)
    {
        $this->idIngredient = $idIngredient;

        return $this;
    }

    /**
     * Get the value of descriptionIngredient
     */ 
    public function getDescriptionIngredient()
    {
        return $this->descriptionIngredient;
    }

    /**
     * Set the value of descriptionIngredient
     *
     * @return  self
     */ 
    public function setDescriptionIngredient($descriptionIngredient)
    {
        $this->descriptionIngredient = $descriptionIngredient;

        return $this;
    }

    /**
     * Get the value of recipeId
     */ 
    public function getRecipeId()
    {
        return $this->recipeId;
    }

    /**
     * Set the value of recipeId
     *
     * @return  self
     */ 
    public function setRecipeId($recipeId)
    {
        $this->recipeId = $recipeId;

        return $this;
    }
}