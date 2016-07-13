<?php

class ProductController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('index');
    }
}