<?php

namespace App\Controllers;
use App\Models\BuyerModel;


class BuyerController extends BaseController
{
    public function index()
    {
        //instance of buyer model
        //will be used to get their first name for display purposes based on session
        $buyerModel = new BuyerModel();
        $buyerID = session()->get('user_id');
        $buyer = $buyerModel->find($buyerID);
        $firstName = $buyer['FirstName'];
        //pass their information to the view
        $data =[
            'firstName' => $firstName,
        ];
        return view('business_listing', $data);
    }
}