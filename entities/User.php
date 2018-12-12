<?php 

class User{
    protected $id,
            $pseudo,
            $password,
            $email,
            $date_inscription,
            $avatar;

    public function __construct(array $array){
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
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
                return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
                $this->pseudo = $pseudo;

                return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPassword()
    {
                return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPassword($pass)
    {
                $this->pass = $pass;

                return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
                return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
                $this->email = $email;

                return $this;
    }

    /**
     * Get the value of date_inscription
     */ 
    public function getDateinscription()
    {
                return $this->date_inscription;
    }

    /**
     * Set the value of date_inscription
     *
     * @return  self
     */ 
    public function setDateinscription($dateinscription)
    {
                $this->date_inscription = $dateinscription;

                return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
                return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
                $this->avatar = $avatar;

                return $this;
    }
}
