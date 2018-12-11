<?php 

class Step{
    protected $idStep,
                $descriptionStep,
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
     * Get the value of idStep
     */ 
    public function getIdStep()
    {
        return $this->idStep;
    }

    /**
     * Set the value of idStep
     *
     * @return  self
     */ 
    public function setIdStep($idStep)
    {
        $this->idStep = $idStep;

        return $this;
    }

    /**
     * Get the value of descriptionStep
     */ 
    public function getDescriptionStep()
    {
        return $this->descriptionStep;
    }

    /**
     * Set the value of descriptionStep
     *
     * @return  self
     */ 
    public function setDescriptionStep($descriptionStep)
    {
        $this->descriptionStep = $descriptionStep;

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