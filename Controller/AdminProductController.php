<?php

class AdminProductController extends Controller
{
    public function indexAction(Request $request)
    {
        if (!Session::has('user')){
            Router::redirect('/login');
        }
        
        $productModel = New ProductModel();
        $products = $productModel->findAllAdmin();

        $args = array(
            'products' => $products,
        );

        return $this->render('index', $args);
    }
}