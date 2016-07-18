<?php

class UserModel
{
    public function find($email, $password)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT * FROM user WHERE email = :email AND password = :password AND status = 1');
        $sth->execute(array(
            'email' => $email,
            'password' => $password,
        ));
        
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        
        return $user;
        
    }
}