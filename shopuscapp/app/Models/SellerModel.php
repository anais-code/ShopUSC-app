<?php

namespace App\Models;

use CodeIgniter\Model;

class SellerModel extends Model
{
    //intialise variables
    protected $table = 'seller';
    protected $primaryKey = 'SellerID';
    protected $allowedFields = ['FirstName', 'LastName', 'Email', 'Password', 'TelNumber', 'BusinessName', 'BusinessType', 'BusinessCategory', 'BusinessDescription'];

    //register function which inserts the seller data
    public function register($data)
    {
        //insert new seller info into database
        return $this -> insert($data);
    }

    //find seller email and password to validate login from db end
    public function validateLogin($email, $password)
    {
        //get seller by email
        $user = $this->where('Email',$email)->first();

        //check if seller exists and return them
        //this will be used in other files to create a session
        if($user && password_verify($password, $user['Password']));
        {
            return $user;
        }
        return null;
    }
}