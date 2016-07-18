<?php

abstract class Form
{
    public $username;
    public $email;
    public $message;
    public $password;

    /**
     * Form constructor.
     * @param $username
     * @param $email
     * @param $message
     * @param $password
     */
    public function __construct(Request $request)
    {
        $this->username = $request->post('username');
        $this->email = $request->post('email');
        $this->message = $request->post('message');
        $this->password = $request->post('password');
    }

    public function isValid()
    {
        $res = $this->username !== '' && $this->email !== '' && $this->message !== '';
        return $res;
    }
}