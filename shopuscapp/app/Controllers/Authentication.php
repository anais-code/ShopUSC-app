<?php
namespace App\Controllers;

class Authentication extends BaseController
{
    public function index()
    {
        return view('login_signup_main');
    }

    public function buyer_login()
    {
        return view('buyer_login');
    }

    public function seller_login()
    {
        return view('seller_login');
    }
}