<?php 
/**
 * Class representing a user
 */
class User{
    /**
     * @var int $id 
     * @var string $pseudo
     * @var string $password
     * @var string $email 
     * @var string $date_inscription
     * @var string @avatar
     */
    protected $id,
            $pseudo,
            $password,
            $email,
            $date_inscription,
            $avatar;

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
     * Get the value of pseudo
     * @return string
     */ 
    public function getPseudo() { return $this->pseudo; }

    /**
     * Set the value of pseudo
     * @return self
     */ 
    public function setPseudo($pseudo) { $this->pseudo = $pseudo; return $this; }

    /**
     * Get the value of password
     * @return string
     */ 
    public function getPassword() { return $this->pass; }

    /**
     * Set the value of password
     * @return self
     */ 
    public function setPassword($pass) { $this->pass = $pass; return $this; }

    /**
     * Get the value of email
     * @return string
     */ 
    public function getEmail() { return $this->email; }

    /**
     * Set the value of email
     * @return self
     */ 
    public function setEmail($email) { $this->email = $email; return $this; }

    /**
     * Get the value of date_inscription
     * @return string
     */ 
    public function getDateinscription() { return $this->date_inscription; }

    /**
     * Set the value of date_inscription
     * @return self
     */ 
    public function setDateinscription($dateinscription) { $this->date_inscription = $dateinscription; return $this; }

    /**
     * Get the value of avatar
     * @return string
     */ 
    public function getAvatar() { return $this->avatar; }

    /**
     * Set the value of avatar
     * @return self
     */ 
    public function setAvatar($avatar) { $this->avatar = $avatar; return $this; }
}
