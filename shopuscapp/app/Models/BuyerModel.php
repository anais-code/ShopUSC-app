<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyerModel extends Model
{
    //intialise variables
    protected $table = 'buyer';
    protected $primaryKey = 'BuyerID';
    protected $allowedFields = ['FirstName', 'LastName', 'Email', 'Password', 'TelNumber'];

    //register function which inserts the buyer data
    public function register($data)
    {
        //insert new buyer info into database
        return $this -> insert($data);
    }

    //find buyer email and password to validate login from db end
    public function validateLogin($email, $password)
    {
        //get buyer by email
        $user = $this->where('Email',$email)->first();

        //check if buyer exists and return them
        //this will be used in other files to create a session
        if($user && password_verify($password, $user['Password']));
        {
            return $user;
        }
        return null;
    }
}