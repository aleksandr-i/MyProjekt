<?php

class AdminProductController extends Controller
{
    public function indexAction()
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

    public function removeAction(Request $request)
    {
        if (!Session::has('user')){
            Router::redirect('/login');
        }

        $id = $request->get('id');
        $productModel = New ProductModel();
        $productModel->remove($id);

        Session::setFlash("Product {$id} removed");
        Router::redirect('/admin/products');
    }
}