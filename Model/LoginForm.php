<?php

class LoginForm
{
    public $email;
    public $password;

    /**
     * LoginForm constructor.
     * @param Request $request
     */

    public function __construct(Request $request)
    {
        $this->email = $request->post('email');
        $this->password = $request->post('password');
    }

    /**
     * @return bool
     */

    public function isValid()
    {
        $res = $this->email !== '' && $this->password !== '';
        return $res;
    }
}