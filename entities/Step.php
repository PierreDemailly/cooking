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
              $content_step,
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
     * Get the value of content_step
     */ 
    public function getContent_step()
    {
        return $this->content_step;
    }

    /**
     * Set the value of content_step
     *
     * @return  self
     */ 
    public function setContent_step($content_step)
    {
        $this->content_step = $content_step;

        return $this;
    }
}