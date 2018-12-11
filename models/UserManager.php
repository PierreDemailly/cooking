<?php

class UserManager extends Manager {
    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @return  self
     */ 
    public function setDb($db)
    {
        $this->_db = $db;

        return $this;
    }

    public function addUser(User $user){
        $req = $this->getDb()->prepare('INSERT INTO users(pseudo, pass, email, avatar) VALUES (:pseudo, :pass, :email, :avatar)');
        $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':avatar', $user->getAvatar());
        $req->execute();
    }

    public function exist($arg_pseudo)
    {
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req->bindValue(':pseudo', $arg_pseudo, PDO::PARAM_STR);
        $req->execute();
        $rep = $req->fetch();
        return $rep;
    }

    public function getUsers(){
        $req = $this->getDb()->query('SELECT * FROM users');
        $data_users = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data_users);
    }

    public function getUSerbypseudo($email){
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $rep = $req->fetch();
        $data_user = new User($rep);
        return $data_user;

    }
}
