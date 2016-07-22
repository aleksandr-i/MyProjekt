<?php

class CategoryModel
{
    public function findAll()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT * FROM category ORDER BY NAME');
        $category = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (!$category){
            throw New NotFoundException ('Categories not found');
        }

        return $category;
    }
}