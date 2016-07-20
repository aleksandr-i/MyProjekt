<?php

class AdminIndexController extends Controller
{
    public function indexAction(Request $request)
    {
        if (!Session::has('user')){
            Router::redirect('/login');
        }

        return $this->render('index');
    }
}