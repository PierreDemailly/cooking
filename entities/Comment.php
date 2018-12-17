<?php

class Comment extends Entity{
    protected $id,
            $comment,
            $post_date,
            $recipe_id,
            $user_id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

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
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of post_date
     */ 
    public function getPost_date()
    {
        return $this->post_date;
    }

    /**
     * Set the value of post_date
     *
     * @return  self
     */ 
    public function setPost_date($post_date)
    {
        $this->post_date = $post_date;

        return $this;
    }
}