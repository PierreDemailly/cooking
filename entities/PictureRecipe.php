<?php

class PictureRecipe{
    protected $idPicture,
        $picture,
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
     * Get the value of idPicture
     */ 
    public function getIdPicture()
    {
        return $this->idPicture;
    }

    /**
     * Set the value of idPicture
     *
     * @return  self
     */ 
    public function setIdPicture($idPicture)
    {
        $this->idPicture = $idPicture;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

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