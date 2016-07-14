<?php

class ProductModel
{
    public function findAll()
    {
        return array(
            array(
                'id' => 1,
                'title' => 'Dracula',
                'author' => 'Stoker',
                'price' => 666
            ),
            array(
                'id' => 2,
                'title' => 'Dream catcher',
                'author' => 'King',
                'price' => 243
            ),
            array(
                'id' => 3,
                'title' => 'Flowers for Eldzhernon',
                'author' => 'Somepne',
                'price' => 3423
            ),
        );
    }

    public function findId($id)
    {
        $books = array(
            array(
                'id' => 1,
                'title' => 'Dracula',
                'author' => 'Stoker',
                'price' => 666
            ),
            array(
                'id' => 2,
                'title' => 'Dream catcher',
                'author' => 'King',
                'price' => 243
            ),
            array(
                'id' => 3,
                'title' => 'Flowers for Eldzhernon',
                'author' => 'Somepne',
                'price' => 3423
            ),
        );

        foreach ($books as $book) {
            if ($book['id'] == $id) {
                return $book;
            }
        }

        throw New NotFoundException('Book not found');
    }
}