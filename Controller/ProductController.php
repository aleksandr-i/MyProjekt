<?php

class ProductController extends Controller
{
    public function indexAction(Request $request)
    {
        $productModel = New ProductModel();
        $products = $productModel->findAll();
        
        $args = array(
            'products' => $products
        );
        
        return $this->render('index', $args);
    }

    public function showAction(Request $request)
    {
        $id = $request->get('id'); //$_GET['id]
        $productModel = New ProductModel();
        $product = $productModel->findId($id);
        
        $args = array(
            'product' => $product
        );
        
        return $this->render('show', $args);
    }
}