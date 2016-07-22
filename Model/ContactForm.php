<?php

class ContactForm
{
    public $username;
    public $email;
    public $message;

    /**
     * ContactForm constructor.
     * @param Request $request
     */

    public function __construct(Request $request)
    {
        $this->username = $request->post('username');
        $this->email = $request->post('email');
        $this->message = $request->post('message');
    }

    /**
     * @return bool
     */
    
    public function isValid()
    {
        $res = $this->username !== '' && $this->email !== '' && $this->message !== '';
        return $res;
    }
}