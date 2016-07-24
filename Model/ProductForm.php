<?php

class ProductForm
{
    public $title;
    public $price;
    public $description;
    public $category;

    /**
     * @var UploadedFile
     */
    public $attachment;

    /**
    * ContactForm constructor.
    * @param Request $request
    */

    public function __construct(Request $request)
    {
        $this->title = $request->post('title'); //$_POST
        $this->price = $request->post('price');
        $this->description = $request->post('description');
        $this->category = $request->post('category');
        $this->attachment = $request->files('document'); // $_FILES[''document];
    }

    /**
     * is numeric
     * @return bool
     */

    public function isValid()
    {
        $res = $this->title !== '' && $this->price !== '' && $this->description !== '';
        
        //$res = $res && $this->attachment->isImage();
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