<?php

class Recipe{
    protected $id,
              $namerecipe,
              $picture,
              $userid;


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
     * Get the value of namerecipe
     */ 
    public function getNamerecipe()
    {
                return $this->namerecipe;
    }

    /**
     * Set the value of namerecipe
     *
     * @return  self
     */ 
    public function setNamerecipe($namerecipe)
    {
                $this->namerecipe = $namerecipe;

                return $this;
    }

    /**
     * Get the value of userid
     */ 
    public function getUserid()
    {
                return $this->userid;
    }

    /**
     * Set the value of userid
     *
     * @return  self
     */ 
    public function setUserid($userid)
    {
                $this->userid = $userid;

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
}