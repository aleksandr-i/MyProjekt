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

    public function editAction(Request $request)
    {
        if (!Session::has('user')){
            Router::redirect('/login');
        }
        
        $id = $request->get('id');

        $form = New ProductForm($request);

        $model = New ProductModel();
        $categoryModel = New CategoryModel();
        $categories = $categoryModel->findAll();

        $product = $model->findId($id);

        if ($request->isPost()){
            if ($form->isValid()){

                $model->update(array(
                    'id' => $id,
                    'title' => $form->title,
                    'price' => $form->price,
                    'description' => $form->description,
                    'category_id' => $form->category,
                    'status' => 1,
                ));
                Session::setFlash('Saved');
                Router::redirect('/admin/products');
            }

        } else {
            $form->setFromArray($product);
        }

        $args = array(
          'form' => $form,
          'categories' => $categories, 
          'product' => $product,
        );


        return $this->render('edit', $args);
    }
    
    
}