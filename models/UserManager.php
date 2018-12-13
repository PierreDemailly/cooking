<?php
/**
 * Class representing a User manager
 */
class UserManager extends Manager {
    /**
     * Get all users
     * @return array<User>
     */
    public function getUsers()
    {
        $req = $this->db->query('SELECT * FROM users');
        while ($user = $req->fetch()) { $users[] = new User($user); }
        return $users;
    }

    /**
     * Get a user with id or email
     * @param int|string $id
     * @return User
     */
    public function getUser($id)
    {
        if(ctype_digit($id))
        { 
            $req = $this->db->prepare('SELECT * FROM users WHERE id = :id');
            $req->bindValue('id', $id, PDO::PARAM_INT);
        }
        else 
        {
            $req = $this->db->prepare('SELECT * FROM users WHERE email = :email');
            $req->bindValue('email', $id, PDO::PARAM_STR);
        }
        $req->execute();
        return new User($req->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * Add a User (pseudo, email, pass, avatar) to database
     * @param User $user
     * @return void
     */
    public function addUser(User $user)
    {
        $req = $this->db->prepare('INSERT INTO users (pseudo, password, email, avatar) VALUES (:pseudo, :pass, :email, :avatar)');
        $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':avatar', $user->getAvatar(), PDO::PARAM_STR);
        $req->execute();
        return;
    }

    /**
     * Check if email exist
     * @param string $email
     * @return boolean
     */
    public function emailExist($email)
    {
        $req = $this->db->prepare('SELECT COUNT(id) FROM users WHERE email = :email');
        $req->bindValue('email', $email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchColumn() > 0;
    }

    /**
     * Check if pseudo exist
     * @param string $pseudo
     * @return boolean
     */
    public function pseudoExist($pseudo)
    {
        $req = $this->db->prepare('SELECT COUNT(id) FROM users WHERE pseudo = :pseudo');
        $req->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchColumn() > 0;
    }

    /**
     * Verify if the password is correct
     * @param string $email
     * @param string $pass
     * @return boolean
     */
    public function passwordVerify($email, $pass)
    {
        $req = $this->db->prepare('SELECT password FROM users WHERE email = :email');
        $req->bindValue('email', $email, PDO::PARAM_STR);
        $req->execute();
        return password_verify($pass, $req->fetch()['password']);
    }

    /**
     * Set an auth-token to a User
     * @param User $user
     * @param string $token
     * @return void
     */
    public function setUserToken($user, $token)
    {
        $req = $this->db->prepare('UPDATE users SET token = :token WHERE id = :id');
        $req->bindValue('token', $token, PDO::PARAM_STR);
        $req->bindValue('id', $user->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    // public function getUserByRecip($getId){
    //     $req = $this->db->prepare('SELECT * FROM users WHERE id = :Id');
    //     $req->bindValue('getId', $getId, PDO::PARAM_INT);
    //     $req->execute();
    //     return new User($req->fetch(PDO::FETCH_ASSOC));
    // }
}
