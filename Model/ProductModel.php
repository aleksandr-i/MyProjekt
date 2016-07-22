<?php

class ProductModel
{
    public function findAll()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT p.id, p. title, p.description, p.price, p.status, c.name AS category
                          FROM product p JOIN category c ON p.category_id = c.id
                          WHERE status = 1 ORDER BY p.id ASC ');
        $products = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (!$products){
            throw New NotFoundException ('Products not found');
        }

        return $products;
    }

    public function findAllAdmin()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT p.id, p. title, p.description, p.price, p.status, c.name AS category
                          FROM product p JOIN category c ON p.category_id = c.id
                          ORDER BY p.id ASC ');
        $products = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (!$products){
            throw New NotFoundException ('Products not found');
        }

        return $products;
    }

    public function findId($id)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT p.id, p. title, p.description, p.price, p.status, p.category_id, c.name AS category
                            FROM product p JOIN category c ON p.category_id = c.id
                            WHERE p.id = :number');

        $sth->execute(array(
            'number' => $id
        ));

        $products = $sth->fetch(PDO::FETCH_ASSOC);

        if (!$products) {
            throw New NotFoundException ('Products not found');
        }

        return $products;
    }

    public function remove($id)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('DELETE FROM product WHERE id = :id');
        
        $sth->execute(array(
            'id' => $id,
        ));
    }

    public function update(array $product) // update/save
    {
        //todo: check if array has keys title, price

        $db = DbConnection::getInstance()->getPdo();
        $sql = 'UPDATE product SET 
                title = :title, 
                price = :price, 
                description = :description, 
                category_id = :category_id, 
                status = :status 
                WHERE  id = :id';
        $sth = $db->prepare($sql);
        $sth->execute($product);
    }
}