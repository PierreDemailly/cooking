<?php 
/**
 * Class representing a step
 */
class Step extends Entity{
    /**
     * @var int $id
     * @var string $description
     * @var int $recipe_id
     */
    protected $id,
              $description,
              $recipe_id;
    
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
     * Get the value of description
     * @return string
     */ 
    public function getDescription() { return $this->description; }

    /**
     * Set the value of description
     * @return self
     */ 
    public function setdescription($description) { $this->description = $description; return $this; }

    /**
     * Get the value of recipe_id
     * @return int
     */ 
    public function getRecipe_id() { return $this->recipe_id; }

    /**
     * Set the value of recipe_id
     * @return self
     */ 
    public function setRecipe_id($recipe_id) { $this->recipe_id = $recipe_id; return $this; }
}
