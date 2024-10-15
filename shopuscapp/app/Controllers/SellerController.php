<?php

namespace App\Controllers;
use App\Models\SellerModel;


class SellerController extends BaseController
{
    public function index()
    {
        //instance of seller model
        //will be used to get their first name for display purposes based on session
        $sellerModel = new SellerModel();
        $sellerID = session()->get('user_id');
        $seller = $sellerModel->find($sellerID);
        $firstName = $seller['FirstName'];
        //pass their information to the view
        $data =[
            'firstName' => $firstName,
        ];
        return view('seller_dashboard', $data);
    }
}