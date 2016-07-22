<?php

class ProductForm
{
    public $title;
    public $price;
    public $description;
    public $category;


    public function __construct(Request $request)
    {
        $this->title = $request->post('title'); //$_POST
        $this->price = $request->post('price');
        $this->description = $request->post('description');
        $this->category = $request->post('category');

    }

    /**
     * is numeric
     * @return bool
     */

    public function isValid()
    {
        $res = $this->title !== '' && $this->price !== '' && $this->description !== '';

        return $res;
    }

    public function setFromArray(array $product)
    {
        $this->title = $product['title']; //$_POST
        $this->price = $product['price'];
        $this->description = $product['description'];
        $this->category = $product['category'];
    }
}