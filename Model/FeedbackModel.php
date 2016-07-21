<?php

class FeedbackModel
{
    public function save(array $feedback)
    {
        // todo: check if feedback has keys, username, email and so on
        
        $db = DbConnection::getInstance()->getPdo();
        $sql = 'INSERT INTO feedback (username, email, message, created, ip_adress) 
                VALUES (:username, :email, :message, :created, :ip_adress)';
        $sth = $db->prepare($sql);
        $sth->execute($feedback);
    }

    public function show()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT * FROM feedback');
        
        $feedback = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        if (!$feedback){
            throw New NotFoundException ('Feedback not found');
        }
        
        return $feedback;
    }
}